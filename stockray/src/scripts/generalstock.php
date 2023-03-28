<?php
  require 'config.php';

  $totalizadorgeneralstockqtdcontabil = mysqli_query($conexao,"Select sum(qtdcontabil) from tabelaestoque1");
  $totalizadorgeneralstockqtdcontabil = mysqli_fetch_row($totalizadorgeneralstockqtdcontabil);
  $totalizadorgeneralstockqtdcontabil = $totalizadorgeneralstockqtdcontabil[0];


  $totalizadorgeneralstockvalor = mysqli_query($conexao,"Select sum(custototal) from tabelaestoque1");
  $totalizadorgeneralstockvalor = mysqli_fetch_row($totalizadorgeneralstockvalor);
  $totalizadorgeneralstockvalor=$totalizadorgeneralstockvalor[0];

  $contadormedia4 = mysqli_query($conexao, "Select count(media4) from tabelaestoque1 where desquebra1 != '' ");
  $contadormedia4= mysqli_fetch_row($contadormedia4);
  $contadormedia4=$contadormedia4[0];

  $totalizadorgeneralstockdays= mysqli_query($conexao, "Select sum(media4) from tabelaestoque1");
  $totalizadorgeneralstockdays=mysqli_fetch_row($totalizadorgeneralstockdays);
  $totalizadorgeneralstockdays=$totalizadorgeneralstockdays[0];

?>