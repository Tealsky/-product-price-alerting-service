<?php

declare(strict_types=1);

namespace App\Tests\Behat;

use App\Entity\Shop;
use App\Entity\ShopUrl;
use Behat\Behat\Context\Context;
use Symfony\Component\BrowserKit\HttpBrowser;

use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;
use function PHPUnit\Framework\assertIsString;
use function PHPUnit\Framework\assertSame;

final class BrowseShopContext implements Context
{
    /**
     * @var HttpBrowser
     */
    private HttpBrowser $browser;

    /**
     * @var Crawler
     */
    private Crawler $response;

    /**
     * @var Shop
     */
    private Shop $shop;

    /**
     * @var ShopUrl
     */
    private ShopUrl $shopUrl;

    public function __construct()
    {
        $this->browser = new HttpBrowser(HttpClient::create());
    }

    /**
     * @Given a shop named :shopName
     */
    public function aShopNamed($shopName)
    {
        $this->shop = new Shop();
        $this->shop->setName($shopName);
    }

    /**
     * @When I visit the website :url
     */
    public function iVisitTheWebsite($url)
    {
        $expectedShops = [
            "Amazon"=>"https://www.amazon.fr",
            "Rakuten"=>"https://fr.shopping.rakuten.com",
            "Darty"=>"https://www.darty.com"
        ];

        assertSame($expectedShops[$this->shop->getName()], $url);

        $this->shopUrl = new ShopUrl();
        $this->shopUrl->setShop($this->shop);
        $this->shopUrl->setUrl($url);

        $this->response = $this->browser->request('GET', $url);
    }

    /**
     * @Then the response should be received
     */
    public function theResponseShouldBeReceived(): void
    {
    }

    /**
     * @When I visit the path :searchQuery
     */
    public function iVisitThePath($searchQuery)
    {
        $this->response = $this->browser->request('GET', $searchQuery);

        $this->shopUrl->setSearchQuery($searchQuery);
    }

    /**
     * @When I search for a product called :search with the url : :url
     */
    public function iSearchForAProductCalledWithTheUrl($search, $url)
    {
        $this->response = $this->browser->request('GET', $url);
    }

    /**
     * @Then The main results section should be present.
     */
    public function theMainResultsSectionShouldBePresent()
    {
        $resultSection = $this->response
            ->filter('span[data-component-type="s-search-results"]')
            ->filter('[cel_widget_id="MAIN-TOP_BANNER_MESSAGE-1"]')
            ->html();

        assertIsString($resultSection);
    }
}