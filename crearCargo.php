<?php
require_once './vendor/autoload.php';
use CoinbaseCommerce\ApiClient;
use CoinbaseCommerce\Resources\Charge;
ApiClient::init('f14c4696-e77a-4efa-9ab4-aac045dea4e2');
$cargo = new Charge([
    'name' => 'Acceso al area premium',
    'description' => 'Se tiene acceso a los videos premium',
    'pricing_type' => 'fixed_price',
    'local_price' => [
        'amount' => '0.01',
        'currency' => 'USD'
    ],
    'metadata' => [
        'customer_id' => '12345',
        'order_id' => '67890'
    ]
]);

try {
    $cargo->save();
    echo "Id del cargo=".$cargo->id."<br>";
    echo "URL para realizar el pago=<a href='".$cargo->hosted_url."'>".$cargo->hosted_url."</a><br>";
} catch (\Exeption $ex) {
    echo $ex->getMessage();
}
