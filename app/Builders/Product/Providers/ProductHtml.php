<?php

namespace App\Builders\Product\Providers;


abstract class ProductHtml
{
    public function setAttribute(string $key, object $value)
    {
        $this->data[$key] = $value;
    }
}