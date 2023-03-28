<?php



//print_r($resultado);
//$resultado = str_replace(array('['),array('vazio'),array($resultado));

function chamardadosgraficocover($conexao,$empresa,$ano,$query){
$empresa = $empresa;
$resultado = mysqli_query($conexao,"Select sum(custototal) from tabelaestoque1 where $query and ano=$ano and EMPRESA='$empresa' GROUP BY MES");
$resultado = mysqli_fetch_all($resultado);
echo '[ ';

foreach ($resultado as $result){

    echo ($result[0]);
    echo ', ';

}
echo 'null]';
}





//echo json_decode($resultado);



?>