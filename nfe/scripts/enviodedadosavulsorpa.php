<?php
session_start();

require 'postimpostos.php';
//$ident = $_REQUEST['ident'];
//echo $ident;
//$idBd = $_REQUEST['des'];
//var_dump($_POST['file']['name']);
//echo $idBd;
echo '<pre>';
 var_dump($_POST);
 echo 'o iss é '.$iss.'<br>';
 echo 'existe csll'. $csll.'<br>';
 echo 'existe ir'. $ir.'<br>';
//echo json_encode($_POST);
$dep = $_POST['Departamento'];
$cnpjClient = $_POST['cnpjCliente'];
$datadanota = $_POST['datadanota'];
$datadanota = strtotime($datadanota);
$datadanota = date('d/m/Y',$datadanota );
// echo $date;
$origem = $_POST['destino'];
$numerodanota = $_POST['numeroNota'];
$obs = $_POST['obs'];
$datadepagemento = $_POST['payment_date'];
$datadepagemento = strtotime($datadepagemento);
$datadepagemento = date('d/m/Y',$datadepagemento );
$seriedanota = $_POST['serieNota'];
$trans = $_POST['transação'];
$valorNota = $_POST['valorNota'];
//$valornota = str_replace(',', '.', $valorNota);
var_dump($valorNota);
$usario = $_SESSION['email'];

require 'pdo.php';
$inserirdatadepgto = "insert into notas (envionota,departamento,client_cnpj,datadanota,origens,numero_nota, obs,datadepagamento,serie,transacao,usuario_envio,avulso,iss,csll,ir,valorNota) values (NOW(),'$dep', '$cnpjClient', '$datadanota', '$origem', '$numerodanota', '$obs', '$datadepagemento', '$seriedanota', '$trans', '$usario','1','$iss','$csll','$ir',"."$valorNota);";
$result_pgto=$pdo->prepare($inserirdatadepgto);
$result_pgto -> execute();

?>