<?php 
require 'config.php';

function somatorioqtdcontabilcomgiro($conexao, $desquebra1, $mes, $ano, $empresa){
    $total = mysqli_query($conexao, "Select sum(qtdcontabil) from tabelaestoque1 where media4!=0 and desquebra1='$desquebra1' and mes=$mes and ano=$ano and empresa='$empresa'");
    $total = mysqli_fetch_row($total);
    $total = $total[0];
    return number_format($total);
  }
$totalizadortabelacomgiro  = mysqli_query($conexao, "Select sum(qtdcontabil) from tabelaestoque1 where media4>0 and mes=$mes and ano=$ano and empresa='$empresa'");
$totalizadortabelacomgiro = mysqli_fetch_row($totalizadortabelacomgiro);
$totalizadortabelacomgiro = $totalizadortabelacomgiro[0];

//querys de valores do custo total
function somatoriovalorcustotalcomgiro($conexao,$desquebra1,$mes,$ano,$empresa){
    $valorcomgiro = mysqli_query($conexao, "Select sum(custototal) from tabelaestoque1 where media4>0 and desquebra1='$desquebra1' and mes=$mes and ano=$ano and empresa='$empresa'");
    $valorcomgiro = mysqli_fetch_row($valorcomgiro);
    $valorcomgiro = $valorcomgiro[0];
    return number_format($valorcomgiro);
}
$totalizadorvalorcomgiro = mysqli_query($conexao, "Select sum(custototal) from tabelaestoque1 where media4!=0 and mes=$mes and ano=$ano and empresa='$empresa'");
$totalizadorvalorcomgiro = mysqli_fetch_row($totalizadorvalorcomgiro);
$totalizadorvalorcomgiro = $totalizadorvalorcomgiro[0];

  function girovssemgiro($conexao,$desquebra1,$mes,$ano,$empresa){
$resultado1 = mysqli_query($conexao, "select SUM(qtdcontabil), SUM(custototal), SUM(media4),COUNT(id) FROM `tabelaestoque1` WHERE desquebra1='$desquebra1' and media4=0 and empresa = '$empresa' and mes=$mes and ano=$ano ");
$resultado2 = mysqli_query($conexao, "Select count(media4) from tabelaestoque1 WHERE desquebra1='$desquebra1' and media4=0 and empresa = '$empresa' and mes=$mes and ano=$ano ");
$resultado2 = mysqli_fetch_row($resultado2);
$resultado2 = $resultado2[0];
foreach ($resultado1 as $resultado) {

    echo "<td style= 'text-align: center;'>";
    echo (number_format($resultado['SUM(qtdcontabil)']));
    echo "</td>";
    echo "<td style= 'text-align: center;'> ";
    echo (number_format($resultado['SUM(custototal)']));
    echo "</td><td style= 'text-align: center;'>";
    echo somatorioqtdcontabilcomgiro($conexao,$desquebra1,$mes,$ano,$empresa);
    echo "</td><td style= 'text-align: center;'>";
    echo somatoriovalorcustotalcomgiro($conexao,$desquebra1,$mes,$ano,$empresa);
    echo "</td></tr><tr>";}



}



?>