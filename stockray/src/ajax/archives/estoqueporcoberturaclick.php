<?php require 'config.php';


function queryclick($conexao,$query,$mes,$ano,$empresa){
    $resultado1 = mysqli_query($conexao, "select desquebra1,itemestoquepub,desitemestoque,qtdcontabil,custototal,media4 FROM `tabelaestoque1` $query and empresa='$empresa' and ano=$ano and mes=$mes and desquebra1!='' ORDER BY media4 ASC");
      //   $linhas2 = mysqli_fetch_assoc($resultado1);



      foreach ($resultado1 as $resultado) {
        
        switch ($resultado['media4']){
          case 0:
            $sugestaodecompra = 'SG';
            break;
          default:
          $sugestaodecompra = ($resultado['qtdcontabil']/$resultado['media4']);
          $sugestaodecompra = $sugestaodecompra*60 ;
          $sugestaodecompra = $sugestaodecompra - $resultado['qtdcontabil'];
          $sugestaodecompra = number_format($sugestaodecompra);
        }
        echo '<td>';
        echo $resultado['desquebra1'];
        echo '</td><td>';
        echo $resultado['itemestoquepub'];
        echo '</td><td>';
        echo $resultado['desitemestoque'];
        echo "</td>";
        echo "<td style='text-align: center;'>";
        echo $resultado['qtdcontabil'];
        echo "</td>";
        echo "<td style='text-align: center;'>";
        echo $resultado['custototal'];
        echo "</td>";
        echo "<td style='text-align: center;'>";
        echo $resultado['media4'];
        echo "</td>";
        echo "<td style='text-align: center;'>$sugestaodecompra </td>";
        echo "</tr>";

      }


}

?>


<input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" style='color:black' type="button" value="Imprimir" onClick="window.print()"/>

<table class="u-table-entity">

  <colgroup>
    <col width="20%">
    <col width="20%">
    <col width="20%">
    <col width="20%">
    <col width="20%">
    <col width="40%">
  </colgroup>
  <tr style="text-align: center;">
    <td>Categoria</td>
    <td>Codigo do Item</td>
    <td>Descrição do item</td>
    <td>Qtd contabil</td>
    <td>Custo total</td>
    <td>Dias de cobertura</td>
    <td>S.Comp (60)</td>
  </tr>

  <tr>
    <?php


    $menina = $_REQUEST['submit'];
    $empresa = $_REQUEST['empresa'];
    $mes = $_REQUEST['mes'];
    $ano= $_REQUEST['ano'];
    if ($menina == 15) {
      $query =  "WHERE media4!=0 AND media4<=15 and classificacao !='SG'" ;
     echo queryclick($conexao,$query,$mes,$ano,$empresa);
    }
    if ($menina == 16) {
      $query =  "WHERE media4>=15 AND media4<=30.99 and classificacao !='SG'" ;
      echo queryclick($conexao,$query,$mes,$ano,$empresa);
    }
    if ($menina == 31) {
      $query =  "WHERE media4>=31 AND media4<=60.99 and classificacao !='SG'" ;
      echo queryclick($conexao,$query,$mes,$ano,$empresa);
    
    }
    if ($menina == 61) {
      $query = "WHERE media4>=61 AND media4<=120 and classificacao !='SG'";
      echo queryclick($conexao,$query,$mes,$ano,$empresa);
    }
    if ($menina == 121) {
      $query = "WHERE media4>=121 AND media4<=360 and classificacao!='SG'";
      echo queryclick($conexao,$query,$mes,$ano,$empresa);
    }
    if ($menina == 360) {
      $query = "WHERE media4>360 and classificacao != 'SG'";
      echo queryclick($conexao,$query,$mes,$ano,$empresa);

    }
    if ($menina == 0) {
      $query = "WHERE classificacao='SG'";
      echo queryclick($conexao,$query,$mes,$ano,$empresa);
     
    }
    ?>
    </tbody>
</table>


</html>