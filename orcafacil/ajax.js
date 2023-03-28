

function pesquisa(){
        //prev
var cod = $('#pesquisa').val();
$.ajax({
url: "http:/orcafacil/resultsearch.php",
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


  function sendorcamento(itemestoque, cliente, nome_cliente, vendedor, nome_vendedor, id) {
    var precoeditavel = $('#editprice'+id).val();
    console.log(precoeditavel)
    var tipodedesconto = $('#tipod'+id).val();
    console.log(tipodedesconto)
      

  var desconto = $("#desconto"+id).val();
  console.log(desconto)

  var quantidade = $('#qtd'+id).val();
  console.log(quantidade)
 
 

  
   


    //console.log(cod);


    
    // var quantidade = 
    //var cod = $('#pesquisa').val();
    $.ajax({
        url: "src/scripts/inserirregistro.php",
        type: "POST",
        data: {
          quantidade : quantidade,
          cod_cliente: cliente,
          cliente_name: nome_cliente,
          cod_vendedor : vendedor,
          vendedor_name: nome_vendedor,
          desconto: desconto,
          tipodesconto: tipodedesconto,
          itemestoque: itemestoque,
          preco: precoeditavel,
   

        },
      })
      .done(function(result) {
       // window.location.href = "/teste1.php";
     
        console.log(result)

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

