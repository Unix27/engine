<?php


namespace Packages\Paypal\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;

/**
 * Class Plan
 *
 * Billing Subscription resource that will be used to create a billing agreement.
 *
 * @package PayPal\Api
 * @property string id
 * @property string plan_id
 * @property string start_time
 * @property array subscriber
 * @property array application_context
 * @property string type
 * @property string state
 * @property string create_time
 * @property string update_time
 * @property string product_id
 * @property array billing_cycles
 * @property array payment_preferences
 * @property \PayPal\Api\Links[] links
 * @property \PayPal\Api\PaymentDefinition[] payment_definitions
 * @property \PayPal\Api\Terms[] terms
 * @property \PayPal\Api\MerchantPreferences merchant_preferences
 */
class BillingSubscription extends PayPalResourceModel
{
    /**
     * Identifier of the payment resource created.
     *
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Identifier of the payment resource created.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    public function setPlanId($planId)
    {
        $this->plan_id = $planId;
        return $this;
    }

    public function setStartTime($startTime)
    {
        $this->start_time = $startTime;
        return $this;
    }

    public function setSubscriber($subscriber)
    {
        $this->subscriber = $subscriber;
        return $this;
    }

    public function setApplicationContext($applicationContext)
    {
        $this->application_context = $applicationContext;
        return $this;
    }

    /**
     * Create a new billing plan by passing the details for the plan, including the plan name, description, and type, to the request URI.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return BillingSubscription
     */
    public function create($apiContext = null, $restCall = null)
    {
        $payLoad = $this->toJSON();
        $json = self::executeCall(
            "/v1/billing/subscriptions/",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $this->fromJson($json);

        return $this;
    }

}