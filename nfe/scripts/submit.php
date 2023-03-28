<?php
session_start();
require 'pdo.php';

// essa ser o action do formulario e aqui manipular o arquivo deixar na outra pagina o servico de lancamento do rpa
//$valorNota = $_POST['valorNota'];
//$valornota = str_replace(',', '.', $valorNota);
var_dump($_POST);

var_dump($_FILES);
$fotodanota = $_FILES['notainf'];
$nomedafoto = $fotodanota['name'];
$empresa = $_SESSION['empresa'];
$select = 'select id from notas order by id DESC limit 1;';
$query = $pdo -> prepare($select);
$query -> execute();
$row = $query -> fetchAll();
var_dump($row);
$ultimo_id = $row[0]['id'];
$caminhodoarquivo = "C:/Users/joaov/OneDrive/Área de Trabalho/htdocs/dre2/recol-nf/controllers/notas/$ultimo_id/"."$nomedafoto";
$insercaodanota = $pdo -> prepare("update notas set caminhodanota='$caminhodoarquivo', nomearquivo='$nomedafoto', empresa='$empresa' where id=$ultimo_id");
$insercaodanota -> execute();


$diretorio = "C:/Users/joaov/OneDrive/Área de Trabalho/htdocs/dre2/recol-nf/controllers/notas/$ultimo_id/";
$caminhodoarquivo = "C:/Users/joaov/OneDrive/Área de Trabalho/htdocs/dre2/recol-nf/controllers/notas/"."$nomedafoto";

mkdir($diretorio,0755);
move_uploaded_file($fotodanota['tmp_name'],$diretorio.$nomedafoto);
//$inserirdatadepgto = "insert into notas (obs) values ('joaovitor');";
//$result_pgto=$pdo->prepare($inserirdatadepgto);
//$result_pgto -> execute();
header("Location: ../main-page.php");


?>