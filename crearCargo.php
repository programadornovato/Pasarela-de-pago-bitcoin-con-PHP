<?php
require_once './vendor/autoload.php';
use CoinbaseCommerce\ApiClient;
use CoinbaseCommerce\Resources\Charge;
ApiClient::init('f14c4696-e77a-4efa-9ab4-aac045dea4e2');
$cargo=new Charge([
    'name'=>'Pago de acceso premium',
    'description'=>'El cliente tiene acceso a la parte premium de la plataforma',
    'pricing_type'=>'fixed_price',
    'local_price'=>[
        'amount'=>'0.20',
        'currency'=>'USD'
    ],
    'metadata'=>[
        'customer_id'=>'12345',
        'order_id'=>'67890'
    ]
]);
try {
    $cargo->save();
    echo "El pago se realizo con el id ".$cargo->id."<br>";
    echo "Se realizara el pago en la url ".$cargo->hosted_url."<br>";
} catch (\Exeption $ex) {
    echo $ex->getMessage();
}
