<?php
session_start();
ob_start();
require_once("../../private_html_protected/config.php");   
require_once("../../private_html_protected/connection.php");   
require_once("../../private_html_protected/database.php"); 

var_dump($_POST);
$codigo = $_POST['itemestoque'];
$url = "10.15.32.11:8000/consultaritem/$codigo";

$ch = curl_init($url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 $itens = json_decode(curl_exec($ch), true);
foreach ($itens as $item){
    $descricao= $item[0];
    $pec_item = $item[1];
    // posicao 1 - item estoque;
    $codpublico = $item[2];
    $fabrica = $item[3];
    $marca= $item[4];
$utilizacao_item= $item[5];
$precopublico = $item[6];
$disponivel  = $item[7];
$precocusto = $item[8];
$revenda_vendedor  = $_SESSION['vendedor']['revenda'];

}

 //var_dump($itens);
 
$cliente=$_POST['cod_cliente'];

$vendedor=$_POST['cod_vendedor'];

$tipodesconto= $_POST['tipodesconto'];
$valordesconto=$_POST['desconto'];
//$codigopublico=$_POST['codigopublico'];
$preco = $_POST['preco'];

$descricao_desconto='preço concorrente';
$descricao_venda_perdida='0';
$nome_concorrente = 'PEMAZA';
$precoconcorrente=500;
$contato = $_SESSION['pedido'];
$qtdsolicitada =$_POST['quantidade'];


//var_dump($dados);
DBCadastrodepecaorcamento($cliente,$vendedor,$pec_item,$_POST['quantidade'],$valordesconto,$tipodesconto,$descricao_venda_perdida,$nome_concorrente,$precoconcorrente, $revenda_vendedor, $precopublico, $preco, $_SESSION['pedido']);

$url = "10.15.32.11:8000/inseriritemnacesta/$revenda_vendedor/$vendedor/$contato/$pec_item/1/$disponivel/$qtdsolicitada/$valordesconto/$preco/$precocusto/0/3/$precopublico/$cliente/$codpublico";

$ch = curl_init($url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 $itens = json_decode(curl_exec($ch), true);



    //$dado1=$dados[0];
?>
<script>

</script>
