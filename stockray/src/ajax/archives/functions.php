<?php 
function setarcores($condicao){
  if ($condicao == 201){
    echo '#006400';
  }if ($condicao=='204'){
    echo '#3CB371';
  }
  
  if ($condicao== '228' or $condicao== '229' or $condicao== '230' or $condicao== '231' or $condicao== '237'  or $condicao== '245' or $condicao== '264' or $condicao== '302' or $condicao== '303' or $condicao== '307' or $condicao== '232' or $condicao== '241' or $condicao== '300' or $condicao== '305' or $condicao == '235' or $condicao=='265' or $condicao=='240' or $condicao== '203' or $condicao== '256'or $condicao== '302' or $condicao== '244' or $condicao== '228' or $condicao== '263' or $condicao== '242' or $condicao== '306' or $condicao== '233'){


    echo '#FF8800';
  }
  if ($condicao>370 and $condicao<377){
    echo '#20B2AA';

  }
  if ($condicao == 902){
      echo '#FF0000';
  }
  if ($condicao== 238){
      echo '#FF00FF';
  }
 
}
function escolherrevenda($revenda){
  switch ($revenda) {
    case 1:
        $revenda= "MATRIZ - 1";
        break;
    case 2:
      $revenda= "OFICINA - 2";
      break;
    case 3:
      $revenda= "BOA-VISTA - 3";
      break;
        case 4:
          $revenda= "CAMAPUA - 4";
          break;
}
return $revenda;
}

 function receberdadosapi($url){ 

 // $url = "http://10.15.32.11:8000/gerenciais/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim)."";

      //     var_dump($url);
           $ch = curl_init($url);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
           $valor =  json_decode(curl_exec($ch), true);
           return $valor;

 }
 function percent ($primeiraconta,$totalizador){
  $total = ($primeiraconta/$totalizador)*100;
  $total = round($total,2);
  return $total;}

   $datainicio = $_GET['datainicio'];
 $datafim = $_GET['datafim'];

 //var_dump($dados);


 function lerinfogeral($array){
   $data=array();

    foreach ($array as $info){

    $data['valorbruto']+=$info[0];
    $data['descontos']+=$info[1];
    $data['customedio']+=$info[2];
    $data['valormenosdesconto']+=$info[3];
    $data['devolucoes']+=$info[4];
    

    

    



    }

return $data;
 }




?>