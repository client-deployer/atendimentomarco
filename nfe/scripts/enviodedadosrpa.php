<?php
session_start();
$empresa = $_SESSION['empresa'];
$idBd = $_REQUEST['id_bd'];
$nome= $_REQUEST['nome'];
echo $nome;
$data = $_REQUEST['pagamento'];
$data = strtotime($data);
$date = date('d/m/Y',$data );
echo $date;
$origens = $_REQUEST['origens'];
echo $origens;
$departamento = $_REQUEST['departamento'];
$transacao = $_REQUEST['okay'];
$serie = $_POST['serie'];
$usuario = $_SESSION['email'];

require 'pdo.php'; //ai tu arruma o sql agr q ta errado
/// o erro é aqui oh
$inserirdatadepgto = "update notas set datadepagamento='$date', transacao = '$transacao', envioparaia='1', origens='$origens', departamento='$departamento', transacao = '$transacao', empresa='$empresa', usuario_auth='$usuario'  where id='$idBd' ";
$result_pgto=$pdo->prepare($inserirdatadepgto);
$result_pgto -> execute();

?>        