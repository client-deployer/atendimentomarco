<?php
session_start();

Class OfiPagamento{



    public $descondicao;
    private $codcondicao;

    public function enviarparaofrentedeicaixa(){

    }




    public static function selecionarvalorcondicao($descondicao, $codcondicao){
        echo "   <div class='modal-body'>

        <!-- Material input name -->
        <div class='md-form form-sm'>
        <i class='fab fa-wpforms ml-12'></i>
          <span type='text' id='materialFormNameModalEx1' class='form- form-control-sm'> ".$descondicao." </span>
         
        </div>

        <!-- Material input email -->
        <div class='md-form form-sm'>
        <i class='fas fa-barcode ml-12'></i>
        <span type='text' id='materialFormNameModalEx1' class='form- form-control-sm'> ".$codcondicao." </span>
         
        </div>

        <!-- Material input subject -->
        <div class='md-form form-sm'>
          <i class='fa fa-tag prefix'></i>
          <input type='text' id='valorpago' class='form-control form-control-sm'>
          <label for='materialFormSubjectModalEx1'>Valor a ser pago em ".$descondicao."</label>
        </div>

        

        <div class='text-center mt-4 mb-2'>
          <button class='btn btn-primary enviarparaocaixa'>Enviar para o caixa
            <i class='fa fa-send ml-2'></i>
          </button>
        </div>'";


    }


}



?>
