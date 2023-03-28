<?php
session_start();
$empresa = $_SESSION['empresa'];
require '../conexao.php';
require '../scripts/pdo.php';
//receber dados do formulario
$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
$usuario = $_SESSION['email'];
if(!empty($dados['enviarnota'])){

  var_dump($dados);
  $arquivo = $_FILES['nota'];
  $nomedoarquivo = $arquivo['name'];
  var_dump($arquivo);
  $nota = new DOMDocument();
  $nota -> load($_FILES['nota']['tmp_name']);
  $ide = $nota -> getElementsByTagName("ide");
  $emit = $nota -> getElementsByTagName("emit");

// var_dump($linhas);
  foreach ($ide as $result){
    $numerodanota = $result->getElementsByTagName("nNF")->item(0) -> nodeValue;
    echo "Numeroda nota: $numerodanota";
    $datadeemissao = $result ->getElementsByTagName("dhEmi")->item(0) -> nodeValue;
    echo "data de emissao  = ", $datadeemissao;
  }
foreach($emit as $result){
  $client_cnpj = $result -> getElementsByTagName("CNPJ")->item(0)->nodeValue;
}

$client_cnpj= $client_cnpj;

  $insercaodanota = $pdo -> prepare("Insert into notas (numero_nota, envionota, nomearquivo, usuario_envio, datadeemissao,client_cnpj, empresa) VALUES ($numerodanota, NOW(), '$nomedoarquivo', '$usuario','$datadeemissao','$client_cnpj', '$empresa')");
  $insercaodanota -> execute();
  if($insercaodanota->rowCount()){
// recupera ultimo id inserido no banco de dados
  $ultimo_id = $pdo -> lastInsertId();}
$diretorio = "notas/$ultimo_id/";
$caminhodoarquivo = "c:/xampp/htdocs/recol-nf/controllers/notas/$ultimo_id/"."$nomedoarquivo";
$insercaodanota = $pdo -> prepare("update notas set caminhodanota='$caminhodoarquivo' where id=$ultimo_id");
$insercaodanota -> execute();
mkdir($diretorio,0755);
$nomedanota = $arquivo['name'];
move_uploaded_file($arquivo['tmp_name'],$diretorio.$nomedanota);
//echo "Dados enviados com sucesso";
 header ("Location: ../main-page.php");
  } else{
    echo "Nao consegui enviar os dados, por favor tente novamente";
  }
  





?>