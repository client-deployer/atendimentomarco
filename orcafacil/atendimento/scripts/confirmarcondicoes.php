<?php
session_start();
//var_dump($_SESSION);

if ($_POST['condicao'] && $_POST['cod']) {
    require '../../Class/OfiPagamento.php';
    require '../../Class/Checkout.php';

    $selectedcondicao = new OfiPagamento;


    $checkout = new Checkout($_SESSION['client']['codclient'], $_SESSION['pedido']);



  

} ?>
   <!-- <div class='modal-body'>

   
        <div class='md-form form-sm'>
        <i class='fab fa-wpforms ml-12'></i>
          <span type='text' id='materialFormNameModalEx1' class='form- form-control-sm'> <?php //echo $_POST['condicao'] ?></span>
         
        </div>

        <div class='md-form form-sm'>
        <i class='fas fa-barcode ml-12'></i>
        <span type='text' id='materialFormNameModalEx1' class='form- form-control-sm'><?php //echo $_POST['cod'] ?> </span>
         
        </div>

        <div class='md-form form-sm'>
          <i class='fa fa-tag prefix'></i>
          <input type='text' id='valorpago' class='form-control form-control-sm'>
          <label for='materialFormSubjectModalEx1'>Valor a ser pago em <?php// echo $_POST['condicao'] ?></label>
        </div>

        

        <div class='text-center mt-4 mb-2'>
          <button class='btn btn-primary enviarparaocaixa'>Enviar para o caixa
            <i class='fa fa-send ml-2'></i>
          </button>
        </div> -->


        <div class="modal-body">
                      <div class="checkout-modal-content">
                        <h5>
                          Valor total: <?php echo $checkout-> total; ?>;
                          <span id="original_value_component"></span>
                        </h5>
                        <div>
                          <h6>Valor a ser pago em R$</h6>
                          <div class="md-form">
                            <input
                              type="text"
                              id="first_input"
                              maxlength="17"
                              placeholder="Valor"
                              class="form-control valorpago"
                            />
                          </div>
                        </div>
                        <div>
                          <h6>Porcentagem do valor a ser pago</h6>
                          <div class="md-form">
                            <input
                              type="text"
                              id="second_input"
                              maxlength="6"
                              placeholder="Valor"
                              class="form-control"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary rounded-lg enviarparaocaixa">
                      <i class='fa fa-send ml-2'></i> Confirmar
                      </button>  
                    </div>

<script>
    $(document).ready(function () {
        $(document).on('click', '.enviarparaocaixa', function () {
            var condicao =  <?php echo $_POST['cod']; ?>;
            var valor = $('.valorpago').val();
            var revenda =<?php echo $_SESSION['vendedor']['revenda'] ;?>;
            var atendimento = <?php echo $_SESSION['pedido']; ?>;
            var cliente = <?php  echo $_SESSION['client']['codclient'];?>;
            var vendedor = <?php echo $_SESSION['vendedor']['id'] ;?>;
            var orcamento = <?php echo $_SESSION['orcamento'];?>;
            var total = <?php echo $checkout-> total; ?>;
          //  valor = valor.parseFloat;
            console.log(valor)
            valor = valor.replace ('R$', '')
            valor = valor.replace(',','.')
            valor = parseFloat(valor)
           
            console.log(valor)

            //	alert(condicao);
            //Verificar se há valor na variável "user_id".
            if (condicao !== '') {
                var dados = {
                    cod: condicao,
                    valor: valor,
                    total: total

                }}
            

                //alert(cod);
                //Verificar se há valor na variável "user_id".

                //  console.log(dados)
                url = "http://10.15.32.11:8000/enviarformadepagamento/"+orcamento+"/"+vendedor+"/" +revenda + "/" +atendimento+ "/" +cliente + "/" + condicao + "/" + valor + "/" + total;

                fetch(url,{method: 'GET', mode:'no-cors'})
                    .then(function (data) {

                    })
            
            .catch(function (error) {

            })

        })});
      
  
				
		</script>

        <script>

let first_input = document.querySelector("#first_input");
let second_input = document.querySelector("#second_input");
let original_value_component = document.querySelector(
  "#original_value_component"
);
let item_description_value = document.querySelector("#item_description_value");
let item_description_select = document.querySelector(
  "#item_description_select"
);
let originalValue = <?php echo $checkout-> total; ?>;

original_value_component.innerHTML = originalValue.toString();

//Funções
function moneyMask(value) {
  value = value.replace(".", "").replace(",", "").replace(/\D/g, "");

  const options = { currency: "BRL", style: "currency" };

  let result = new Intl.NumberFormat("pt-BR", options).format(
    parseFloat(value) / 100
  );

  if (result.match("NaN")) {
    result = "R$ 0,00";
  } else {
    result = result;
  }

  return result;
}

function percentageMask(value) {
  value = value.replace(/[^0-9]/g, "");

  return value.concat("%");
}




first_input.addEventListener("input", () => {
  first_input.value = moneyMask(first_input.value);

  let sanitizedInput = first_input.value.replace(/\D/g, "");

  let factor = (parseInt(sanitizedInput) / originalValue).toFixed(2);

  second_input.value = String(factor).concat("%");
});

second_input.addEventListener("input", () => {
  let sanitizedInput = parseInt(second_input.value.replace(/\D/g, ""));
  let factor = parseInt(originalValue * sanitizedInput);

  isNaN(factor) ? (factor = "0") : (factor = factor);

  if (String(sanitizedInput).length <= 2) {
    second_input.value = String(sanitizedInput).replace(/(\d{1})/g, "0.0$1");
  }

  if (String(sanitizedInput).length >= 2) {
    second_input.value = String(sanitizedInput).replace(/(\d{2})/g, "0.$1");
  }

  if (String(sanitizedInput).length >= 3) {
    second_input.value = String(sanitizedInput).replace(
      /(\d{1})(\d{2})/g,
      "$1.$2"
    );
  }

  if (String(sanitizedInput).length == 4) {
    second_input.value = String(sanitizedInput).replace(
      /(\d{2})(\d)/g,
      "$1.$2"
    );
  }

  if (String(sanitizedInput).length > 4) {
    second_input.value = String(sanitizedInput).replace(
      /(\d{3})(\d)/g,
      "$1.$2"
    );
  }

  second_input.value.replace(/\D/g, "").length < 3
    ? (first_input.value = moneyMask(String(factor / 100)))
    : (first_input.value = moneyMask(String(factor / 100)));
});

        </script>