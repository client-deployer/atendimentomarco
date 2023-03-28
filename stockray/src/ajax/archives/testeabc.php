<?php
    $query = $_REQUEST['query'];
  $empresa = $_REQUEST['empresa'];

    $dbHost = '192.168.2.35';
    $dbUsername = 'update';
    $dbPassword = 'hunter2';
   $dbName = 'estoqueteste';
    
   $conexao = new mysqli ($dbHost, $dbUsername, $dbPassword, $dbName);

   function percent ($primeiraconta,$totalizador){
    $total = ($primeiraconta/$totalizador)*100;
    $total = round($total,2);
    return $total;}

    $somatorio = mysqli_query($conexao, "select SUM(consumo) from tabelaestoque1 where consumo!=0 and empresa='$empresa' and classificacao != 'SG' $query");
    $somatorio = mysqli_fetch_row($somatorio);
    $somatorio = $somatorio[0];

    $result = mysqli_query($conexao, "Select itemestoquepub,custounitario,consumo, qtdcontabil from tabelaestoque1 where consumo !=0 $query and empresa = '$empresa' and classificacao != 'SG' order by consumo DESC " );
    $result = mysqli_fetch_all($result);
    echo "
      <table style='text-align: center;' class='w-full'>
      <caption>Classificacao ABC </caption>
      <tr style='text-align:center;'>
          <td>Descrição do produto</td>
         <td>Custo unitario</td>
         <td>Consumo</td>
         <!-- <td>Qtd CTB</td> -->
         <td> % </td>
         <td> % AC </td>
         <td> ABC </td>
         
         
         </tr>
         <tr>
       ";
       $soma=0;
       $pcac=0;
    foreach ($result as $r){
      $pcrel = percent($r[2],$somatorio);

      $pcac += $pcrel;
      if($pcac>=0 && $pcac<80){
        $classificacao = 'A';
      }if($pcac>=81 && $pcac<95){
        $classificacao = 'B';
      }if($pcac>=95){
          $classificacao = 'C';
      }// se for de 0 a 80 ele deve aparecer A e nao esta. eu ja tentei por switch tbm, if foi minha ultima
      // opcao
      //e  nao funfa mostra no navegador

        echo "<td>". $r[0]."</td><td> ".$r[1]."</td><td>".$r[2]."</td><!--<td>".$r[3]." </td> --><td>$pcrel </td><td> $pcac</td><td>$classificacao</td></tr>";
    

        $soma += $r[2];


  }


?><tr><td>Totalizador</td><td><?php echo $somatorio; ?></td><td><?php echo $soma; ?></td></tr>