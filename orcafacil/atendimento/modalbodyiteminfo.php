<?php //var_dump($_POST); 
require '../Class/Atendimento.php';
$dados = Infoproducts::Getinfo($_POST['itemestoque']);
global $dados;
$dados = json_decode($dados);
//var_dump($dados);
//var_dump($_SESSION);

$_SESSION['ordem']=1;
?>
<div class='container flex col'>
            <h5 class='font-weight-bold'>Descrição</h5>
            <p><?php 
   
            echo($dados[0]->descricao); ?></p>
            <h5 class='font-weight-bold'>Utilização</h5>
            <p>
            <p><?php echo $dados[0]->utilizacao ?></p>
            </p>
            <h5 class='font-weight-bold'>Preço</h5>
            <p id='editprice$i'>R$     <?php echo $dados[0]->precopublico ?></p>
            <div id='desconto$i' class='md-form'>
              <input type='text' id='desconto' class='form-control' />
              <label for='desconto'>Margem de venda</label>
            </div>
            <h5 class='font-weight-bold'>Quantidade</h5>
            <div class='md-form'>
              <input type='number' id='qtd' class='form-control' />
              <label for='numberExample'>Selecionar</label>
            </div>
            <h5 class='font-weight-bold'>Selecionar tipo de desconto</h5>
            <select id='tipod' class='browser-default custom-select'>
              <option selected hidden>Selecionar</option>
              <option value='1'>Valor em reais</option>
              <option value='2'>Valor em porcentagem</option>
            </select>
            <div id='desconto$i' class='md-form'>
              <input type='text' id='desconto' class='form-control' />
              <label for='desconto'>Valor</label>
            </div>

         
          </div>
          <div class='modal-footer'>
          <button type='button' onclick=<?php echo "sendorcamento(".$dados[0]->itemestoque.",".$_SESSION['client']['codclient'].",".$_SESSION['vendedor']['id'].",".$_SESSION['ordem'].") " ?>class='btn btn-primary rounded-lg'>
            Adicionar a cesta
          </button>
        </div>