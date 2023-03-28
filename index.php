<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cssMDB/bootstrap.min.css">
      <link rel="stylesheet" href="cssMDB/mdb.min.css">
      <link rel="stylesheet" href="cssMDB/style.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/popper.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/mdb.min.js"></script>
  
     
</head>

<body>
  
  <nav class="navbar navbar-expand-lg navbar-dark indigo" >
  <a class="navbar-brand" href="#">
    <img src="img/logo.jpg" height="30" alt="mdb logo">
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Inicio logo <span class="sr-only">(current)</span></a>
        </li>
       
      </ul>
      
    </div>
  </nav>

<!-- Content -->


<div class="container">
      <div class="row d-flex justify-content-center">
         <!--Grid column-->
      <div class="col-md-6">
<form class="card p-5 mt-5 blue-gradient" action='valida.php' method='POST' >

<div class="text-center">

    <div class="mt-3 animated flipInY ">
    <h3 class="font-weight-bold text-center text-white "><img src="img/logomin.png" alt="Marco Diesel logo" class="img-fluid" width="35"> MARCODIESEL </h3> 
  <h6 class="font-weight-bold text-center ml-5 mr-n5 mt-n3  pb-2 yellow-text"><strong>Peças & Serviços </strong></h6>
    </div>

</div>


     
<input name="usuario" type="login" id="defaultLoginFormEmail" class="form-control mb-4 mt-3" placeholder="Usuario">

<input name="senha" type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Senha">
<label for="select" class="text-white">Revenda</label>
    <select name="revenda" class="browser-default custom-select mb-4" id="select">
        <option value="" disabled="" selected="">Selecione a Revenda</option>
        <option value="1"> Grupo MARCODIESEL - Matriz</option>
        <option value="2"> Grupo MARCODIESEL - Oficina</option>
        <option value="3"> Grupo MARCODIESEL - Boa Vista</option>
        <option value="4"> Grupo MARCODIESEL - Camapuã</option>
    </select>

<div class="d-flex justify-content-between">
    <div>
        <div class="custom-control custom-checkbox">
         
        </div>
    </div>
    <div>
      
    </div>
</div>

<button class="btn indigo darken-4 btn-block my-4 text-white h1" onclick='' type="submit"> Entrar</button>

      <div class="text-center">
      
           </div>
          
         
</form>
</div>
</div>
</div>

  
<script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/popper.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/mdb.min.js"></script>
      <!-- Plugin file -->
   

      <script src="./js/addons/datatables.min.js"></script>
      <script src="https://cdnjs.com/libraries/jquery.mask"></script>
      <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" ></script> -->

    
</body>
</html>
