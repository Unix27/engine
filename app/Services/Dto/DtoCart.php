<?php

namespace App\Services\Dto;


/**
 * Class DtoCart
 * @package App\DTO
 */
class DtoCart extends Dto
{
    /**
     * @var
     */
    protected $product_id;
    /**
     * @var
     */
    protected $product_title;
    /**
     * @var
     */
    protected $quantity;
    /**
     * @var
     */
    protected $price;
    /**
     * @var
     */
    protected $attrs;
    /**
     * @var
     */
    protected $row_id;
    /**
     * @var
     */
    protected $currency_code;
}