<?php
session_start();
require 'functions.php';
require '../../class/Xray.php';

$info = new Xray;



$empresa = $_POST['empresa'];
$ano = $_POST['ano'];
$mes = $_POST['mes'];
$url = "10.15.32.11:8000/xray-general/".$empresa;
$dados = receberdadosapi($url);
 ?>
  
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"> </script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"> </script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"> </script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"> </script>



<div class="flex flex-col justify-between">
  <div class="overflow-x-auto">  
    <table id='example' class="w-full">


      <caption>GENERAL STOCK</caption>
      
        <thead> <tr><td style= 'text-align: center;'>Marca </td><td style= 'text-align: center;' >Qtd Contabil</td><td style= 'text-align: center;' >Total R$</td><!--<td style= 'text-align: center;' >Cobertura</td> --><td style= 'text-align: center;' >SKU</td><td style= 'text-align: center;' >PORCENTAGEM</td></tr>
        </thead>
        <tbody>
      <?php
$generalstock = $info->generalstock($dados);

?>
            </tbody>
            </table>

     
  <div class="flex gap-3 items-center justify-center">
    <div class="">
      <?php
        require 'graph-general-stock.php';
      ?>
    </div>
    <div class="">
      <?php
        require 'graph-no-selling.php';
      ?>
    </div>
  </div>
  <div class="mr-auto xl:m-100">
    <?php
      require 'graph-cover-stock.php';
    ?>
  </div>
</div>
<?php 
$url = "10.15.32.11:8000/xray-giro/".$empresa;
$dados = receberdadosapi($url);
 ?>

