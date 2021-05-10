<?php

namespace Apoca\Sibs\Services;

use Apoca\Sibs\Brands\BankAccount;
use Apoca\Sibs\Brands\Card;
use Apoca\Sibs\Brands\Checkout;
use Apoca\Sibs\Brands\PaymentWithCard;
use Apoca\Sibs\Brands\PaymentWithMBWay;
use Apoca\Sibs\Brands\PaymentWithSepa;
use Apoca\Sibs\Brands\Transaction;
use Apoca\Sibs\Contracts\PaymentInterface;
use Apoca\Sibs\Objects\Mandate;
use Carbon\Carbon;
use Exception;

/**
 * Class SibsService
 *
 * @package Apoca\Sibs\Services
 */
class SibsService
{
    /**
     * @param array $request
     *
     * @return PaymentInterface
     * @throws Exception
     */
    public function checkout(array $request): PaymentInterface
    {
        switch (strtoupper($request['brand'])) {
            case 'MASTER':
            case 'AMEX':
            case 'VPAY':
            case 'MAESTRO':
            case 'VISADEBIT':
            case 'VISAELECTRON':
            case 'VISA':
                $payment = new PaymentWithCard(
                    $request['amount'],
                    strtoupper($request['currency']),
                    strtoupper($request['brand']),
                    strtoupper($request['type']),
                    $request['optionalParameters'],
                    new Card(
                        $request['number'],
                        $request['holder'],
                        $request['expiry_month'],
                        $request['expiry_year'],
                        $request['cvv']
                    )
                );
                break;
            case 'CHECKOUT':
                $payment = new Checkout($request['amount'], $request['currency'], $request['type'], $request['optionalParameters']);
                break;
            case 'SIBS_MULTIBANCO':
                throw new \RuntimeException('SIBS_MULTIBANCO Service Payment not found.', 404);
                break;
            case 'DIRECTDEBIT_SEPA':
                $payment = new PaymentWithSepa(
                    $request['amount'],
                    strtoupper($request['currency']),
                    strtoupper($request['brand']),
                    strtoupper($request['type']),
                    $request['optionalParameters'],
                    new BankAccount(
                        $request['iBan'],
                        $request['country'],
                        $request['holder'],
                        new Mandate(
                            $request['mandateId'],
                            Carbon::parse($request['dateOfSignature'])
                        )
                    )
                );

                break;
            case 'MBWAY':
                $payment = new PaymentWithMBWay(
                    $request['amount'],
                    strtoupper($request['currency']),
                    strtoupper($request['brand']),
                    strtoupper($request['type']),
                    $request['accountId'],
                    $request['optionalParameters']
                );
                break;
            default:
                throw new \RuntimeException('Sibs Service Payment not found.', 404);
        }

        return $payment;
    }

    /**
     * Get payment status
     *
     * @param string $checkoutId
     *
     * @return object
     */
    public function status(string $checkoutId): object
    {
        return (new Transaction($checkoutId))->status();
    }
}
