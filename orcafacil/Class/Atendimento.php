<?php
session_start();
require '../atendimento/functions.php';


Abstract Class ContinueAtentimento{

public static function Continuarat(){

$_SESSION;

}

    
}






class Atendimento
{
    public $contato;

    function __construct($revenda, $codvendedor, $codcliente)
    {
        try {
        

            $url = "10.15.32.11:8000/criarcontato/$revenda/$codvendedor/$codcliente";
            $this->contato = receberdadosapi($url);
            $url = "10.15.32.11:8000/criar_provi/$revenda/$this->contato/$codvendedor";
            $provi = receberdadosapi($url);
            $url = "10.15.32.11:8000/inserirofiatendimento/$revenda/$this->contato/$codvendedor/$codcliente";
            $provi = receberdadosapi($url);
            $url = "10.15.32.11:8000/criarocamento/$revenda/$codvendedor/$codcliente";
            $this->orcamento = receberdadosapi($url);
            $_SESSION['orcamento'] = $this->orcamento;

            header("Location: ../atendimento/atendimento.php?codigo=$this->contato&?orcamento=$this->orcamento");
            $retorno = "contato criado com sucesso";
            return $retorno;

        } catch (Exception $e) {
            echo 'Voce nao conseguiu criar o contato';
            $retorno = "voce nao coseguiu criar o contato";
            return $retorno;
        }
    }
}
abstract Class Infoproducts{
    public static function Getinfo($itemestoque){
        $url= $url = "10.15.32.11:8000/consultaritem/$itemestoque";
      $dados=  receberdadosapi($url);
      return $dados;

    
  }
    }

    abstract Class SearchAtendimentos{
        public static function GetAtendimentos($cliente){
            $url= $url = "10.15.32.11:8000/searchatendimentos/$cliente";
          $dados=  receberdadosapi($url);
          return $dados;
    
        
      }
        }




abstract Class historicocompra{
    public static function GetSales($itemestoque){
        $url= $url = "10.15.32.11:8000/historicodecompras/$itemestoque";
      $dados=  receberdadosapi($url);
      
 foreach ($dados as $item) {
  $revenda= $item[0];
    $numeronota = $item[1];
    $datanota = new DateTime($item[2]);
    $datanota= date_format($datanota,"d/m/Y ");
    $nomecliente = $item[3];
    $valortotal = $item[4];
    $quantidade = $item[5];
    echo "
          <tr>

          <td>".$revenda." </td>
          <td>
           $numeronota   </td>
            <td >$datanota</td>
            <td >
             $nomecliente
            </td>
            <td >
             $valortotal
            </td>
            <td >
             $quantidade
            </td>

  </tr>
  ";
  }
    }
}

class Consulta
{
    public $dados;
    public $pesquisa;
    public $codigo;


    function __construct($codigo)
    {

        $url = "10.15.32.11:8000/pesquisaritem/$codigo";
        try{
        $this->dados = receberdadosapi($url);
      
  
        }catch(Exception $e){
            echo $e->getMessage();
            return False;
        }
    }

    public function tableresult($revenda)
    {
           

          
            return $this->dados; 
    }
    public function tableresultconsulta($revenda)
    {
        $i = 0;
        return $this->dados;
        foreach ($this->dados as $item) {
            // switch ($revenda){
            //     case 1: $qtdrevenda= $item[8];
            //     break;
            //     case 2: $qtdrevenda = $item[9];
            //     break;
            //     case 3 : $qtdrevenda=$item[10];
            //     break;
            //     case 4: $qtdrevenda=$item[11];
            //     break;
            //    }
          
            // $margem = floatval($precopublico) - floatval($precocusto);
            // if ($precopublico == 0 or $precopublico == null or $precopublico == 'u') {
            //     $percent = 0;
            // } else {
            //     $percent = (floatval($margem) / floatval($precopublico)) * 100;
            //     $percent = round($percent, 2);
            // }
            // $precopublico = floor(floatval($precopublico) * 100) / 100;
    
       
            $i++;
        }
    }
}
