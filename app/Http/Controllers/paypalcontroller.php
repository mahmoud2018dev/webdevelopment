<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Netshell\Paypal\Facades\Paypal;
//use Netshell\Paypal\Paypal;
use Illuminate\Support\Facades\Redirect;
//use PayPal;



class paypalcontroller extends Controller
{

    private $_apiContext;

    public function __construct()
    {
        $this->_apiContext = PayPal::ApiContext(
            config('paypal.client_id'),
            config('paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode' =>config('paypal.mode'),
            'service.EndPoint' => config('paypal.link_mode'),
            'http.ConnectionTimeOut' =>config('paypal.timeout'),
            'log.LogEnabled' => config('paypal.enable_log'),
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));

    }
    public function getCheckout($currency,$ptoduct_title,$desc,$price)
    {
        $payer = Paypal::Payer();
        $payer->setPaymentMethod('paypal');
        //$payer->setName($ptoduct_title);

        $amount = PayPal:: Amount();
        $amount->setCurrency($currency);
        $amount->setTotal($price); // This is the simple way,
        // you can alternatively describe everything in the order separately;
        // Reference the PayPal PHP REST SDK for details.

        $transaction = PayPal::Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription($desc);

        $redirectUrls = PayPal:: RedirectUrls();
        $redirectUrls->setReturnUrl(url('done/paypal'));
        $redirectUrls->setCancelUrl(url('cansel/paypal'));

        $payment = PayPal::Payment();
        $payment->setIntent('sale');
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions(array($transaction));

        $response = $payment->create($this->_apiContext);
        $redirectUrl = $response->links[1]->href;

        return Redirect::to( $redirectUrl );
    }
    public  function  check_payments( $id,$token ,$payer_id){



        $payment = PayPal::getById($id, $this->_apiContext);

        $paymentExecution = PayPal::PaymentExecution();

        $paymentExecution->setPayerId($payer_id);
         return $executePayment = $payment->execute($paymentExecution, $this->_apiContext);

        // Clear the shopping cart, write to database, send notifications, etc.

        // Thank the user for the purchase
       // return view('checkout.done');

    }
}
