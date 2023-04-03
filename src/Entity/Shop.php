<?php

namespace App\Entity;

class Shop
{
    /**
     * @var string
     */
    private string $name;


    /**
     * @var ShopUrl[]
     */
    private array $shopUrlList;

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
     * @return array
     */
    public function getShopUrlList(): array
    {
        return $this->shopUrlList;
    }

    /**
     * @param array $shopUrlList
     */
    public function setShopUrlList(array $shopUrlList): void
    {
        $this->shopUrlList = $shopUrlList;
    }
}