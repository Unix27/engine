<?php


namespace App\Builders\Product\Providers\AliExpress;


class Sku
{
    const KEY = 'productId';

    private $sku;

    public function __construct(array $data)
    {
        return $this->sku = data_get($data, self::KEY);
    }

    public function get()
    {
        return $this->sku;
    }

    public function set(string $sku)
    {
        $this->sku = $sku;
    }
}