<?php
function receberdadosapi($url)
{
  //  $url = "http://10.15.32.11:8000/cestasearch/";
    //     var_dump($url);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $valor = json_decode(curl_exec($ch), true);
    return $valor;
}

class Checkout   {
   
    private array $produtoscomprados;
    public $dadosproduto;
    public $total;

  function  __construct($codcliente,$contato){

    //receberdadosapi($url);
    $url = "http://10.15.32.11:8000/checkoutdata/".$codcliente."/".$contato."/".$_SESSION['vendedor']['revenda'];
    $this->dadosproduto = receberdadosapi($url);
    $this->total = $this->somandototal();
    //var_dump($this->total);
   
 //  var_dump($this->dadosproduto);
 //return 
    }


    public function echocondicoesdisponiveis(){
      $condicoes = $this->dadosproduto[2][0];
        $this->condicoes = json_decode($condicoes);
        return $this->condicoes;
  //       foreach($this->dadosproduto[2][0] as $data){   
     
  //         echo"
            
  //   <tr>
  //   <td><button type='button' class='view_data btn' id='".$data[1]."'  cod='".$data[0]."' data-dismiss='alert' > Selecionar </button></td>
  //   <td>".$data[0]."</td>
  //   <td>".$data[1]."</td>
   
  // </tr>";

  //       }

    }


    private function somandototal(){

      $dados= $this->dadosproduto[1][0];
      $total=0;

      $dados = json_decode($dados);
    

        foreach($dados as $data)

        {
            $total += $data->valor_item-$data->desconto_item;
        }

        return $total;



    }

    public function listproducts(){
      $this->listproducts= $this->dadosproduto[1][0];
      return $this->listproducts;
     
     
        
    }

    public function clientinfo(){
          $this->clientinfo= $this->dadosproduto[0];
          return $this->clientinfo;
       
        
    }
 
}
?>