<?php
set_time_limit(3600);
require '../../scripts/config.php';
$insert = mysqli_query($conexao,"Insert into tabelasemgiro (descricaoitem,mes_sg,ano_sg,empresa) Values (120, 01, 2013, 'rf')") ;
          ?>