<div class="flex flex-col justify-between">
  <div class="overflow-x-auto">
    <table id='example2' class="w-full">
      <caption>SEM GIRO VS GIRO</caption>
      <thead>
      <tr style="text-align:center ;">
        <td>MARCA</td>
        <TD>QT(UND)</TD>
        <TD>VALOR R$</TD>
        <td>QT(UND)/VENDA</td>
        <td>VALOR R$/ VENDA</td>
        <td>QT(UND)/ DEVOLUCAO</td>
        <td>VALOR R$/ DEVOLUCAO</td>
        <td> PCT(%) </TD>

      </tr>
      </thead>
      <tbody>
      <?php
      foreach($dados as $data){

// var_dump($data);

$percent = percent ($data[2],$data[7]);
 echo"
 <tr>
    
        <td style= 'text-align: center;'>".  $data[0]."
        
        </td>
        <td style= 'text-align: center;'> 
      ".  number_format($data[1])."
        </td>
        <td style= 'text-align: center;'>
        ".  number_format($data[2],2,",",".")." </td>
        <td style= 'text-align: center;'>
        ".  number_format($data[3])." </td>
        <td style= 'text-align: center;'>
        ".  number_format($data[4],2,",",".")." </td>
        <td style= 'text-align: center;'>
        ".  number_format($data[5])." </td>
        <td style= 'text-align: center;'>
        ".  number_format($data[6],2,",",".")." </td>
        <td style= 'text-align: center;'>
        ".$percent ."% </td>

        </tr>
     
 ";}?>
      </tbody>|
    </table>
  </div>
  <div class="mr-auto xl:m-0">
  </div>
</div><?php
$url = "10.15.32.11:8000/xray-cobertura/".$empresa;
$dados = receberdadosapi($url);?>
<div class="flex flex-col xl:gap-6 justify-between">
  <div class="overflow-x-auto">
    <table id="example4" class="w-full">
      <caption>Sugestao de Compra</caption>
      <thead>
      <tr style="text-align:center;">
         
   
         <!-- <td>Dias de estoque</td> -->
          <td>Descricao </td>
          <td>Fabrica </td>
          <td>Utilizacao</td>
          <td>Item Estoque</td>
          <td>Marca</td>
          <td>Qtd contabil</td>
          <td>Qtd Venda</td>
          <td>Cobertura</td>
          <td> Sugestao de Compra/Venda </td>
          
          
      </tr>
      </thead>
      <tbody>
      <?php
     
           foreach($dados as $data){

            // var_dump($data);
    
          
            if ($data[7]!=null){

              $media= $data[6]/90;

              $oquefalta =90- $data[7];

              $sugestao= $oquefalta*$media;

        //    $sugestao=$data[5]/$data[7];
          //  $sugestao= $sugestao-$data[5];
        }else{
              $sugestao='Nao houve vendas no periodo de 3 meses';
            }
            

             echo"
             <tr>
                
                    <td style= 'text-align: center;'>".  $data[0]."
                    
                    </td>
                    <td style= 'text-align: center;'> 
                  ".  $data[1]."
                    </td>
                    <td style= 'text-align: center;'>
                    ".  $data[2]." </td>
                    <td style= 'text-align: center;'>
                    ".  $data[3]." </td>
                    <td style= 'text-align: center;'>
                    ".  $data[4]." </td>
                    <td style= 'text-align: center;'>
                    ".  number_format($data[5])." </td>
                    <td style= 'text-align: center;'>
                    ".  $data[6]." </td>
                    <td style= 'text-align: center;'>
                    ".$data[7] ." </td>
                    <td style= 'text-align: center;'>
                    ".$sugestao ." </td>

            
                    </tr>
                 
             ";}?>

</tbody>
    </table>
    <script src='../src/ajax/requisitions/ajaxclick.js' ></script>

  </div>
  <h5>Verifique a partir de sua cobertura </h5>
  <div class="hidden md:flex space-x-10 ">
 <?php $query = "and ano=$ano and mes=$mes";
              ?>
  <button class='border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-indigo-700' onclick="gerarrelatorioporcobertura('15')"  id='submit' value="15"> 0,1 a 15</button>
  <button class="border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-indigo-700" onclick="gerarrelatorioporcobertura('16')"  id='submit' value="16"> 16 a 30</button>
  <button class='border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-indigo-700' onclick="gerarrelatorioporcobertura('31')"  id='submit' value="31"> 31 a 60</button>
  <button class='border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-indigo-700' onclick="gerarrelatorioporcobertura('61')" id='submit' value="61"> 61 a 120</button>
  <button class="border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-indigo-700" onclick="gerarrelatorioporcobertura('121')"  id='submit' value="121"> 121 a 360</button>
  <button class="border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-indigo-700" onclick="gerarrelatorioporcobertura('360')" id='submit' value="360"> maior que 360...</button>
  <button class="border-transparent rounded-md shadow-sm text-base font-medium text-white bg-red-600 hover:bg-indigo-700" onclick="gerarrelatorioporcobertura('0')" id='submit' value="0"> Sem giro </button>
  <button class="border-transparent rounded-md shadow-sm text-base font-medium text-white bg-dark-600 hover:bg-indigo-700" onclick="clickabc('<?php echo $query;?>','<?php echo $empresa;?> ')" id='submit' value="0"> Class ABC </button>
  </div>
<div id='resultadocompleto'></div>
</div>
<script>
  $(document).ready(function () {
    $('#example').DataTable({
      dom: '<"dt-buttons"Bf><"clear">lirtp',
		paging: true,
		autoWidth: true,
		buttons: [
			"colvis",
			"copyHtml5",
			"csvHtml5",
			"excelHtml5",
			"pdfHtml5",
			"print"
		],
        scrollY: '200px',
        scrollCollapse: true,
        paging: false,
    });
});

$(document).ready(function () {
    $('#example2').DataTable({
      dom: '<"dt-buttons"Bf><"clear">lirtp',
		paging: true,
		autoWidth: true,
		buttons: [
			"colvis",
			"copyHtml5",
			"csvHtml5",
			"excelHtml5",
			"pdfHtml5",
			"print"
		],
        scrollY: '200px',
        scrollCollapse: true,
        paging: false,
    });
    
});

$(document).ready(function () {
    $('#example4').DataTable({
      dom: '<"dt-buttons"Bf><"clear">lirtp',
		paging: true,
		autoWidth: true,
		buttons: [
			"colvis",
			"copyHtml5",
			"csvHtml5",
			"excelHtml5",
			"pdfHtml5",
			"print"
		],
        scrollY: '200px',
        scrollCollapse: true,
        paging: false,
    });
});



  </script>