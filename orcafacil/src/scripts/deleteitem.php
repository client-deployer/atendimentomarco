<?php 
session_start();
require '../../Class/CestaManager.php';


$reponse = DeleteItemBalcao::DeleteItem($_POST['coditem'],$_POST['atendimento'],$_POST['revenda']);

if ($reponse==true){
    echo 'deletado com sucesso';
}else{
    die();

    echo json_encode("Falha");
}






?>