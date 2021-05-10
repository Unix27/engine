<?php


namespace Apoca\Sibs\Objects;


use Carbon\Carbon;

class Mandate
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var Carbon
     */
    protected $dateOfSignature;

    public function __construct(string $id, Carbon $dateOfSignature)
    {
        $this->setId($id);
        $this->setDateOfSignature($dateOfSignature->format('Y-m-d'));
    }

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDateOfSignature()
    {
        return $this->dateOfSignature;
    }

    /**
     * @param $dateOfSignature
     */
    public function setDateOfSignature($dateOfSignature)
    {
        $this->dateOfSignature = $dateOfSignature;
    }
}