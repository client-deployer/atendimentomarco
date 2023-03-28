<?php
session_start();
$usuario= $_SESSION['email'];
$empresa = $_SESSION['empresa'];
$idBd = $_POST['id'];
$transacao = $_POST['transaction'];
$destine = $_POST['origin'];
require 'pdo.php'; 
$inserirdatadepgto = "update notas set envioparaia='1', usuario_auth='$usuario', transacao='$transacao', origens='$destine', empresa= '$empresa' where id='$idBd' ";
$result_pgto=$pdo->prepare($inserirdatadepgto);
$result_pgto -> execute();


?>