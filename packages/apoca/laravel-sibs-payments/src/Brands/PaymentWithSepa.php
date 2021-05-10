<?php

namespace Apoca\Sibs\Brands;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

/**
 * Class PaymentWithSepa
 *
 * @package Apoca\Sibs\Brands
 */
class PaymentWithSepa extends Payment
{

    /**
     * @var string
     */
    protected $endpoint;


    /**
     * @var BankAccount
     */
    protected $bankAccount = [];

    /**
     * @var array
     */
    protected $clientConfig = [];

    /**
     * PaymentWithCard constructor.
     *
     * @param float  $amount
     * @param string $currency
     * @param string $brand
     * @param string $type
     * @param array  $optionalParameters
     * @param BankAccount   $bankAccount
     */
    public function __construct(
        float $amount,
        string $currency,
        string $brand,
        string $type,
        array $optionalParameters,
        BankAccount $bankAccount
    ) {
        parent::__construct($amount, $currency, $brand, $type, $optionalParameters);
        $this->bankAccount = $bankAccount;
        $this->endpoint = config('sibs.host') . config('sibs.version') . '/';
    }

    /**
     * Execute the payment
     *
     * @return object
     */
    public function pay(): object
    {
        $data = (object)null;

        try {
            $client = new Client($this->clientConfig);

            $payload = [
                'authentication.userId' => config('sibs.authentication.userId'),
                'authentication.password' => config('sibs.authentication.password'),
                'authentication.entityId' => config('sibs.authentication.entityId'),
                'amount' => number_format($this->amount, 2, '.', ''),
                'currency' => $this->currency,
                'paymentBrand' => $this->brand,
                'paymentType' => $this->type,
                'bankAccount.iban' => $this->bankAccount->getIBan(),
                'bankAccount.country' => $this->bankAccount->getCountry(),
                'bankAccount.holder' => $this->bankAccount->getHolder(),
                'bankAccount.mandate.id' => $this->bankAccount->getMandate()->getId(),
                'bankAccount.mandate.dateOfSignature' => $this->bankAccount->getMandate()->getDateOfSignature()

            ];

            if (config('sibs.mode') === 'test') {
                $this->clientConfig = [
                    'verify' => false,
                ];
            }

            $response = $client->post($this->endpoint . 'payments', [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => config('sibs.authentication.token'),
                ],
                'form_params' => array_merge($payload, $this->getOptionalParameters()),
            ]);

            $data->status = $response->getStatusCode();
            $data->response = json_decode($response->getBody()->getContents(), false);

            return $data;
        } catch (ClientException $e) {
            $response = $e->getResponse();

            $data->status = $response->getStatusCode();
            $data->response = json_decode($response->getBody()->getContents(), false);

            return $data;
        }
    }
}
