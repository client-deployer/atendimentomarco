<?php
session_start();

require '../Class/Atendimento.php';


$atendimento = new Atendimento($_SESSION['vendedor']['revenda'],$_SESSION['vendedor']['id'],$_SESSION['client']['codclient']);






?>