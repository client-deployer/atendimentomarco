<?php
    session_start();
    

    require 'vendor/autoload.php';

   // $usuario = addslashes($_POST['usuario']);
    
 //   $senha = md5($_POST['senha']);

 use GuzzleHttp\Client; 
$client = new Client();
$body = [
  'body' =>
      [
          'login' => $_POST['usuario'],
          'cpf'=> $_POST['senha'],
          'revenda'=>$_POST['revenda'],

      ]
];

$param = $body;


$request = $client->createRequest('POST', '10.15.32.11:8000/userAuth', $param);
       





    
        if(($request) != NULL){
            $_SESSION['vendedor']['revenda'] = $validar[0];
            $_SESSION['vendedor']['nome'] = $validar[1];
            $_SESSION['vendedor']['id'] = $validar[3];
            header('Location: searchclient/home.php');
            exit;

          /////////////////////////////   var_dump($_SESSION);

            //  die;
         
          //  exit();
        } else {
            
            echo "voce nao esta cadastrado";
          //  redirect_login("E-mail ou senha inválidos.");
        }
        
    