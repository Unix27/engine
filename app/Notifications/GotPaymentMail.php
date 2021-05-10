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
 * Class GotPaymentMail
 * @package App\Notifications
 */
class GotPaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    protected $template;

    /**
     * GotPaymentMail constructor.
     */
    public function __construct()
    {
        $this->template = 'mail.html.got-payment';
    }

    /**
     * @return mixed
     */
    public function build()
    {
        return $this
            ->subject('Welcome mail')
            ->view($this->template);
    }
}
