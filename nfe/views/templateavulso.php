<?php
session_start();
$usuario = $_SESSION['email'];
// e esse aq
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/phosphor-icons"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="../src/javascript/requisitions/ajax.js"></script>
  <link rel="stylesheet" href="../src/styles/input.css">

  <title>NF - Main Page</title>
</head>

<body class="bg-[#464646]">

  <!-- Wrapper -->
  <div class="flex">

    <!-- Side Bar -->
    <div class="hidden lg:flex min-w-[200px] bg-[#333333] min-h-screen px-6 py-3 gap-8 flex flex-col self-start">
      <div>
        <img src="../src/img/Data Page XML Small.png" alt="">
      </div>
      <div class="flex flex-col gap-4">
        <form method="POST" name="cadastrarnota" action="controllers/filemanipulation.php" enctype="multipart/form-data">
          <input name='nota' type="file" class="bg-[#367362] rounded-md py-3 px-2 text-white rounded-md hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]" />
          <button value='01' type="submit" name="enviarnota" class="bg-[#367362] rounded-md py-3 px-2 text-white rounded-md hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]">Enviar NF</button>


        </form>
        <button onclick="window.location.href='/recol-nf/main-page.php'" class="bg-[#367362] rounded-md py-3 px-2 text-white rounded-md hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]">Notas Pendentes</button>
        <button onclick="window.location.href='#'" class="bg-[#367362] rounded-md py-3 px-2 text-white rounded-md hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]">Notas lançadas</button>
        <button class="bg-[#367362] rounded-md py-3 px-2 text-white rounded-md hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]">Botão</button>

      </div>
    </div>

    <div class="w-full flex flex-col">
      <!-- Header -->
      <div class="bg-[#5a5a5a] flex justify-between items-center py-3 px-8">
        <div class="flex items-center gap-3">
          <i class="ph-list text-2xl text-white block lg:hidden"></i>
          <h1 class="hidden sm:block text-white text-2xl">Gestão de XML</h1>
        </div>
        <div class="flex items-center gap-4">
          <h1 class="text-white"><?php echo $_SESSION['email']; ?></h1>
          <img class="hidden lg:block" alt="">
          <i class="ph-sign-out text-white text-2xl"></i>
        </div>
      </div>

      <!-- Table -->
      <div class="mt-6 mx-4">
        <div class="flex justify-between mb-3">
          <div>
            <button class="bg-[#367362] rounded-md py-3 px-2 text-white rounded-md hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]">Emitidas</button>
            <button class="bg-[#367362] ml-2 rounded-md py-3 px-2 text-white rounded-md hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]">Recebidas</button>
          </div>
          <div class="flex items-center">
            <h1 class="text-xl text-[#efefef] mr-3">Página (n da página)</h1>
            <a class="rounded-[50%] h-[20px] w-[20px] mt-1 text-center bg-[#333333] hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]" href="#"></a>
            <a class="rounded-[50%] h-[20px] w-[20px] mt-1 ml-1 text-center bg-[#367362] hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]" href="#"></a>
          </div>
        </div>
        <table class="w-full rounded-md text-center" id="table_temp">
          <tr class="bg-[#5a5a5a]">
            <!--  Colocar onde tem visualizar pdf, serie da nota -->
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">Data da nota </th>
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">Número nota</th>
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">CNPJ</th>
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">Serie da nota</th>
           <!-- <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">Transação</th> -->
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">Departamento</th>
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">Data de pagamento</th>
           <!-- <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">Origem</th> -->
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">Valor da nota</th>
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">OBS</th>
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">Iss</th>
            <th class="border-2 border-[#333333] font-normal py-4 text-[#efefef]">CSLL</th>
            <th>IR</th>
            <th>Parcelamento</th>
            <th>Foto da nota</th>
            <th>Start</th>

          </tr>
          <tr>
            <form method="POST"  action='../scripts/submit.php' enctype="multipart/form-data" >
              <td><input type='date' placeholder="Data da nota" id='datadaNota' name='datadanota' /></td>
              <td><input type='text' placeholder="Numero da Nota" id='numeroNota' name='numeroNota' /></td>
              <td><input type='text' placeholder="CNPJ" id='cnpjCliente' name='cnpjCliente' /></td>
              <td><input type='text' placeholder="Serie da Nota" id='serieNota' name='serieNota' /></td>
             <!-- <td><select name='transação' id='transação'>
                <option value='D01'>D01</option>
                <option value='D02'>D02</option>
                <option value='D03'>D03</option>
              </select></td> -->
              <td> <select name='Departamento' defaulr='Despesa' id='departamento'>
                  <option value='10'>VN</option>
                  <option value='20'>VU</option>
                  <option value='30'>PC</option>
                  <option value='40'>OF</option>
                  <option value='50'>AD</option>
                </select></td>
              <td> <input id='pagamento' name="payment_date" type='date' /></td>
             <!-- <td><select name='destino' default='Despesa' id='destino'>
                  <option value='50'>Administracao</option>
                  <option value='5217'> ND-PRESTAÇÃO DE SERV. V. PJ </option>
                  <option value='5101'> ND-COMISSOES A TERCEIROS </option>
                  <option value='5126'>ND-LANCHES E REFEICOES</option>
                  <option value='5134'>ND-PROPAGANDA E PUBLICIDADE</option>
                  <option value='5138'>ND-PROGRAMA DE ALIMENTAÇÃO PAT</option>
                  <option value='5140'>ND-SERVIÇOS DE LIMPEZA</option>
                  <OPTION VALUE='51462'> ND-IPVA/LINC. USADOS</option>
                  <OPTION VALUE='51911'> ND-WORKSHOP NOVOS</option>
                  <OPTION VALUE='51292'> ND-MAT. CONSUMO PÇ/SERV USADOS</option>
                  <OPTION VALUE='51293'> ND-MAT. CONSUMO PÇ/SERV PEÇAS</option>
                  <OPTION VALUE='51294'> ND-MAT. CONSUMO PÇ/SERV OFICINA</option>
                  <OPTION VALUE='5109'> ND-PRESTAÇÃO DE SERV. PJ</option>
                  <OPTION VALUE='5122'> ND-MANUTENÇÃO DAS INSTALAÇÕES</option>
                  <OPTION VALUE=' 5132'> ND-ORNAMENTOS E DECORAÇÃO</option>
                  <OPTION VALUE='5144'> ND-SUPRIMENTO DE INFORMATICA</option>
                  <OPTION VALUE='5103'> ND-COPA E BAR</option>
                  <OPTION VALUE='51161'> ND-COMBUSTÍVEL E LUBRI NOVOS</option>
                  <OPTION VALUE='51162'> ND-COMBUSTÍVEL E LUBRI USADOS</option>
                  <OPTION VALUE='51163'> ND-COMBUSTÍVEL E LUBRI PEÇAS</option>
                  <OPTION VALUE='51164'> ND-COMBUSTÍVEL E LUBRI OFICINA</option>
                  <OPTION VALUE='51165'> ND-COMBUSTÍVEL E LUBRI ADMINISTRACAO</option>
                  <OPTION VALUE='5008'> ND-MATERIAL DE LIMPEZA</option>
                  <OPTION VALUE='5139'> ND-DESPACHANTE</option>
                  <OPTION VALUE='5009'> ND-MENSALIDADES E ASSOCIAÇÕES</option>
                  <OPTION VALUE='9994'> ND - LIVRE DE DEBITO</option>
                  <OPTION VALUE='5165'> ND - MANUTENÇÃO DE AR-CONDICIONADO</option>
                  <OPTION VALUE='5131'> ND-CORTESIAS</option>
                  <OPTION VALUE='5148'> ND-PROCESSAMENTO DE DADOS SIST</option>
                  <OPTION VALUE='5206'> ND - TREINAMENTO/ VIAGENS/ESTA</option>
                  <OPTION VALUE='5184'> ND-LOCAÇÃO DE BENS MÓVEIS</option>
                  <OPTION VALUE='5125'> ND-SUFRAMA</option>
                  <OPTION VALUE='5133'> ND-VIGILANCIA</option>
                  <OPTION VALUE='5110'> ND-PRESTAÇÃO DE SERV. PF</option>
                  <OPTION VALUE='5146'> ND-IPVA BAST DRIVE</option>
                  <OPTION VALUE='7506'> CP - CONV. FARMACIA</option>
                  <OPTION VALUE='7508'> CP - CONV. SUPERMERCADO</option>
                  <OPTION VALUE='5118'> ND-TAXAS DE CARTORIO E MULTAS</option>
                  <OPTION VALUE='5149'> ND-VALE-TRANSPORTE</option>
                  <OPTION VALUE='5136'> ND-ASSISTENCIA MEDICA</option>
                  <OPTION VALUE='5115'> ND-TELEFONE / INTERNET</option>
                  <OPTION VALUE='5117'> ND-DESPESAS MANUTENÇÃ VEICULOS</option>
                  <OPTION VALUE='5119'> ND-MANUT. DE MAQUINAS E EQUIP.</option>
                  <OPTION VALUE='5114'> ND-LUZ</option>
                  <OPTION VALUE='5124'> ND-ICMS</option>
                  <OPTION VALUE='5104'> ND-SERVIÇOS POSTAIS</option>
                  <OPTION VALUE='5152'> ND-TAXAS SEFAZ/JUNTA/DETRAN</option>
                  <OPTION VALUE='5113'> ND-AGUA</option>
                  <OPTION VALUE='5155'> ND-MULTAS DE TRANSITO</option>
                  <OPTION VALUE='5106'> ND-CUSTAS JUDICIAIS</option>
                  <OPTION VALUE='5127'> ND-MATERIAL DE EXPEDIENTE</option>
                  <OPTION VALUE='5209'> ND-MATERIAL DE LIMP.RECOL DIST</option>
                  <OPTION VALUE='5143'> ND-CORTESIAS E BRINDES</option>
                  <OPTION VALUE='5202'> ND-FRETES ESTOQUE PÇS</option>
                  <OPTION VALUE='5003'> ND-ALUGUEL</option>
                  <OPTION VALUE='5150'> ND-DESPESAS FINANCEIRAS CDCI</option>
                  <OPTION VALUE='5121'> ND-MANUTENÇÃO DE IMOVEIS </option>
                  <OPTION VALUE='5126'> ND-LANCHES E REFEICOES </option>
                  <OPTION VALUE='5117'> ND-PRESTAÇÃO DE SERV. V. PJ </option>
                  <OPTION VALUE='5165'> ND - MANUTENÇÃO DE AR-CONDICI </option>
                  <OPTION VALUE='5134'> ND-PROPAGANDA E PUBLICIDADE </option>
                  <OPTION VALUE='5143'> ND-CORTESIAS E BR NDES </option>
                  <OPTION VALUE='5140'> ND-SERVIÇOS DE LIMPEZA </option>
                  <OPTION VALUE='5109'> ND-PRESTAÇÃO DE SERV. PJ</option>
                  <OPTION VALUE='5119'> ND-MANUT. DE MAQUINAS E EQUIP.</option>
                  <OPTION VALUE='5009'> ND-MENSALIDADES E ASSOCIAÇÕES</option>
                  <OPTION VALUE='5101'> ND-COMISSOES A TERCEIROS</option>
                  <OPTION VALUE='5144'> ND-SUPRIMENTO DE INFORMATICA</option>
                  <OPTION VALUE='5128'> ND-UNIFORMES</option>
                  <OPTION VALUE='5148'> ND-PROCESSAMENTO DE DADOS SIST</option>
                  <OPTION VALUE='5103'> ND-COPA E BAR</option>
                  <OPTION VALUE='5122'> ND-MANUTENÇÃO DAS INSTALAÇÕES</option>
                  <OPTION VALUE='5111'> ND-IMPRESSOS COPIAS E REPREDUÇ</option>
                  <OPTION VALUE='5123'> ND-MATERIAL BENS PERMANENTES
                  <OPTION VALUE='5139'> ND-DESPACHANTE</option>
                  <OPTION VALUE='5108'> ND-FRETES E CARRETOS</option>
                  <OPTION VALUE='5131'> ND-CORTESIAS</option>
                  <OPTION VALUE='5152'> ND-TAXAS SEFAZ/JUNTA/DETRAN</option>
                  <OPTION VALUE='5184'> ND-LOCAÇÃO DE BENS MÓVEIS</option>
                  <OPTION VALUE='5008'> ND-MATERIAL DE LIMPEZA</option>
                  <OPTION VALUE='5125'> ND-SUFRAMA</option>
                  <OPTION VALUE='5133'> ND-VIGILANCIA</option>
                  <OPTION VALUE='5127'> ND-MATERIAL DE EXPEDIENTE</option>
                  <OPTION VALUE='7506'> CP - CONV. FARMACIA</option>
                  <OPTION VALUE='5123'> ND-MATERIAL BENS PERMANENTES</option>
                  <OPTION VALUE='5138'> ND-PROGRAMA DE ALIMENTAÇÃO PAT</option>
                  <OPTION VALUE='7508'> CP - CONV. SUPERMERCADO</option>
                  <OPTION VALUE='5112'> ND-ASSINATURAS-LIVROS/REVISTA</option>
                  <OPTION VALUE='5115'> ND-TELEFONE / INTERNET</option>
                  <OPTION VALUE='5114'> ND-LUZ</option>
                  <OPTION VALUE='5149'> ND-VALE-TRANSPORTE</option>
                  <OPTION VALUE='5202'> ND-FRETES ESTOQUE PÇS
                  <OPTION VALUE='5136'> ND-ASSISTENCIA MEDICA</option>
                  <OPTION VALUE='5104'> ND-SERVIÇOS POSTAIS</option>
                  <OPTION VALUE='5163'> ND-PERDAS E PROCESSOS</option>
                  <OPTION VALUE='5159'> ND-OUTROS IMPOSTOS E TAXAS</option>
                  <OPTION VALUE='5158'> ND-TAXAS PREFEITURA</option>
                  <OPTION VALUE='5114'> ND-LUZ</option>
                  <OPTION VALUE='9994'> ND - LIVRE DE DEBITO</option>
                  <OPTION VALUE='5106'> ND-CUSTAS JUDICIAIS</option>
                  <OPTION VALUE='5209'> ND-MATERIAL DE LIMPEZA</option>
                  <OPTION VALUE='5006'> ND-SEGUROS</option>
                  <OPTION VALUE='5205'> ND - I.O.F</option>
                  <OPTION VALUE='5003'> ND-ALUGUEL
                  <OPTION VALUE='5151'> ND-FGTS RESCISÓRIO</option>
                  <OPTION VALUE='5110'> ND-PRESTAÇÃO DE SERV. PF</option>
                  <OPTION VALUE='5103'> ND-COPA E BAR</option>
                  <OPTION VALUE='5132'> ND-ORNAMENTOS E DECORAÇÃO</option>
                  <OPTION VALUE='5134'> ND-PROPAGANDA E PUBLICIDADE
                  <OPTION VALUE='5165'> ND - MANUTENÇÃO DE AR-CONDICI </option>
                  <OPTION VALUE='5138'> ND-PROGRAMA DE ALIMENTAÇÃO PAT</option>
                  <OPTION VALUE='5140'> ND-SERVIÇOS DE LIMPEZA</option>
                  <OPTION VALUE='5109'> ND-PRESTAÇÃO DE SERV. PJ</option>
                  <OPTION VALUE='5122'> ND-MANUTENÇÃO DAS INSTALAÇÕES</option>
                  <OPTION VALUE='5144'> ND-SUPRIMENTO DE INFORMATICA</option>
                  <OPTION VALUE='5184'> ND-LOCAÇÃO DE BENS MÓVEIS</option>
                  <OPTION VALUE='5113'> ND-AGUA</option>
                  <OPTION VALUE='5121'> ND-MANUTENÇÃO DE IMOVEIS</option>
                  <OPTION VALUE='5126'> ND-LANCHES E REFEICOES</option>
                  <OPTION VALUE='5217'> ND-PRESTAÇÃO DE SERV. V. PJ</option>
                  <OPTION VALUE='5139'> ND-DESPACHANTE</option>
                  <OPTION VALUE='5111'> ND-IMPRESSOS COPIAS E REPREDUÇ</option>
                  <OPTION VALUE='5148'> ND-PROCESSAMENTO DE DADOS SIST</option>
                  <OPTION VALUE='5152'> ND-TAXAS SEFAZ/JUNTA/DETRAN</option>
                  <OPTION VALUE='5206'> ND - TREINAMENTO/ VIAGENS/ESTA</option>
                  <OPTION VALUE='5008'> ND-MATERIAL E SERVIÇOS DE LIMP</option>
                  <OPTION VALUE='5009'> ND-MENSALIDADES E ASSOCIAÇÕES</option>
                  <OPTION VALUE='5108'> ND-FRETES E CARRETOS</option>
                  <OPTION VALUE='7506'> CP - CONV. FARMACIA</option>
                  <OPTION VALUE='5125'> ND-SUFRAMA</option>
                  <OPTION VALUE='5133'> ND-VIGILANCIA</option>
                  <OPTION VALUE='5127'> ND-MATERIAL DE EXPEDIENTE</option>
                  <OPTION VALUE='5115'> ND-TELEFONE / INTERNET</option>
                  <OPTION VALUE='7508'> CP - CONV. SUPERMERCADO
                  <OPTION VALUE='5114'> ND-LUZ</option>
                  <OPTION VALUE='5149'> ND-VALE-TRANSPORTE</option>
                  <OPTION VALUE='5136'> ND-ASSISTENCIA MEDICA</option>
                  <OPTION VALUE='5118'> ND-TAXAS DE CARTORIO E MULTAS</option>
                  <OPTION VALUE='5114'> ND-LUZ</option>
                  <OPTION VALUE='5137'> ND-GASTOS DIV. FUNCIONARIOS</option>
                  <OPTION VALUE='5131'> ND-CORTESIAS</option>
                  <OPTION VALUE='5110'> ND-PRESTAÇÃO DE SERV. PF
                  <OPTION VALUE='5138'> ND-PROGRAMA DE ALIMENTAÇÃO PAT</option>
                  <OPTION VALUE='5164'> ND - CURSOS TREINAMENTO</option>
                  <OPTION VALUE='5134'> ND-PROPAGANDA E PUBLICIDADE</option>
                  <OPTION VALUE='5109'> ND-PRESTAÇÃO DE SERV. PJ</option>
                  <OPTION VALUE='5122'> ND-MANUTENÇÃO DAS INSTALAÇÕES</option>
                  <OPTION VALUE='5144'> ND-SUPRIMENTO DE INFORMATICA</option>
                  <OPTION VALUE='5131'> ND-CORTESIAS</option>
                  <OPTION VALUE='5206'> ND-VIAGENS E REPRESENTAÇÕES</option>
                  <OPTION VALUE='5115'> ND-TELEFONE / INTERNET</option>
                  <OPTION VALUE='5127'> ND-MATERIAL DE EXPEDIENTE</option>
                  <OPTION VALUE='5108'> ND-FRETES E CARRETOS SIMPLES REMESSA</option>
                  <OPTION VALUE='5009'> ND-MENSALIDADES E ASSOCIAÇÕES</option>
                  <OPTION VALUE='5008'> ND-MATERIAL DE LIMPEZA</option>
                  <OPTION VALUE='5126'> ND-LANCHES E REFEICOES</option>
                  <OPTION VALUE='5148'> ND-PROCESSAMENTO DE DADOS SIST</option>
                  <OPTION VALUE='5103'> ND-COPA E BAR</option>
                  <OPTION VALUE='5118'> ND-TAXAS DE CARTORIO E MULTAS</option>
                  <OPTION VALUE='5114'> ND-LUZ
                  <OPTION VALUE='5125'> ND-SUFRAMA</option>
                  <OPTION VALUE='5118'> ND-TAXAS DE CARTORIO E MULTAS</option>
                  <OPTION VALUE='5108'> ND-FRETES E CARRETOS</option>
                  <OPTION VALUE='5119'> ND-MANUT. DE MAQUINAS E EQUIP.</option>
                  <OPTION VALUE='51294'> ND-MAT. CONSUMO PEÇAS/SERVIÇO</option>
                  <OPTION VALUE='5137'> ND-GASTOS DIV. FUNCIONARIOS</option>
                  <OPTION VALUE='5111'> ND-IMPRESSOS COPIAS E REPREDUÇ</option>
                  <OPTION VALUE='5159'> ND-OUTROS IMPOSTOS E TAXAS</option>
                  <OPTION VALUE='5123'> ND-MATERIAL BENS PERMANENTES</option>
                  <OPTION VALUE='5137'> ND-GASTOS DIV. FUNCIONARIOS</option>
                  <OPTION VALUE='5163'> ND-PERDAS E PROCESSOS</option>
                  <OPTION VALUE='5129'> ND-MAT. CONSUMO PEÇAS/SERVIÇO</option>
                  <OPTION VALUE='5006'> ND-SEGUROS</option>
                  <OPTION VALUE='5151'> ND-FGTS RESCISÓRIO</option>
                  <OPTION VALUE='5184'> ND-LOCAÇÃO DE BENS MÓVEIS</option>
                  <OPTION VALUE='5139'> ND-DESPACHANTE</option>
                  <OPTION VALUE='5101'> ND-COMISSOES A TERCEIROS</option>
                  <OPTION VALUE='5152'> ND-TAXAS SEFAZ/JUNTA</option>
                  <OPTION VALUE='5123'> ND-MATERIAL BENS PERMANENTES</option>
                  <OPTION VALUE='5215'> ND - OUTRAS DESPESAS</option>
                  <OPTION VALUE='5146'> ND-IPVA BAST DRIVE</option>
                  <OPTION VALUE='5120'> ND-MANUT. MOVEIS E UTENSILIOS</option>
                  <OPTION VALUE='5159'> ND-OUTROS IMPOSTOS E TAXAS</option>
                  <OPTION VALUE='5158'> ND-TAXAS PREFEITURA</option>
                  <OPTION VALUE='5129'> ND-MAT. CONSUMO PEÇAS/SERVIÇO</option>
                  <OPTION VALUE='5151'> ND-FGTS RESCISÓRIO</option>
                  <OPTION VALUE='5159'> ND-OUTROS IMPOSTOS E TAXAS</option>
                  <OPTION VALUE='5120'> ND-MANUT. MOVEIS E UTENSILIOS</option>
                  <OPTION VALUE='5128'> ND-UNIFORMES</option>
                  <OPTION VALUE='5119'> ND-MANUT. DE MAQUINAS E EQUIP.</option>
                  <OPTION VALUE='5211'> ND - TAXAS PRA ALIENAÇÃO</option>
                  <OPTION VALUE='5123'> ND-MATERIAL BENS PERMANENTES</option>
                  <OPTION VALUE='5128'> ND-UNIFORMES</option>
                  <OPTION VALUE='5119'> ND-MANUT. DE MAQUINAS E EQUIP.</option>
                  <OPTION VALUE='5104'> ND-SERVIÇOS POSTAIS</option>
                  <OPTION VALUE='5119'> ND-MANUT. DE MAQUINAS E EQUIP.</option>
                  <OPTION VALUE='5163'> ND-PERDAS E PROCESSOS</option>
                  <OPTION VALUE='5124'> ND-ICMS</option>
                  <OPTION VALUE='5005'> ND-IPTU</option>
                  <OPTION VALUE='5108'> ND-FRETES E CARRETOS
                  <OPTION VALUE='5206'> ND - TREINAMENTO/ VIAGENS/ESTA</option>
                  <OPTION VALUE='5010'> ND-ANUIDADES
                  <OPTION VALUE='51374'> ND-GASTOS DIV. FUNCIONARIOS 4 </option>
                  <OPTION VALUE='5117'> ND-DESPESAS MANUTENÇÃ VEICULOS</option>
                  <OPTION VALUE='5005'> ND-IPTU</option>
                  <OPTION VALUE=51293> ND-MAT. CONSUMO PEÇAS/SERVIÇO</option>
                  <OPTION VALUE='5106'> ND-CUSTAS JUDICIAIS</option>
                  <OPTION VALUE='5131'> ND-CORTESIAS
                  <OPTION VALUE='5152'> ND-TAXAS SEFAZ/JUNTA</option>
                  <OPTION VALUE='5141'> ND-PATROCINIO</option>
                  <OPTION VALUE='5130'> ND-EVENTOS</option>
                  <OPTION VALUE='5158'> ND-TAXAS PREFEITURA</option>
                  <OPTION VALUE='5211'> ND - TAXAS PRA ALIENAÇÃO</option>
                  <OPTION VALUE='5120'> ND-MANUT. MOVEIS E UTENSILIOS</option>
                  <OPTION VALUE='5157'> ND-TAXAS SEFAZ/ JUNTA/IEL</option>
                  <OPTION VALUE='5146'> ND-IPVA BAST DRIVE</option>
                  <OPTION VALUE='5130'> ND-EVENTOS</option>
                  <OPTION VALUE='5158'> ND-TAXAS PREFEITURA</option>
                  <OPTION VALUE='5217'> ND-PRESTAÇÃO DE SERV. V. PJ</option>
                  <OPTION VALUE='5006'> ND-SEGUROS</option>
                  <OPTION VALUE='5156'> ND-CORTESIA SEMINOVOS</option>
                  <OPTION VALUE='5141'> ND-PATROCINIO</option>
                  <OPTION VALUE='5106'> ND-CUSTAS JUDICIAIS</option>
                  <OPTION VALUE='5211'> ND - TAXAS PRA ALIENAÇÃO</option>
                  <OPTION VALUE='5163'> ND-PERDAS E PROCESSOS</option>

                </select></td> -->
              <td><input type='number' step='.01' placeholder="Valor da Nota" id='valorNota' name='valorNota' /></td>
              <td ><input style="width:4rem ;" type='text' placeholder="OBS" id='obs' name='obs' /></td>
              <td>
              <select name='iss'  id='iss'>
                  <option value=''> Sem ISS</option>
                  <option value='1'>1%</option>
                  <option value='2'> 2% </option>
                  <option value='3'> 3% </option>
                  <option value='4'> 4%</option>
                  <option value='5'> 5%</option>
                  </select></td>
                  <td>
              <select name='csll'  id='csll'>
                  <option value=''> Sem PCC</option>
                  <option value='4.65'> 4,65%</option>
                  </select></td>
                  <td>
              <select name='ir'  id='ir'>
                  <option value=''> Sem IR</option>
                  <option value='1.5'> 1,5%</option>
                  </select></td>
              <td><input style="width:4rem ;" type="checkbox" name="" id=""></td>     
              <td><input style="width:4rem ;" type="file" name="notainf" id="inf"></td>  
              <td><input type="submit" onclick='avulso()' class="bg-green-500 hover:bg-blue-700 text-white font py-2 px-4 rounded-full" /></td>  
            </form>
            
          </tr>

        </table>
      </div>
    </div>

  </div>

</body>

</html>

