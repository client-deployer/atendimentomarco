



<?php
   session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
      <link rel="stylesheet" href="../cssMDB/bootstrap.min.css">
      <link rel="stylesheet" href="../cssMDB/mdb.min.css">
      <!-- Plugin file -->
      <link rel="stylesheet" href="../cssMDB/addons/datatables.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery.js"></script>
    <script src="../jsMdb/addons/datatables.min.js"></script>
    <script type="text/javascript" src="../jsMdb/popper.min.js"></script>
      <script type="text/javascript" src="../jsMdb/bootstrap.min.js"></script>
      <script type="text/javascript" src="../jsMdb/mdb.min.js"></script>
      <!-- Plugin file -->
 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
      <link rel="stylesheet" href="../cssMDB/bootstrap.min.css">
      <link rel="stylesheet" href="../cssMDB/mdb.min.css">
      <!-- Plugin file -->
      <link rel="stylesheet" href="../cssMDB/addons/datatables.min.css">
    <link rel="stylesheet" href="../cssMDB/bootstrap.min.css">
      <link rel="stylesheet" href="../cssMDB/mdb.min.css">
      <link rel="stylesheet" href="../cssMDB/style.css">
      
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
  rel="stylesheet"
/>
<!-- jQuery Modal -->
<script type="text/javascript" >
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
 
$(document).ready(function () {
          $('#dtBasicExample').DataTable();
          $('.dataTables_length').addClass('bs-select');
        });

</script>
      <script type="text/javascript" src="../jsMdb/popper.min.js"></script>
      <script type="text/javascript" src="../jsMdb/bootstrap.min.js"></script>
      <script type="text/javascript" src="../jsMdb/mdb.min.js"></script>
      <!-- Plugin file -->
      <script src="../jsMdb/addons/datatables.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
      <link rel="stylesheet" href="../cssMDB/bootstrap.min.css">
      <link rel="stylesheet" href="../cssMDB/mdb.min.css">
      <!-- Plugin file -->
      <link rel="stylesheet" href="../cssMDB/addons/datatables.min.css">
  
    <title></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <link href="../iconfont/material-icons.css" rel="stylesheet">
  

  
     
</head>

<body class="fundo">
<header>
  
<nav class="navbar navbar-expand-lg navbar-dark indigo" >
  <a class="navbar-brand" href="#">
    <img src="../img/logomin.png" height="30" alt="mdb logo">
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
        </li>
       
      </ul>
      
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Logado na revenda <?php echo $_SESSION['vendedor']['revenda'];?> <span class="sr-only">(current)</span></a>
        </li>
       
      </ul>
      
    </div>


  </nav>
</header>

    
    <style>
      .fundo{
        background-image:url('../img/aten.png') ;
        background-position: left;
        background-size: contain;
        background-repeat: no-repeat;
}
      
    </style>

    
<div class="container " >
      <div class="row d-flex justify-content-center ">
         <!--Grid column-->
      <div class="col-md-6 card p-5 blue-gradient mt-5">

                    <h3 class="mb-8 text-3xl text-center text-white animated flipInY"> <i class="far fa-id-card"></i> Pré Atendimento - Orçamento</h3>

                    <input type="email" id="nome" name="nome" class="form-control mb-4" placeholder="Nome">

<input type="text" name='email' id="cpf" class="form-control mb-4" placeholder="CPF/CNPJ">

  <button onclick="validarusuario()" type="submit" class="btn indigo darken-4 text-white btn-block my-4 w-full text-center py-3 " type="submit">Verificar Cliente</button>

                    
                    
 

    </div>  </div>  </div>

             
              </div>



              <div class="ml-4 mr-4" id='result'></div>
            <?php 
            
            

            ?>
            
           
  

  
   
    <script>
         function validarusuario() {
  
    
    var cpf = $('#cpf').val();
    console.log(cpf);
    var nome = $('#nome').val();
    if (!nome){
      nome='vazio'
    }
    if(!cpf){
      cpf = 'vazio'
    }
    $.ajax({
            url: "validaclient.php?session=''",
            type: "POST",
            data: {
                cpf: cpf,
                nome: nome,
            
            },
        })
        .done(function(result) {
           console.log(result)
            $("#result").html(result);
        })
        .fail(function(jqXHR, textStatus, msg) {
            alert(msg);
        });
};
    </script>

</div>
        </div>
        </div>