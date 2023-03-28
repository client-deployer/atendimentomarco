<?php
$host = 'localhost';
$user = "root";
$pass = "";
$dbname = "notafiscal";
$port = 3306; 

try{
 $conn = new PDO ("mysql:host=$host; dbname=". $dbname, $user, $pass);

}catch(PDOException $err){
echo "o servidor nao conseguiu se conectar " . $err->getMessage();

}
?>