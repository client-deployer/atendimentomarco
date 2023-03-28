<?php
require 'config.php';
        function estoqueporcobertura($conexao, $continuacaodaquery,$desquebra1, $empresa,$mes,$ano ){

                $resultado1 = mysqli_query($conexao, "select SUM(custototal) FROM `tabelaestoque1` $continuacaodaquery and desquebra1='$desquebra1' and empresa = '$empresa' and mes=$mes and ano=$ano");
            
                foreach ($resultado1 as $resultado) {
                    echo "<td style='text-align : center;'>";
                    echo number_format($resultado['SUM(custototal)']);
                    echo "</td>";
                        
                }

               

        }

      function totalizadorestoqueporcobertura($conexao,$continuacaodaquery, $empresa, $mes, $ano){
        $resultado1 = mysqli_query($conexao, "select sum(custototal) from `tabelaestoque1` $continuacaodaquery and empresa = '$empresa' and mes=$mes and ano=$ano");
            
        foreach ($resultado1 as $resultado) {
            echo "<td style='text-align : center;'>";
            echo (number_format($resultado['sum(custototal)']));
            echo "</td>";
                
        }

      }


?>