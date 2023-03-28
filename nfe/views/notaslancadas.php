<?php

require '../scripts/pdo.php';
$listagemnotas ="select id, obs, numero_nota, envionota,nomearquivo, usuario_envio, datadeemissao, origens, client_cnpj,transacao,departamento,datadepagamento from notas where class= '1' order by id DESC";
$result_notas=$pdo->prepare($listagemnotas);
$result_notas -> execute();
echo '<pre>';
while($row_usuario = $result_notas->fetch(PDO::FETCH_ASSOC) ){
    extract($row_usuario);
   // $envionota= $row_usuario['envionota'];
   // $numerodanota= $row_usuario['numero_nota'];
    echo "
<tr>
   <!-- <td id='identificador$id' class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>$id</td> -->
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>$datadeemissao</td>
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>$numero_nota</td>
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>$client_cnpj</td>
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>";echo "<a href='../controllers/notas/$id/$nomearquivo'>nota</a>";echo"</td>
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>
             $transacao
            </td>
            <td class='border-2 border-[#333333] bg-[#929292] text-orange py-1 px-8'>
              $departamento
            </td>
            <td class='border-2 border-[#333333] bg-[#087e17] text-[#580c0c] py-1 px-8'>
              $datadepagamento
            </td>
          <!--  <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>
              <select name='destino' defaulr='Despesa' id='destino'>
                <option value='103'>103</option>
                <option value='bb'>BB</option>
              </select>
            </td> -->
            <td class='border-2 border-[#333333] bg-[#929292] text-orange py-1 px-8'>
           $origens </TD>
           <td class='border-2 border-[#333333] bg-[#929292] text-orange py-1 px-8'>
           $usuario_envio </TD>
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>
              $obs
              
            </td>

            </tr> ";

}









?>