function informations(i) {

    var bd = i;
    var ident = $('#identificador' + i).val();
    var pagamento = $('#pagamento' + i).val();
    var origens = $('#destino' + i).val();
    var departamento = $('#departamento' + i).val();
    var transacao = $('#trans' + i).val()
    console.log('deu esse' +
        transacao)



    var button = document.querySelector('.enviar' + i)

    button.onclick = function () {
        button.style.backgroundColor = 'yellow';
        console.log('funcionou')
    }




    $.ajax({


        url: "scripts/enviodedadosrpa.php",
        type: 'post',
        data: {
            nome: "Maria Fernanda",
            pagamento: pagamento,
            id_bd: bd,
            ident: ident,
            origens: origens,
            departamento: departamento,
            okay: transacao
        },
        beforeSend: function () {
            $("#resultado").html("ENVIANDO...");
        }
    })
        .done(function (msg) {
            $("#resultado").html(msg);
            console.log(msg)

        })
        .fail(function (jqXHR, textStatus, msg) {
            alert(msg);
        })
}





function avulso() {

   // var pagamentoavulso = $('#pagamento').val()
  //  var serieavulso = $('#serieNota').val()
   // var dataavulso = $('#datadaNota').val()
   // var numeroavulso = $('#numeroNota').val()
   // var cnpjavulso = $('#cnpjCliente').val()
   // var transacaoavulso = $('#transacao').val()
  
    //daqui pra baixo n add? Deve ser pq falta o # antes do nome

   // var origemavuslo = $('destino').val()
   // var usuarioavulso = $('usuarioEnvio').val()
  //  var obsavulso = $('obs').val()
   // var departamentoavulso = $('departamento').val()

    var form_data = $('#table_temp form').serializeArray();
    $.ajax({
        url: "../scripts/enviodedadosavulsorpa.php",
        type: 'post',
        data: form_data,
        beforeSend: function () {
            $("#resultado").html("ENVIANDO...");
        },
        //agora so tu ir passando os dados
        //como assim vai colocando os campos em cada coluna 
        //a forma q tut a passando esses dados é meio meme.. da um serialize no form inteiro ao inves de puxar 
        //campo por campo
        //aqui da pra facilitar tb

    }).done(function (msg) {
        $("#resultado").html(msg);
        console.log(msg)

    }).fail(function (jqXHR, textStatus, msg) {
           alert('Whoops! Ocorreu um erro interno ao registrar o dado, tente novamente.');
        })
}

function send(i){
id= i
var button = document.querySelector('.enviar' + i)

button.onclick = function () {
    button.style.backgroundColor = 'yellow';
    console.log('funcionou')
}
var transacao = $('#transacao' + i).val()
var destine = $('#destino' + i).val()
    $.ajax({


        url: "scripts/sendrpaavulso.php",
        type: 'post',
            data: {
                id: id,
                transaction: transacao,
                origin: destine
            },
        
        beforeSend: function () {
            $("#resultado").html("ENVIANDO...");
        }
    })
        .done(function (msg) {
            $("#resultado").html(msg);
            console.log(msg)

        })
        .fail(function (jqXHR, textStatus, msg) {
            alert(msg);
        })










}