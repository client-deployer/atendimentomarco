<?php

try{
$username = 'root';
$password = '';
$pdo = new PDO ('mysql:host=localhost;dbname=notafiscal', $username, $password);

}catch(PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
}

?>