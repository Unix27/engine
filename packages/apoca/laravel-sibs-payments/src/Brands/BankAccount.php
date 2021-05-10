<?php


namespace Apoca\Sibs\Brands;


use Apoca\Sibs\Objects\Mandate;

class BankAccount
{
    /**
     * @var string
     */
    protected $iBan;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $holder;

    /**
     * @var Mandate
     */
    protected $mandate;

    /**
     * BankAccount constructor.
     * @param string $iBan
     * @param string $country
     * @param string $holder
     * @param Mandate $mandate
     */
    public function __construct(string $iBan, string $country, string $holder, Mandate $mandate)
    {
        $this->setIBan($iBan);
        $this->setCountry($country);
        $this->setHolder($holder);
        $this->setMandate($mandate);
    }

    /**
     * @return string
     */
    public function getIBan()
    {
        return $this->iBan;
    }

    /**
     * @param string $iBan
     */
    public function setIBan(string $iBan)
    {
        $this->iBan = $iBan;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * @param string $holder
     */
    public function setHolder(string $holder)
    {
        $this->holder = $holder;
    }


    /**
     * @return string
     */
    public function getMandate()
    {
        return $this->mandate;
    }

    /**
     * @param Mandate $mandate
     */
    public function setMandate(Mandate $mandate)
    {
        $this->mandate = $mandate;
    }


}