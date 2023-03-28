<?php
session_start();
$result = False;

if ($result) {

    echo json_encode("Sucesso");
} else {
    echo json_encode("Falha");
}

?>