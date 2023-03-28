<?php
  require '../src/scripts/config.php';
  $totalizadorsemgiroqtdcontabil = mysqli_query($conexao, "Select sum(qtdcontabil) from tabelaestoque1 where media4=0 ");
  $totalizadorsemgiroqtdcontabil = mysqli_fetch_row($totalizadorsemgiroqtdcontabil);
  $totalizadorsemgiroqtdcontabil= $totalizadorsemgiroqtdcontabil[0];

  $totalizadorsemgirovalor= mysqli_query($conexao,"Select sum(custototal) from tabelaestoque1 where media4=0");
  $totalizadorsemgirovalor=mysqli_fetch_row($totalizadorsemgirovalor);
  $totalizadorsemgirovalor=$totalizadorsemgirovalor[0];


  $contadormedia4semgiro = mysqli_query($conexao, "Select count(media4) from tabelaestoque1 where desquebra1 != '' and media4=0 ");
  $contadormedia4semgiro= mysqli_fetch_row($contadormedia4semgiro);
  $contadormedia4semgiro=$contadormedia4semgiro[0];

?>