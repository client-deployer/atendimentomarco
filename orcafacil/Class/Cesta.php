<?php
function receberdadoscesta($contato)
{

    $url = "http://10.15.32.11:8000/cestasearch/" . $contato;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $valor = json_decode(curl_exec($ch), true);
    return $valor;

}


class Cesta
{
    public $contato;
    private $dados;
    public $precototal;



    function __construct($numeropedido)
    {
        $this->contato = $numeropedido;
        $this->dados = receberdadoscesta($this->contato);


    }



    public function calculandototal()

    {

        $this->objectdados =  json_decode($this->dados);
        foreach ($this->objectdados as $data) {

            $this->precototal += $data->preco * $data->qtd_solicitada;
            $this->descontos += $data->descontos;
        }
        return $this->precototal;


    }






    public function escrevercesta()
    {

      return $this->dados;


        




    }


}



?>