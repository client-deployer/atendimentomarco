
  <div class="row">

<!--Grid column-->
<div class="col-lg-3 col-md-6 mb-2">

  <!-- Admin card -->
  <div class="card mt-3 ">

    <div class="">
      <i class="far fa-money-bill-alt fa-lg primary-color z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
      
      <div class="float-right text-right p-3">
        <p class="text-uppercase h5 mb-1"><small>TOTAL BRUTO</small></p>
     
        <h4 class="font-weight-bold mb-0"><?php  echo  number_format(($dados['valorbruto']-$dados['descontos']),2,",","."); ?></h4>
      </div>
    </div>

    <div class="card-body pt-0">
      <div class="progress md-progress">
        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo percent(($dados['valorbruto']-$dados['descontos']),($dados['valorbruto']-$dados['descontos']))?>%" aria-valuenow="75" aria-valuemin="0"
          aria-valuemax="100"></div>
      </div>
      <p class="card-text">porcentagem (<?php echo  percent($dados['valorbruto'],$dados['valorbruto'])?>%)</p>
    </div>

  </div>
  <!-- Admin card -->

</div>
<!--Grid column-->

<!--Grid column-->
<!-- <div class="col-lg-3 col-md-6 mb-2">

  <!-- Admin card -->
  <!-- <div class="card mt-3">

   <div class="">
    <i class="fas fa-chart-pie fa-lg danger-color z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
      <div class="float-right text-right p-3">
        <p class="text-uppercase h5 mb-1"><small>DESCONTOS</small></p>
        <h4 class="font-weight-bold mb-0"><?php //echo  number_format($dados['descontos'],2,",","."); ?></h4>
      </div>
    </div> 

    <div class="card-body pt-0">
      <div class="progress md-progress">
        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo  percent($dados['descontos'],$dados['valorbruto'])?>%" aria-valuenow="46" aria-valuemin="0"
          aria-valuemax="100"></div>
      </div>
      <p class="card-text">porcentagem (<?php// echo  percent($dados['descontos'],$dados['valorbruto'])?>%)</p>
    </div>

  </div>
  

</div> -->
<!-- Admin card -->
<div class="col-lg-3 col-md-6 mb-2">
<div class="card mt-3 ">

<div class="">
  <i class="fas fa-exchange-alt fa-lg danger-color  z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
  
  <div class="float-right text-right p-3">
    <p class="text-uppercase h5 mb-1"><small>DEVOLUÇÕES</small></p>
    <h4 class="font-weight-bold mb-0"><?php echo  number_format($dados['devolucoes'],2,",","."); ?></h4>
  </div>
</div>

<div class="card-body pt-0">
  <div class="progress md-progress">
    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo percent($dados['devolucoes'],$dados['valorbruto'])?>%" aria-valuenow="75" aria-valuemin="0"
      aria-valuemax="100"></div>
  </div>
  <p class="card-text">porcentagem (<?php echo  percent($dados['devolucoes'],$dados['valorbruto'])?>%)</p>
</div>
  </div>
</div>
<!--Grid column-->

<!--Grid column-->
<div class="col-lg-3 col-md-6 mb-2">

  <!-- Admin card -->
  <div class="card mt-3">

    <div class="">
     
      <i class="fas fa-dollar-sign fa-lg success-color z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
      <div class="float-right text-right p-3">
        <p class="text-uppercase h5 mb-1"><small> CUSTO R$</small></p>
        <h4 class="font-weight-bold mb-0"><?php echo  number_format($dados['customedio'],2,",","."); ?></h4>
      </div>
    </div>

    <div class="card-body pt-0">
      <div class="progress md-progress">
        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo  percent($dados['customedio'],$dados['valorbruto'])?>%" aria-valuenow="31" aria-valuemin="0"
          aria-valuemax="100"></div>
      </div>
      <p class="card-text">porcentagem (<?php echo  percent($dados['customedio'],$dados['valorbruto'])?>%)</p>
    </div>

  </div>
  <!-- Admin card -->

</div>
<!--Grid column-->
     <!--Grid column-->
<div class="col-lg-3 col-md-6 mb-2">

<!-- Admin card -->
<div class="card mt-3">


<div class="">
     <?php $lucrobruto= $dados['valormenosdesconto']-$dados['devolucoes']; ?>
     <i class="fas fa-dollar-sign fa-lg success-color-dark z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
     <div class="float-right text-right p-3">
       <p class="text-uppercase h5 mb-1"><small> L. BRUTO %</small></p>
       <h4 class="font-weight-bold mb-0"><?php echo  number_format($lucrobruto,2,",","."); ?></h4>
     </div>
   </div>

<div class="card-body pt-0">
<div class="progress md-progress">
  <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo  percent($lucrobruto,$dados['valorbruto'])?>%" aria-valuenow="31" aria-valuemin="0"
    aria-valuemax="100"></div>
</div>
<p class="card-text">porcentagem (<?php echo  percent($lucrobruto,$dados['valorbruto'])?>%)</p>
</div>

</div>
<!-- Admin card -->

</div>
<!--Grid column-->

</div>
<!--Grid row-->

</section>
<!--Section: Content-->


</div>

<!--Grid column-->
 




</div>

