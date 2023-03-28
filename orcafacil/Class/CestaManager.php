<?php 
function  receberdadosapi($url){ 

    // $url = "http://10.15.32.11:8000/gerenciais/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim)."";
   
         //     var_dump($url);
              $ch = curl_init($url);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
              $valor =  json_decode(curl_exec($ch), true);
              return $valor;
   
    }


 abstract Class DeleteItemBalcao{

    public static function DeleteItem($itemestoque,$contato,$revenda){
        $url =   "http://10.15.32.11:8000/cestadelete/".$itemestoque."/".$contato."/".$revenda;
        $dados = receberdadosapi($url);
        if ($dados==true){
            echo 'deletado com sucesso';
        }else{
           // die();
        
            echo json_encode("Falha");
        }
        






}
 }

?>