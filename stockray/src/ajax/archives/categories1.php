<?php
set_time_limit(3600);
require '../../scripts/config.php';

$empresa='rv';
// NAO0 CATEGORIZAR POR MES
// MAS IR ADICIONANDO E FAZENDO A COMPARACAO POR ANO
// O ANO DOS ITENS QUE FICAM SEM GIRO 
// SE O ITEM FOI SEM GIRO NO ANO, ele fica sem giro o resto do ano todo todo ano
// selecionar empresa
$mes = 03;
$ano=2022;

$select = mysqli_query($conexao, "select descricaoitem,mes_sg from tabelasemgiro where ano_sg=$ano and empresa='$empresa'");
$result1 = mysqli_fetch_all($select);
var_dump($result1);

    foreach ($result1 as $roi){
    // caso o mes seja diferente de janeiro ele vai rodar dentro de um foreach pra ir vendo se cada
    //produto de janeiro continua SG nos outros meses
    // se ele n estiver
    $item = $roi[0];
    $messg = $roi[1];
    $query="select classificacao from tabelaestoque1 where mes=$mes and ano=$ano and empresa='$empresa' and itemestoquepub='$item'";
      $select = mysqli_query($conexao,$query);
      $result = mysqli_fetch_row($select);
      $result = $result[0];
      if ($result ==''){
       
          echo 'ja deu certo';
        $update = mysqli_query($conexao,"update tabelaestoque1 set classificacao='SG' where itemestoquepub='$item' and mes>$messg and empresa='$empresa' and ano='$ano'");
        echo 'atualizei';
      
    }
    }
    

          


          ?>