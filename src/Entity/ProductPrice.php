<?php

namespace App\Entity;

class ProductPrice
{
    /**
     * @var string
     */
    private string $currency = "EUR";

    /**
     * @var float
     */
    private float $amount;

    /**
     * @var ShopUrl
     */
    private ShopUrl $shopUrl;

    /**
     * @var Product
     */
    private Product $product;

    /**
     * @var \DateTime
     */
    private \DateTime $updatedAt;

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        if ($amount <= 0) {
            throw new \Exception("The amount should be higher to zero");
        }
        $this->amount = $amount;
    }

    /**
     * @return ShopUrl
     */
    public function getShopUrl(): ShopUrl
    {
        return $this->shopUrl;
    }

    /**
     * @param ShopUrl $shopUrl
     */
    public function setShopUrl(ShopUrl $shopUrl): void
    {
        $this->shopUrl = $shopUrl;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
