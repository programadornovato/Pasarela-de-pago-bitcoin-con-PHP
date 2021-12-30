<?php
require_once './vendor/autoload.php';
use CoinbaseCommerce\ApiClient;
use CoinbaseCommerce\Resources\Charge;
ApiClient::init('f14c4696-e77a-4efa-9ab4-aac045dea4e2');
function leerTodosCargos()
{
    try {
        //code...
    $todosCargos=Charge::getAll();
    foreach($todosCargos as $cargo){
        if(isset($cargo->payments[0]['status'])){
            echo "<br>";
            echo "El cargo con id=".$cargo->id." esta ".$cargo->payments[0]['status']."<br>";
            echo "URL para realizar el pago=<a href='".$cargo->hosted_url."'>".$cargo->hosted_url."</a><br>";
            echo "<br>";
        } else {
            echo "<br>";
            echo "El cargo con id=".$cargo->id." no tiene pagos<br>";
            echo "URL para realizar el pago=<a href='".$cargo->hosted_url."'>".$cargo->hosted_url."</a><br>";
            echo "<br>";
        }
    }
    } catch (\Exception $ex) {
        echo $ex->getMessage();
    }

}
leerTodosCargos();