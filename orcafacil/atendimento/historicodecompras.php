<?php require '../Class/Atendimento.php'; ?>
<section class="container ">
  <table id="dtBasicExample" style="text-align:center;" class=" blue-gradient  text-white">
    <thead>
      <tr>
      <th class="th-sm text-center"> Transacao
        </th>
      <th class="th-sm text-center"> Revenda
        </th>
        <th class="th-sm text-center">Numero da nota
        </th>
        <th class="th-sm"> Data nota
        </th>
        <th class="th-sm">Nome do cliente
        </th>
        <th class="th-sm">Preço do item (nota)
        </th>
        <th class="th-sm">Quantidade

        </th>
      </tr>
    </thead>
    <tbody>
      <?php

      echo historicocompra::GetSales($_POST['itemestoque']);
      ?>


    </tbody>
  </table>
</section>