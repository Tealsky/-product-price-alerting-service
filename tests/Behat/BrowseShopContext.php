<?php

declare(strict_types=1);

namespace App\Tests\Behat;

use App\Entity\Shop;
use App\Entity\ShopUrl;
use Behat\Behat\Context\Context;
use Symfony\Component\BrowserKit\HttpBrowser;

use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;
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

    public function __construct()
    {
        $this->browser = new HttpBrowser(HttpClient::create());
    }

    /**
     * @Given a shop named :shopName with a website :url
     */
    public function aShopNamedWithAWebsite($shopName, $url)
    {
        $expectedShops = [
            "Amazon"=>"https://www.amazon.fr",
            "Rakuten"=>"https://fr.shopping.rakuten.com",
            "Darty"=>"https://www.darty.com"
        ];

        assertSame($expectedShops[$shopName], $url);

        $shop = new Shop();
        $shop->setName($shopName);

        $shopUrl = new ShopUrl();
        $shopUrl->setShop($shop);
        $shopUrl->setUrl($url);

        $this->response = $this->browser->request('GET', $url);
    }

    /**
     * @Then the response should be received
     */
    public function theResponseShouldBeReceived(): void
    {
        if ($this->response === null) {
            throw new \HttpRuntimeException('No response received');
        }
    }
}