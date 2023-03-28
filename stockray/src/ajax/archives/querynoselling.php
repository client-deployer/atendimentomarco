<?php

$totalizadorsemgirovalor= mysqli_query($conexao,"Select sum(custototal) from tabelaestoque1 where media4=0 and classificacao ='SG' and mes=$mes and ano=$ano and empresa='$empresa'");
$totalizadorsemgirovalor= mysqli_fetch_row($totalizadorsemgirovalor);
$totalizadorsemgirovalor= $totalizadorsemgirovalor[0];

$totalizadorcomgirovalor= mysqli_query($conexao,"Select sum(custototal) from tabelaestoque1 where media4!=0 and classificacao !='SG' and mes=$mes and ano=$ano and empresa='$empresa'");
$totalizadorcomgirovalor= mysqli_fetch_row($totalizadorcomgirovalor);
$totalizadorcomgirovalor=$totalizadorcomgirovalor[0];


?>