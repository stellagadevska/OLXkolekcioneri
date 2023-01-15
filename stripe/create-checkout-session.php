<?php
require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51I3Ox3KN91OLZtDtF5b1ResF6qfZWIKDsTm6IIW3Dc9uKJ7XijDlKxDGAaSduOYb6XmuNHpyepJci8SIAwUJe9mC00Fe0J4qEH');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost';
//print_r($_POST);

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'bgn',
      'unit_amount' => $_POST['price'],
      'product_data' => [
        'name' => 'Stubborn Attachments',
        'images' => ["https://i.imgur.com/EHyR2nP.png"],
      ],
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.php?order-id='.$_POST['orderId'],
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

echo json_encode(['id' => $checkout_session->id]);