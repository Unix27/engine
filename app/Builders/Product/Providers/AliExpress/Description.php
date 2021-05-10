<?php


namespace App\Builders\Product\Providers\AliExpress;


class Description
{
    const KEY = 'description';
    private $description;

    public function __construct($data)
    {
        $this->description = data_get($data, self::KEY);;
    }

    public function get()
    {
        return $this->description;
    }

    public function set(string $description)
    {
        $this->description = $description;
    }
}