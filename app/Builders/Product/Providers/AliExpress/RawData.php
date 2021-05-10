<?php


namespace App\Builders\Product\Providers\AliExpress;


class RawData
{
    private $collection;

    public function __construct(array $data)
    {
        $this->collection = collect($data);
    }

    public function get()
    {
        return $this->collection;
    }
}