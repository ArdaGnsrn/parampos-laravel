<?php

use Hemengeliriz\ParamposLaravel\Card;
use Hemengeliriz\ParamposLaravel\Payment;
use Hemengeliriz\ParamposLaravel\PaymentDetail;
use Illuminate\Support\Str;

it('can test', function () {
    $card = new Card();
    $card->setCardOwner('John Doe');
    $card->setCardOwnerPhone('5338415612');
    $card->setCardNumber('4546711234567894');
    $card->setCardExpireDate(12, 2026);
    $card->setCardCvc("000");


    $paymentDetails = new PaymentDetail();
    $paymentDetails->setOrderId("1234"."id");
    $paymentDetails->setOrderDescription('Order Description');
    $paymentDetails->setInstallment(1);
    $paymentDetails->setOrderAmount(100);
    $paymentDetails->setTotalAmount(100);
    $paymentDetails->setIpAddress('95.0.226.188');
    $paymentDetails->set3DMode(false);

    $payment = new Payment(
        $card,
        $paymentDetails,
        'https://www.example.com/api/v1/callback',
        'https://www.example.com/api/v1/callback'
    );
    dd($payment->pay());
    expect(true)->toBeTrue();
});
