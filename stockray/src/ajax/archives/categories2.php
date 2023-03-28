<?php
set_time_limit(3600);
require '../../scripts/config.php';

$empresa='rj';
// NAO0 CATEGORIZAR POR MES
// MAS IR ADICIONANDO E FAZENDO A COMPARACAO POR ANO
// O ANO DOS ITENS QUE FICAM SEM GIRO 
// SE O ITEM FOI SEM GIRO NO ANO, ele fica sem giro o resto do ano todo todo ano
// selecionar empresa
// erro null e concatenacao processa2.php estoque aspas simples e variavel
$mes = 05;
$ano=2013;
echo "<pre>";
$select = mysqli_query($conexao, "select * from itensn where mesn=$mes-3 ");
$result1 = mysqli_fetch_all($select);
var_dump($result1);
if ($result1 == null){

echo 'nao deu certo';

}else{
    echo 'deu certo';
    foreach ($result1 as $res)
    {
        if ($res[1]!= null){
            $query = mysqli_query($conexao, "select SUM(demanda1+demanda2+demanda3+demanda4) from tabelaestoque1 where itemestoquepub='$res[1]' and mes=$mes and ano=$ano and empresa='$empresa'");
            $resultdemanda = mysqli_fetch_row($query);
            echo $resultdemanda[0];
            $query1 = mysqli_query($conexao, "Select qtdcontabil from tabelaestoque1 where itemestoquepub='$res[1]' and mes=$mes and ano=$ano and empresa='$empresa'");
            $resultqtdcontabil=mysqli_fetch_row($query1);
            if($resultqtdcontabil[0] == 0){
                $qtdcontabil=0;
            }else{
                $qtdcontabil= $resultqtdcontabil[0];
            }
            if($resultdemanda[0]==0){
                $soma=0;
            }else{
            
                $soma=$resultdemanda[0]/120;
                $soma = round($soma, 6);
                echo $soma;
            }
            if($soma!=0 && $qtdcontabil!=0){
                $cobertura = $qtdcontabil / $soma; 

                echo ( $res[1]."  e a cobertura é" .$cobertura.'<br>');
              $update=mysqli_query($conexao, "update tabelaestoque1 set classificacao='', media4=$cobertura where itemestoquepub='$res[1]' and mes=$mes and ano=$ano and empresa='$empresa'");
            }else{
                $cobertura=0;
                echo 'é um item sem giro';
           $update= mysqli_query($conexao, "update tabelaestoque1 set classificacao='SG', media4=$cobertura where itemestoquepub='$res[1]' and mes=$mes and ano=$ano and empresa='$empresa'");
            }
   
            
        }

    }
}
