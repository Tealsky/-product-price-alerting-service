<?php

declare(strict_types=1);

namespace App\Tests\Behat;

use App\Entity\Product;
use App\Entity\ProductPrice;
use App\Entity\Shop;
use App\Entity\ShopUrl;
use Behat\Behat\Context\Context;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertIsNumeric;
use function PHPUnit\Framework\assertIsString;

final class SearchContext implements Context
{
    /**
     * @var Product
     */
    private Product $product;

    /**
     * Initializes context.
     */
    public function __construct()
    {
        $this->product = new Product();
    }
    /**
     * @Given a product named :productName
     */
    public function aProductNamed($productName)
    {
        $this->product->setName($productName);

        assertIsString($productName);
    }

    /**
     * @Given there is a shop named :arg1 in France
     */
    public function thereIsAShopNamedInFrance($shopName)
    {
        assertIsString($shopName);

        $shop = new Shop();
        $shop->setName($shopName);

        $shopUrl = new ShopUrl();
        $shopUrl->setShop($shop);

        $productPrice = new ProductPrice();
        $productPrice->setShopUrl($shopUrl);
    }

    /**
     * @When I search for a :productName
     */
    public function iSearchForA($productName)
    {
        assertIsString($productName);
        $this->product->setName($productName);
    }

    /**
     * @Given there is one :productName, which costs :price€
     */
    public function thereIsOneWhichCostsEur($productName, $price)
    {
        assertIsNumeric($price);
        assertEquals($productName, $this->product->getName());

        $productPrice = new ProductPrice();
        $productPrice->setAmount((float) $price);

        $this->product->addProductPrice($productPrice);
    }

    /**
     * @Given there is another :productName, which costs :price€
     */
    public function thereIsAnotherWhichCostsEur($productName, $price)
    {
        assertIsNumeric($price);
        assertEquals($productName, $this->product->getName());

        $productPrice = new ProductPrice();
        $productPrice->setAmount((float) $price);

        $this->product->addProductPrice($productPrice);
    }

    /**
     * @Then I should get a :productName, which costs :price€
     */
    public function iShouldGetAWhichCostsEur($productName, $price)
    {
        $lowestProductPrice = $this->product->getLowestProductPrice();
        $lowestPrice = $lowestProductPrice->getAmount();

        assertEquals($lowestPrice, (float)$price, "The lowest price should be $lowestPrice €");
    }
}
