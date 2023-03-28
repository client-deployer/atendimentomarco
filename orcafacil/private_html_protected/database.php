<?php
session_start();
//Executa Query



//Grava registros
function DBCadastrodepecaorcamento($cliente,$vendedor,$pec_item,$quantidade,$desconto,$tipo_desconto,$venda_perdida,$nome_concorrente,$precoconcorrente,$revenda, $precopublico, $preco_alter, $contato){

//$dado1=$dados[0];
require 'connection.php';
    $query = "INSERT INTO transations (cliente,vendedor,pec_item,quantidade,desconto,tipo_desconto,venda_perdida, nome_concorrente,preco_concorrente,solicitacao, revenda_ped, preco_item, preco_alter,contato)
    VALUES ($cliente,$vendedor,$pec_item,$quantidade,$desconto,$tipo_desconto,$venda_perdida,'$nome_concorrente',".$precoconcorrente.",NOW(),$revenda, $precopublico, $preco_alter, $contato)";

$sth = $dbh->prepare($query);
$sth->execute();









    // return DBExecute($query);


}

    







