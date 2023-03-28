<?php
session_start();
require 'Classes/Auth.php';


$usuario = $_POST['usuario'];
$senha =  $_POST['senha'];
$revenda = $_POST['revenda'];

$valida = new Valida;
$auth = $valida->Autenticar($usuario, $senha, $revenda);

if ($auth == True) {
  header('Location: menu/index.php');
  exit;
} else {
  echo "voce nao esta cadastrado";
}
