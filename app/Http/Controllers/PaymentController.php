<?php


namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class PaymentController extends FrontController
{


    public function __construct()
    {
        parent::__construct();
    }

    public function sendPayment(Request $request)
    {

    }

    public function paymentConfirmation(Request $request)
    {

    }

    public function paymentCancel(Request $request)
    {

    }
}