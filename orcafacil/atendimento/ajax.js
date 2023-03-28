// "../src/scripts/inserirregistro.php",
//data: {id : 5}, assim vai json


function deleteitemcesta(itemestoque,contato,revenda){
  //prev
  if (confirm('Você realmente deseja excluir esse item da cesta?')) {
    //Make ajax call
    $.ajax({
        url:"../src/scripts/deleteitem.php",
        type: "POST",
        data: {coditem : itemestoque,
          atendimento : contato,
          revenda : revenda
        
        },
        success: function() {
            alert("Item deletado com Sucesso!");
        }
    });

}
};



function pesquisa(){
        //prev
var cod = $('#pesquisa').val();
$.ajax({
url: "resultsearch.php",
type: "POST",
data: {
    codProduto: cod,
},
})
.done(function(result) {

$("#endsearch").html(result);
})
.fail(function(jqXHR, textStatus, msg) {
alert(msg);
});

};


function pesquisaconsulta(){

var cod = $('#pesquisa').val();
$.ajax({
url: "resultsearchconsulta.php",
type: "POST",
data: {
codProduto: cod,
},
})
.done(function(result) {

$("#endsearch").html(result);
})
.fail(function(jqXHR, textStatus, msg) {
alert(msg);
});

};

  //A variável de ID ficou fora das funções para manter o estado...


  function sendorcamento(itemestoque, cliente, vendedor,ordem) {
  
    var tipodedesconto = $('#tipod').val();
    console.log(tipodedesconto)
    var desconto = $("#desconto").val();
    console.log(desconto)

    if (!tipodedesconto || tipodedesconto=='' || tipodedesconto==0 || !desconto || tipodedesconto=='Selecionar'){
      desconto=0
    }
    console.log(desconto)
      
  var quantidade = $('#qtd').val();
  console.log(quantidade);
  console.log(desconto)
    $.ajax({
        url: "../src/scripts/inserirregistro.php",
        type: "POST",
        data: {
          quantidade : quantidade,
          cod_cliente: cliente,
          cod_vendedor : vendedor,
          desconto: desconto,
          tipodesconto: tipodedesconto,
          itemestoque: itemestoque,
         
   

        },
      })
      .done(function(result) {
       // window.location.href = "/teste1.php";
     
        console.log(result);
        alert('voce adicionou o item com suceso');
     

      })
      .fail(function(jqXHR, textStatus, msg) {
        alert(msg);
      });
  }; 

  function chamarmodal(itemestoque) {


console.log(itemestoque)
//var cod = $('#numberatendimento').val();

//console.log(cod);


// var quantidade = 
//var cod = $('#pesquisa').val();
$.ajax({
    url: "src/scripts/modal.php",
    type: "POST",
    data: {

      itemestoque: itemestoque,
     

      //   quantidade: quantidade

    },
  })
  .done(function(result) {
  //  window.location.href = "/teste1.php";
      $("#modal").html(result);
    // console.log(pedido)
    console.log('sucessull congratulations')

  })
  .fail(function(jqXHR, textStatus, msg) {
    alert(msg);
  });
}; 

