<?php

namespace App\Services\Dto;

/**
 * Class DTOOrder
 * @package App\DTO\Cart
 */
class DtoOrder extends Dto
{
    /**
     * @var
     */
    protected $name;
    /**
     * @var
     */
    protected $address;
    /**
     * @var
     */
    protected $post_code;
    /**
     * @var
     */
    protected $city;
    /**
     * @var
     */
    protected $country_id;
    /**
     * @var
     */
    protected $phone;
    /**
     * @var
     */
    protected $email;
    /**
     * @var
     */
    protected $payment;
    /**
     * @var
     */
    protected $shipping;
}