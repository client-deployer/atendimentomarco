<?php
session_start();
function receberdadosapi($url){ 

    // $url = "http://10.15.32.11:8000/gerenciais/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim)."";
   
         //     var_dump($url);
              $ch = curl_init($url);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
              $valor =  json_decode(curl_exec($ch), true);
              return $valor;
   
    }
ob_start();
//require_once("../../private_html_protected/config.php");   
//require_once("../../private_html_protected/connection.php");   
//require_once("../../private_html_protected/database.php"); 

require '../../Class/SendPeca.php';


$send = new SendpecaBalcao;

$try = $send->Enviarpecabalcao();

    //$dado1=$dados[0];
?>
<script>


//alert('voce inseriu o item com sucesso');
</script>
