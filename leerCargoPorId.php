<?php
require_once './vendor/autoload.php';
use CoinbaseCommerce\ApiClient;
use CoinbaseCommerce\Resources\Charge;
ApiClient::init('f14c4696-e77a-4efa-9ab4-aac045dea4e2');
function recuperaCargoPorId($id)
{
    try {
        $retriveCharge = Charge::retrieve($id);
        if (isset( $retriveCharge->payments[0]['status'])){
            echo "El cargo con id=".$id." esta ".$retriveCharge->payments[0]['status']."<br>";
        } else {
            echo "El cargo con id=".$id." no tiene pagos<br>";
        }
        //var_dump($retriveCharge);
    } catch (\Exception $ex) {
        echo $ex->getMessage();
    }
}
recuperaCargoPorId($_GET['id']);