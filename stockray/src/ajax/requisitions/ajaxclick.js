function gerarrelatorioporcobertura(cobertura) {
    var company = localStorage.getItem("company");
    var month = localStorage.getItem("month");
    var year = localStorage.getItem("ano");
    var cobertura = cobertura;

    $.ajax({
            url: "../stockray/ajax/archives/estoqueporcoberturaclick.php",
            type: "POST",
            data: {
                submit: cobertura,
                empresa: company,
                mes: month,
                ano: year

            },
        })
        .done(function(result) {
              
                $("#resultadocompleto").html(result);
            }

        )
        .fail(function(msg) {
            alert(msg);
        })






};

function clickabc(query,empresa){
    var query = query;
    var empresa= empresa;



    $.ajax({
        url: "../archives/testeabc.php",
        type: "POST",
        data: {
            query: query,
            empresa: empresa

        },
    })
    .done(function(result) {
          
            $("#resultadocompleto").html(result);
        }

    )
    .fail(function(msg) {
        alert(msg);
    })






};