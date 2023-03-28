<?php
session_start();
$usuario = $_SESSION['email'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/phosphor-icons"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  <script src="src/javascript/requisitions/ajax.js"></script>
  <link rel="stylesheet" href="src/styles/input.css">

  <title>NF - Main Page <?php //echo $_SESSION['empresa']; ?></title>
</head>
<body class="bg-[#464646]">

  <!-- Wrapper -->
  <div class="flex">

    <!-- Side Bar -->
    <div class="hidden lg:flex min-w-[200px] bg-[#333333] min-h-screen px-6 py-3 gap-8 flex flex-col self-start">
      <div>
        <img src="src/img/Data Page XML Small.png" alt="">
      </div>
      <div class="flex flex-col gap-4">
        <form method="POST" name="cadastrarnota" action="controllers/filemanipulation.php" enctype="multipart/form-data">
        <input style='width:9rem;' name='nota' type="file" class="bg-[#367362] rounded-md py-3 px-2 text-white rounded-md hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]"/>
        <button value='01' type="submit" name="enviarnota" class="bg-[#367362] rounded-md py-3 px-2 text-white rounded-md hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]" >Enviar NF</button>

      
      </form>
        <button class="bg-[#367362] rounded-md py-3 px-2 text-white rounded-md hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]">Notas Pendentes</button>
        <button onclick="window.location.href='views/index.php'"class="bg-[#367362] rounded-md py-3 px-2 text-white rounded-md hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]">Notas lançadas</button>
        <button onclick="window.location.href='views/avulso.php'" class="bg-[#367362] rounded-md py-3 px-2 text-white rounded-md hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]">Avulso</button>
        
      </div>
    </div>

    <div class="w-full flex flex-col">
      <!-- Header -->
      <div class="bg-[#5a5a5a] flex justify-between items-center py-3 px-8">
        <div class="flex items-center gap-3">
          <i class="ph-list text-2xl text-white block lg:hidden"></i>
          <h1 class="hidden sm:block text-white text-2xl">Gestão de XML</h1>
        </div>
        <div class="flex items-center gap-4">
          <h1 class="text-white"><?php echo $_SESSION['email'] ;?></h1>
          <img class="hidden lg:block"  alt="">
          <i class="ph-sign-out text-white text-2xl"></i>
        </div>
      </div>

      <!-- Table -->
      <div class="mt-6 mx-4">
        <div class="flex justify-between mb-3">
          <div>
            <button class="bg-[#367362] rounded-md py-3 px-2 text-white rounded-md hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]">Emitidas</button>
            <button class="bg-[#367362] ml-2 rounded-md py-3 px-2 text-white rounded-md hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]">Recebidas</button>
          </div>
          <div class="flex items-center">
            <h1 class="text-xl text-[#efefef] mr-3">Página (n da página)</h1>
            <a class="rounded-[50%] h-[20px] w-[20px] mt-1 text-center bg-[#333333] hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]" href="#"></a>
            <a class="rounded-[50%] h-[20px] w-[20px] mt-1 ml-1 text-center bg-[#367362] hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]" href="#"></a>
          </div>
        </div>
        <table class="w-full rounded-md text-center"> <!-- ta no template errado -->
          <tr class="bg-[#5a5a5a]">
     
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">Data da nota </th>
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">Números</th>
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">CNPJ</th>
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">Visualizar PDF</th>
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">Transação</th>
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">Departamento</th>
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">Data de pagamento</th>
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">Origem</th>
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">OBS</th>
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">START</th>
  

          </tr>
          <tr>
            <?php
            
            require 'scripts/listagemdenotas.php';
            ?>
          </tr>
        </table>
      </div>
    </div>

  </div>  

</body>

</html>
