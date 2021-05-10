<?php


namespace App\Builders\Product\Providers\AliExpress;

class Title
{
    const KEY = 'title';

    private $title;

    public function __construct(array $data)
    {
        $this->title = data_get($data, self::KEY);
    }

    public function get()
    {
        return $this->title;
    }

    public function set(string $title)
    {
        $this->title = $title;
    }
}