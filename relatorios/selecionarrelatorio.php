<?php



require 'class/Report.php';




if ($_POST['mapeamento']) {

           header("location: models/mapeamento.php?datainicio=".$_POST['datainicio']."&datafim=".$_POST['datafim']);}
     
           if ($_POST['vendaanalitico']){

            header("location: models/analitico.php?datainicio=".$_POST['datainicio']."&datafim=".$_POST['datafim']);
           }

           if ($_POST['analise']){

            header("location: models/analisevendas.php?datainicio=".$_POST['datainicio']."&datafim=".$_POST['datafim']);
           }
           if ($_POST['contaspagar']){

            header("location: models/contasapagar.php?datainicio=".$_POST['datainicio']."&datafim=".$_POST['datafim']);
           }if ($_POST['liquidado']){

            header("location: models/liquidado.php?datainicio=".$_POST['datainicio']."&datafim=".$_POST['datafim']);
           }if ($_POST['rastreioItens']){

            header("location: models/rastreioModelOne.php?datainicio=".$_POST['datainicio']."&datafim=".$_POST['datafim']);
           
            }if ($_POST['rastreioItens2']){

            header("location: models/rastreioModelTwo.php?datainicio=".$_POST['datainicio']."&datafim=".$_POST['datafim']);
           }
