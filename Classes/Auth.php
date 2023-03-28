<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class Valida
{
  public function Autenticar(string $user, string $senha, int $revenda)
  {
    $client = new Client(['headers' => ['Content-Type' => 'application/json']], ['http_errors' => false]);
    $response = $client->post(
      '10.15.32.11:8000/userAuth',
      ['body' => json_encode(
        [
          "login" => "$user",
          "cpf" => "$senha",
          "revenda" => $revenda
        ]
      )]
    );
    $resposta = $response->getBody();
    $resposta = json_decode($resposta);
  
 
    if ($resposta == 'false') {
      return false;
    } else {
       $_SESSION['vendedor']['revenda'] = $resposta->Revenda;
       $_SESSION['vendedor']['nome'] = $resposta-> VendedorName;
      $_SESSION['vendedor']['id'] =$resposta->CodVendedor;
      $_SESSION['vendedor']['cpf'] =$resposta->CpfVendedor;
      return true;
    }
  }
}
