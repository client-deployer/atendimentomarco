<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>Stock - X RAY</title>
  
   <script src="https://cdn.tailwindcss.com"></script> 
  <link rel="stylesheet" href="./src/styles/input.css" media="screen">
  <link rel="stylesheet" href="./src/styles/graph.css" media="screen">
  <script src="https://unpkg.com/phosphor-icons"></script>
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="./src/ajax/requisitions/requests.js"></script>
  <script src="./src/ajax/requisitions/ajaxclick.js"></script>
</head>

<body class="bg-sky-600">

  <!-- Header -->
  <header class="bg-white bg-sky-700 flex justify-between items-center py-2 px-[1rem] md:py-4 md:px-[2rem]">
    <div>
      <h1 class="text-[2rem] text-white">Stock manager</h1>
      <p class="text-sm text-white leading-1">© ROBOT.IA Version 0.1</p>
    </div>
    <div class="text-2xl hover:cursor-pointer hover:scale-110 transition:all">
      <i class="ph-sign-out text-white"></i>
    </div>
  </header>
  <div class="grid grid-cols-1 lg:grid-cols-11 mx-3 mt-4 lg:m-10">
    <div class="flex flex-col bg-WHITE-800 rounded-md p-2 lg:px-4 col-span-9 min-h-[25.25rem]">
     <?php
 switch($_SESSION['id']){
  case 6:
    require 'ford.php';
  break;
  default:
  require 'enterprises.php';
  
}


     ?>
      <div class="overflow-x-auto overflow-y-hidden">
        <!-- General stock -->
        <div class="flex flex-col lg:flex-row justify-between lg:items-center">
          <div class="flex flex-col gap-3" id="conteudo_todos">

          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="bg-SKY-700 text-white px-10 py-5 mt-5">
    <h1 class="text-lg">© ROBOT.IA Version 0.1</h1>
  </footer>
</body>

<script src="./src/js/code/highcharts.js"></script>
<script src="./src/js/code/modules/series-label.src.js"></script>
<script src="./src/js/code/modules/exporting.js"></script>
<script src="./src/js/code/modules/export-data.js"></script>
<script src="./src/js/code/modules/accessibility.js"></script>
<script src="./src/js/graph.js"></script>

</html>