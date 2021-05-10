<?php
/**
 * LaraClassified - Classified Ads Web Application
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: http://www.bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from Codecanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class OrderMail
 * @package App\Notifications
 */
class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    protected $template;
    /**
     * @var
     */
    protected $order;
    /**
     * @var
     */
    protected $similarProducts;

    /**
     * GotPaymentMail constructor.
     */
    public function __construct($order, $similarProducts)
    {
        $this->template = 'mail.html.order';

        $this->order = $order;
        $this->similarProducts = $similarProducts;
    }

    /**
     * @return mixed
     */
    public function build()
    {
        $order = $this->order;
        $similarProducts = $this->similarProducts;

        return $this
            ->subject('New order')
            ->view($this->template, compact('order','similarProducts'));
    }
}
