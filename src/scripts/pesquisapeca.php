<?php
session_start();
require '../../vendor/autoload.php';

require '../../private_html_protected/database.php';
require '../../private_html_protected/config.php';
require '../../private_html_protected/connection.php';
$codigo = $_POST['codProduto'];
$url = "10.15.32.11:8000/pesquisaritem/$codigo";
 
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$itens = json_decode(curl_exec($ch));

var_dump($itens);
die;
$itemestoque= $itens[0][1];
$_SESSION['preco'] = $itens[0][8];

$descricao= $itens[0][7];
$_SESSION['marca'] = $itens[0][2];
//var_dump($_SESSION['marca']);
 $pedido = $_SESSION['pedido'];
if ($codigo!=''){
 echo"

<main>
  <div class='ribbon'></div>
  <div class='card-container'>
    <div class='mdc-card'>
      
      <form method=POST action='inserirregistro.php'>
       
      <input name='session' value='$pedido'/> <p>Numero do pedido</p>
            
            <div class='mdc-layout-grid__cell--span-4-phone mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-12-desktop'>
            
              <label id='name-label' class='mdc-text-field mdc-text-field--filled w-100'>
         
                <input id='name' 
                name='descricao'
                       type='text' 
                       value='$descricao'
                     
                       required>
                <span class='mdc-floating-label' id='name-floating-label'>Descrição da Peça</span>
           
              </label>
            </div>
            <div class='mdc-layout-grid__cell--span-4-phone mdc-layout-grid__cell--span-6-tablet mdc-layout-grid__cell--span-9-desktop'>
              <label id='email-label' class='mdc-text-field mdc-text-field--filled w-100'>
                <span class='mdc-text-field__ripple'></span>
                <input 
                name='codigo'
                      type='text'
                       value='$codigo'
                      
                       >
                <span class='mdc-floating-label' >Codigo</span>
             
              </label>
              <div class='mdc-layout-grid__cell--span-4-phone mdc-layout-grid__cell--span-6-tablet mdc-layout-grid__cell--span-9-desktop'>
              <label id='email-label' class='mdc-text-field mdc-text-field--filled w-100'>
                <span class='mdc-text-field__ripple'></span>
              <!--  <input 
                name='preco'
                      type='text'
                       value=''
                      
                       >
                <span class='mdc-floating-label' >Preço</span>
             
              </label>
            </div> -->
            <div class='mdc-layout-grid__cell--span-4-phone mdc-layout-grid__cell--span-2-tablet mdc-layout-grid__cell--span-3-desktop'>
              <label id='number-label'>
                <span class='mdc-text-field__ripple'></span>
                <input 
                      name='quantidade'
                       min='1' 
      
                        
                       type='number' 
                     
                  
                       >
                       
                <span> Quantidade</span> 
               
              </label>
            </div>
          
       
         
                    <img src='../../marcodiesel.jpeg' alt='' srcset=''>
            
               <!--  <button type='submit' class-->
               <input type='submit'/>
      </form>
    
    </div> 
  </div>
  
  

  ";


   }else{
    echo "<h1> Este produto nao esta cadastrado </h1>";
   }

   

?>



</main>
<style>
  :root {
  --mdc-theme-secondary: var(--mdc-theme-primary);
}
.test {
  display: inline-block;
}
body {
  font-family: "Roboto", sans-serif;
  font-size: .938rem;
  font-weight: 400;
  background-color: #fafafa;
  margin: 0;
}
h2 {
  margin-top: .75em;
  margin-bottom: .25em;
}
p {
  margin-top: 0;
}
.flex-column {
  display: flex;
  flex-direction: column;
}
.w-100 {
  width: 100%;
}

.ribbon {
  background-color: #018786;
  flex-shrink: 0;
  height: 42vh;
  width: 100%;
}
.card-container {
  display: flex;
  justify-content: center;
  margin-top: -40vh;
}
.mdc-card {
  width: 100%;
  max-width: 860px;
  margin: 16px;
}

#dropdown {
  display: none;
}

.mdc-radio {
  margin-right: 2px;
}



.mdc-text-field--radio {
  height: 1.75rem;
}

.mdc-text-field--radio input {
  font-size: 0.875rem;
}
</style>
<script>
 const projectName = 'survey-form';
localStorage.setItem('example_project', 'Survey Form');

const textFields = document.querySelectorAll('.mdc-text-field');
for (const textField of textFields) {
  mdc.textField.MDCTextField.attachTo(textField);
}

mdc.select.MDCSelect.attachTo(document.querySelector('.mdc-select'));

var radios = document.querySelectorAll('.mdc-radio');
for (var i = 0, radio; radio = radios[i]; i++) {
  new mdc.radio.MDCRadio(radio);
}</script>

