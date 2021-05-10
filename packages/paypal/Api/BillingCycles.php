<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class Billing
 *
 * Billing instrument used to charge the payer.
 *
 * @package PayPal\Api
 *
 * @deprecated Used internally only.
 *
 * @property string frequency
 * @property string tenure_type
 * @property string sequence
 * @property string total_cycles
 * @property string $links
 *
 */
class BillingCycles extends PayPalModel
{
    /**
     * Identifier of the instrument in PayPal Wallet
     *
     * @param string $billing_agreement_id
     * 
     * @return $this
     */
    public function setBillingAgreementId($billing_agreement_id)
    {
        $this->billing_agreement_id = $billing_agreement_id;
        return $this;
    }

    /**
     * Identifier of the instrument in PayPal Wallet
     *
     * @return string
     */
    public function getBillingAgreementId()
    {
        return $this->billing_agreement_id;
    }

}
