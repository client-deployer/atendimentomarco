const setTableItens = () => {
    let company = localStorage.getItem("company");
    let month = localStorage.getItem("month");
    let year = localStorage.getItem("ano");
    //Fazer a requisição ajax.
    //Popular os dados na tabela.
    $.ajax({
            url: "../stockray/src/ajax/archives/categories.php",
            type: "POST",
            data: {
                empresa: company,
                mes: month,
                ano: year,
            },
        })
        .done(function(result) {
           
            $("#conteudo_todos").html(result);
        })
        .fail(function(jqXHR, textStatus, msg) {
            alert(msg);
        });
};

const clearTableFilter = () => {
    localStorage.removeItem("company");
    localStorage.removeItem("month");
    localStorage.removeItem("ano");

    Swal.fire("Tudo certo!", "Filtros limpos com sucesso.", "success");
};

const setFilter = (item, content) => {
    if (item == "" && content == "") {
        var ano = $("#Ano :selected").val();
        localStorage.setItem("ano", ano);
        return;
    }

    localStorage.setItem(item, content);
};