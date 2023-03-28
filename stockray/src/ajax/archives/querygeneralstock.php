<?php 
require 'config.php';



$graficobarra1 = mysqli_query($conexao, "select SUM(custototal) FROM `tabelaestoque1` WHERE   empresa = '$empresa' and mes=$mes and ano=$ano and desquebra1!=''");
$graficobarra1 = mysqli_fetch_row($graficobarra1);
$graficobarra1 = $graficobarra1[0];
//$graficobarra1= number_format($graficobarra1);
$graficobarra2 = mysqli_query($conexao, "select SUM(custototal) FROM `tabelaestoque1` WHERE  empresa = '$empresa' and mes=$mes-1 and ano=$ano and desquebra1!=''");
$graficobarra2 = mysqli_fetch_row($graficobarra2);
$graficobarra2 = $graficobarra2[0];
//$graficobarra2= number_format($graficobarra2);
if ($graficobarra2==0 || $graficobarra2==null){
$graficobarra2=0;
}else{
}
$graficobarra3 = mysqli_query($conexao, "select SUM(custototal) FROM `tabelaestoque1` WHERE empresa = '$empresa' and mes=$mes-2 and ano=$ano and desquebra1!=''");
$graficobarra3 = mysqli_fetch_row($graficobarra3);
$graficobarra3 = $graficobarra3[0];
//$graficobarra3= number_format($graficobarra3);
if ($graficobarra3==0 || $graficobarra3==null){
    $graficobarra3=0;
    }else{
    }
$graficobarra4 = mysqli_query($conexao, "select SUM(custototal) FROM `tabelaestoque1` WHERE  empresa = '$empresa' and mes=$mes-3 and ano=$ano and desquebra1!=''");
$graficobarra4 = mysqli_fetch_row($graficobarra4);
$graficobarra4 = $graficobarra4[0];
$graficobarra4= ($graficobarra4);
if ($graficobarra4==0 || $graficobarra4==null){
    $graficobarra4=0;
    }else{
    }

    $graficobarra5 = mysqli_query($conexao, "select SUM(custototal) FROM `tabelaestoque1` WHERE empresa = '$empresa' and mes=$mes-4 and ano=$ano and desquebra1!=''");
$graficobarra5 = mysqli_fetch_row($graficobarra5);
$graficobarra5 = $graficobarra5[0];
$graficobarra5= ($graficobarra5);
if ($graficobarra5==0 || $graficobarra5==null){
    $graficobarra5=0;
    }else{
    }
    $graficobarra6 = mysqli_query($conexao, "select SUM(custototal) FROM `tabelaestoque1` WHERE empresa = '$empresa' and mes=$mes-5 and ano=$ano and desquebra1!=''");
$graficobarra6 = mysqli_fetch_row($graficobarra6);
$graficobarra6 = $graficobarra6[0];
$graficobarra6= ($graficobarra6);
if ($graficobarra6==0 || $graficobarra6==null){
    $graficobarra6=0;
    }else{
    }
    $graficobarra7 = mysqli_query($conexao, "select SUM(custototal) FROM `tabelaestoque1` WHERE empresa = '$empresa' and mes=$mes-6 and ano=$ano and desquebra1!=''");
    $graficobarra7 = mysqli_fetch_row($graficobarra7);
    $graficobarra7 = $graficobarra7[0];
    $graficobarra7= ($graficobarra7);
    if ($graficobarra7==0 || $graficobarra7==null){
        $graficobarra7=0;
        }else{
        }

?>