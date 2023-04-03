<?php

namespace App\Entity;

use Exception;

class Product
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $url;

    /**
     * @var ProductPrice[]
     */
    private array $productPriceList;

    public function __construct()
    {
        $this->productPriceList = [];
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return array
     */
    public function getProductPriceList(): array
    {
        return $this->productPriceList;
    }

    /**
     * @param array $productPriceList
     * @return $this
     */
    public function setProductPriceList(array $productPriceList): Product
    {
        $this->productPriceList = $productPriceList;

        return $this;
    }

    /**
     * @param ProductPrice $productPrice
     * @return $this
     */
    public function addProductPrice(ProductPrice $productPrice): Product
    {
        $this->productPriceList[] = $productPrice;

        return $this;
    }

    /**
     * @return ProductPrice|null
     * @throws Exception
     */
    public function getLowestProductPrice(): ProductPrice | null
    {
        $lowestPrice = null;
        $lowestProductPrice = null;
        $productPriceList = $this->getProductPriceList();

        if (empty($productPriceList)) {
            throw new Exception("ProductPriceList is empty, can't get the lowest product price", 400);
        }

        foreach ($productPriceList as $productPrice) {

            $amount = $productPrice->getAmount();
            if (is_null($lowestPrice) || ($amount < $lowestPrice)) {
                $lowestPrice = $amount;
                $lowestProductPrice = $productPrice;
            }
        }

        return $lowestProductPrice;
    }
}