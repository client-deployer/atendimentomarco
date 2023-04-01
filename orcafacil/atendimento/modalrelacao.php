<?php
session_start();
require '../atendimento/functions.php';
require '../../vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;


$itemestoque = $_POST['itemestoque'];
function get_fabrica($itemestoque){
  $client = new Client(['headers' => ['Content-Type' => 'application/json']], ['http_errors' => false]);
  $response = $client->post(
    '10.15.32.11:8000/fabrica-get',
    ['body' => json_encode(
      [
        "client" => 1,
        "item_estoque" => $itemestoque
      
      ]
    )]
  );
  $resposta = $response->getBody();
  $resposta = json_decode($resposta);
  return $resposta;
}
function get_item_dependente($itemestoque){
  $client = new Client(['headers' => ['Content-Type' => 'application/json']], ['http_errors' => false]);
  $response = $client->post(
    '10.15.32.11:8000/dependencia-get',
    ['body' => json_encode(
      [
        "client" => 1,
        "item_estoque" => $itemestoque
      
      ]
    )]
  );
  $resposta = $response->getBody();
  $resposta = json_decode($resposta);
  return $resposta;
}
function get_especificacao($itemestoque){
  $client = new Client(['headers' => ['Content-Type' => 'application/json']], ['http_errors' => false]);
  $response = $client->post(
    '10.15.32.11:8000/get-especificacaobycliente',
    ['body' => json_encode(
      [
        "client" => 1,
        "item_estoque" => $itemestoque
      
      ]
    )]
  );
  $resposta = $response->getBody();
  $resposta = json_decode($resposta);
  return $resposta;
}
function get_relacao($itemestoque){
  $client = new Client(['headers' => ['Content-Type' => 'application/json']], ['http_errors' => false]);
  $response = $client->post(
    '10.15.32.11:8000/getrelacaobycliente',
    ['body' => json_encode(
      [
        "client" => 1,
        "item_estoque_principal" => $itemestoque
      
      ]
    )]
  );
  $resposta = $response->getBody();
  $resposta = json_decode($resposta);
  return $resposta;
}
$fabrica=(get_fabrica($itemestoque));
$item_dependente=(get_item_dependente($itemestoque));
$especificacao=(get_especificacao($itemestoque));
$relacao=(get_relacao($itemestoque));


?>

<div class="container-fluid">
<div class="row">
            <div class="col-md-6">
              <div class="row indigo text-white p-3 "><i class="fas fa-clipboard-list"></i> &nbsp;&nbsp; <strong>Codigo Fabrica</strong></div>
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <?php
             echo "<table class='table blue-gradient text-white'>";
             echo "<thead>";
             echo "<tr>";
             echo "<th scope='col'>Fabrica</th> </tr>";

            foreach($fabrica as $fabrica){
             
            echo "<tr><td>".$fabrica->item_estoque_fabrica."</td></tr>";
           
             
            }
            
          ?>
                <table class="table blue-gradient text-white">
                  <thead>
                    <tr>
                      <th scope="col">Especificação</th>
                   
                    </tr>
                  </thead>
                  <tbody>
                <?php  foreach($especificacao as $item){
             
             echo "<tr><td>".$item->$item_especificacao."</td></tr>";
            
              
             } ?>
             

                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-6 ">
              <div class="row indigo text-white p-3"><i class="fas fa-project-diagram"></i>&nbsp; <strong>ITENS DEPENDENTE</strong> <a class="btn btn-primary btn-sm float-right mt-0" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  <i class="fas fa-plus"></i>
                </a></div>
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table blue-gradient text-white  mb-0">
                  <thead class="blue-gradient text-white">
                    <tr>
                      <th scope="col">Codigo</th>
                      <th scope="col">Descrição</th>
                      <th scope="col"> Disponivel</th>
                      <th scope="col">Valor venda</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="collapse" id="collapseExample">
                      <th scope="row">
                        <div class="input-group input-group-sm ">

                          <input type="text" class="form-control" placeholder="insira" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                      </th>
                      <td>
                        <div class="input-group input-group-sm ">

                          <input type="text" class="form-control" placeholder="insira" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                      </td>

                      <td>


                        <button type="submit" class="btn btn-default btn-sm mt-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">OK</button>

                      </td>

                      <?php
                       foreach($item_dependente as $item){
             
            echo "<tr><th scope='row'>".$item->item_estoque_pub."</th>
                      <td>".$item->des_item_estoque."</td>
                      <td>".$item->saldo_geral."</td>
                      <td>".$item->preco_publico_atual."</td>
                      
                      </tr>";
            }?>
                  </tbody>
                </table>


              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row indigo text-white p-3"><i class="fas fa-bezier-curve"></i>&nbsp;<strong> ITENS RELACIONADOS</strong><a class="btn btn-primary btn-sm float-right mt-0" type="button" data-toggle="collapse" data-target="#colapse" aria-expanded="false" aria-controls="colapse">
                  <i class="fas fa-plus"></i>
                </a></div>
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table blue-gradient text-white">
                  <thead class="blue-gradient text-white">
                    <tr>
                      <th scope="col">Codigo</th>
                      <th scope="col">Descrição</th>
                      <th scope="col"> Disponivel</th>
                      <th scope="col">Valor venda</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="collapse" id="colapse">
                      <th scope="row">
                        <div class="input-group input-group-sm ">

                          <input type="text" class="form-control" placeholder="insira" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                      </th>
                      <td>
                        <div class="input-group input-group-sm ">

                          <input type="text" class="form-control" placeholder="insira" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                      </td>

                      <td>


                        <button type="submit" class="btn btn-default btn-sm mt-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">OK</button>

                      </td>

          </tr>
          <?php
                       foreach($relacao as $item){
             
            echo "<tr><th scope='row'>".$item->item_estoque_pub."</th>
                      <td>".$item->des_item_estoque."</td>
                      <td>".$item->saldo_geral."</td>
                      <td>".$item->preco_publico_atual."</td>
                      
                      </tr>";
            }?>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row indigo text-white p-3"><i class="far fa-images"></i>&nbsp; <strong>IMAGENS DO PRODUTO</strong></div>
















              <div class="row">

                <div class="col-md-6">
                  <form action="" enctype="multipart/form-data">

                    <div class="center">
                      <div class="form-input">
                        <div class="preview"> <img id="file-ip-1-preview" src="../img/produto.png" class="rounded " alt="inserir imagem" width="100">

                        </div>

                      </div>
                    </div>

                </div>
                <div class="col-md-6"><img src="../img/produto.png" class="rounded float-left" alt="inserir imagem" width="100">
               

                </div>
                <div class="col-md-6"><img src="../img/produto.png" class="rounded float-left" alt="inserir imagem" width="100">
              

                </div>
                <div class="col-md-6"><img src="../img/produto.png" class="rounded float-left" alt="inserir imagem" width="100">
              

                </div>
                </form>
              </div>









          </div>

            </div>