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


$url = "http://10.15.32.11:8000/enviarformadepagamento/".$_SESSION['vendedor']['revenda']."/".$_SESSION['pedido']."/".$_SESSION['client']['codclient']."/".$_POST['cod']."/".$_POST['valor']."/".$_POST['total'];

$dados = receberdadosapi($url);
?>