 <?php


    
require 'functions.php';
require '../class/Report.php';
$datainicio= '2022-10-01';
$datafim= '2022-11-10';
$url = "http://10.15.32.11:8000/grafico/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim);
$dados = receberdadosapi($url);
$relatorio= new Report;

$r1=$relatorio->somatoriodiariorevenda($dados,4);



//var_dump($dados);




?>

