<?php
session_start();
require '../../../vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class SendpecaBalcao
{
    public function Enviarpecabalcao()
    {

        $codigo = $_POST['itemestoque'];
        $url = "10.15.32.11:8000/consultaritem/$codigo";
        $dados = receberdadosapi($url);
        $item = $dados;
      //  var_dump($item);
        $item = json_decode($item);
        $descricao = $item[0]->descricao;
        $pec_item = $item[0]->itemestoque;
        $codpublico = $item[0]->codigopublico;
        $fabrica = $item[0]->fabrica;
        $marca = $item[0]->marca;
        $utilizacao_item = $item[0]->utilizacao;
        $precopublico = $item[0]->precopublico;
        $disponivel  = $item[0]->disponivel;
        $precocusto = $item[0]->precocusto;
        $revenda_vendedor  = $_SESSION['vendedor']['revenda'];
        $cliente = $_POST['cod_cliente'];
        $vendedor = $_SESSION['vendedor']['id'];
        $tipodesconto = $_POST['tipodesconto'];
        $valordesconto = $_POST['desconto'];
        $preco = $_POST['preco'];
        $descricao_desconto = 'preço concorrente';
        $descricao_venda_perdida = '0';
        $nome_concorrente = 'PEMAZA';
        $precoconcorrente = 500;
        $contato = $_SESSION['pedido'];
        $qtdsolicitada = $_POST['quantidade'];
        // organizar isso aqui dentro da base oficial sem laravel
        //DBCadastrodepecaorcamento($cliente,$vendedor,$pec_item,$_POST['quantidade'],$valordesconto,$tipodesconto,$descricao_venda_perdida,$nome_concorrente,$precoconcorrente, $revenda_vendedor, $precopublico, $preco, $_SESSION['pedido']);
       // $url = "10.15.32.11:8000/inseriritemnacesta/$revenda_vendedor/$vendedor/$contato/$pec_item/1/$disponivel/$qtdsolicitada/$valordesconto/$precopublico/$codpublico/" . $_SESSION['orcamento'];
     //   $dados = receberdadosapi($url);

        $client = new Client(['headers' => ['Content-Type' => 'application/json']], ['http_errors' => false]);
        $response = $client->post(
          '10.15.32.11:8000/inseriritemnacesta',
          ['body' => json_encode(
            [
              "revenda" => intval($revenda_vendedor),
              "vendedor" => intval($vendedor),
              "contato" => intval($contato),
              "itemestoque" => intval($pec_item),
              "ordem" => 1,
              "disponivel" => floatval($disponivel),
              "qtdsolicitada" => floatval($qtdsolicitada),
              "valordesconto" => floatval($valordesconto),
              "precopublico" => floatval($precopublico),
              "codpublico" => intval($codpublico),
              "orcamento" => intval($_SESSION['orcamento'])

            ]
          )]
        );
        $resposta = $response->getBody();
        $resposta = json_decode($resposta);
        var_dump($resposta);


    }
}
