<?php
//session_start();
$empresa = $_SESSION['empresa'];
//var_dump($empresa);
require 'pdo.php';
require 'views/modal.php';
//var_dump($empresa);
$listagemnotas ="select id, numero_nota, envionota,nomearquivo, usuario_envio, datadeemissao, client_cnpj,datadepagamento from notas where class= '' and avulso!='1' and empresa='$empresa' order by id DESC";
$result_notas=$pdo->prepare($listagemnotas);
$result_notas -> execute();
echo '<pre>';

while($row_usuario = $result_notas->fetch(PDO::FETCH_ASSOC) ){
    extract($row_usuario);
   // $envionota= $row_usuario['envionota'];
   // $numerodanota= $row_usuario['numero_nota'];
    echo "
<tr>
   <!-- <td id='identificador$id' class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>$id</td> -->
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>$datadeemissao</td>
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'><button
            class='bg-green-500 text-white rounded-md px-8 py-2 text-base font-medium hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300'
            id='open-btn'> $numero_nota </button></td>
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>$client_cnpj</td>
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>";echo "<a href='controllers/notas/$id/$nomearquivo'>nota</a>";echo"</td>
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>
              <select name='' id='trans$id'>
                <option value='D01'>D01</option>
                <option value='D02'>D02</option>
                <option value='D03'>D03</option>
              </select>
            </td>
            <td class='border-2 border-[#333333] bg-[#929292] text-orange py-1 px-8'>
              <select name='Departamento' defaulr='Despesa' id='departamento$id'>
                <option value='10'>VN</option>
                <option value='20'>VU</option>
                <option value='30'>PC</option>
                <option value='40'>OF</option>
                <option value='50'>AD</option>
              </select>
            </td>
            <td class='border-2 border-[#333333] bg-[#087e17] text-[#580c0c] py-1 px-8'>
              <input id='pagamento$id' type='date' />
            </td>
     
          <!--  <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>
              <select name='destino' defaulr='Despesa' id='destino'>
                <option value='103'>103</option>
                <option value='bb'>BB</option>
              </select>
            </td> -->
            <td class='border-2 border-[#333333] bg-[#929292] text-orange py-1 px-8'>
            <select style='width:8rem;' name='destino' default='Despesa' id='destino$id'>
              <option value='50' >Administracao</option>
            <option value='5217'>  ND-PRESTAÇÃO DE SERV. V. PJ </option>
        <option value='5101'> ND-COMISSOES A TERCEIROS </option>
        <option value='5126'>ND-LANCHES E REFEICOES</option>
        <option value='5134'>ND-PROPAGANDA E PUBLICIDADE</option>
        <option value='5138'>ND-PROGRAMA DE ALIMENTAÇÃO PAT</option>
        <option value='5140'>ND-SERVIÇOS DE LIMPEZA</option>
        <OPTION VALUE='51462' > ND-IPVA/LINC. USADOS</option>
        <OPTION VALUE='51911' > ND-WORKSHOP NOVOS</option>
        <OPTION VALUE='51292' > ND-MAT. CONSUMO PÇ/SERV USADOS</option>
        <OPTION VALUE='51293' > ND-MAT. CONSUMO PÇ/SERV PEÇAS</option>
        <OPTION VALUE='51294' > ND-MAT. CONSUMO PÇ/SERV OFICINA</option>
        <OPTION VALUE='5109' > ND-PRESTAÇÃO DE SERV. PJ</option>
        <OPTION VALUE= '5122' > ND-MANUTENÇÃO DAS INSTALAÇÕES</option>
        <OPTION VALUE=' 5132' > ND-ORNAMENTOS E DECORAÇÃO</option>
        <OPTION VALUE= '5144' > ND-SUPRIMENTO DE INFORMATICA</option>
        <OPTION VALUE= '5103' > ND-COPA E BAR</option>
        <OPTION VALUE='51161' > ND-COMBUSTÍVEL E LUBRI NOVOS</option>
        <OPTION VALUE='51162' > ND-COMBUSTÍVEL E LUBRI USADOS</option>
        <OPTION VALUE='51163' > ND-COMBUSTÍVEL E LUBRI PEÇAS</option>
        <OPTION VALUE='51164' > ND-COMBUSTÍVEL E LUBRI OFICINA</option>
        <OPTION VALUE='51165' > ND-COMBUSTÍVEL E LUBRI ADMINISTRACAO</option>
        <OPTION VALUE='5008' > ND-MATERIAL DE LIMPEZA</option>
        <OPTION VALUE='5139' > ND-DESPACHANTE</option>
        <OPTION VALUE='5009' > ND-MENSALIDADES E ASSOCIAÇÕES</option>
        <OPTION VALUE=  '9994' > ND - LIVRE DE DEBITO</option>
        <OPTION VALUE='5165'> ND -  MANUTENÇÃO DE AR-CONDICIONADO</option>
        <OPTION VALUE='5131' > ND-CORTESIAS</option>
        <OPTION VALUE='5148' > ND-PROCESSAMENTO DE DADOS SIST</option>
        <OPTION VALUE='5206' > ND - TREINAMENTO/ VIAGENS/ESTA</option>
        <OPTION VALUE='5184' > ND-LOCAÇÃO DE BENS MÓVEIS</option>
        <OPTION VALUE='5125' > ND-SUFRAMA</option>
        <OPTION VALUE='5133' > ND-VIGILANCIA</option>
        <OPTION VALUE='5110' > ND-PRESTAÇÃO DE SERV. PF</option>
        <OPTION VALUE='5146' > ND-IPVA BAST DRIVE</option>
        <OPTION VALUE='7506' > CP - CONV. FARMACIA</option>
        <OPTION VALUE='7508' > CP - CONV. SUPERMERCADO</option>
        <OPTION VALUE='5118' > ND-TAXAS DE CARTORIO E MULTAS</option>
        <OPTION VALUE='5149' > ND-VALE-TRANSPORTE</option>
        <OPTION VALUE='5136' > ND-ASSISTENCIA MEDICA</option>
        <OPTION VALUE='5115' > ND-TELEFONE / INTERNET</option>
        <OPTION VALUE='5117' > ND-DESPESAS MANUTENÇÃ VEICULOS</option>
        <OPTION VALUE= '5119' > ND-MANUT. DE MAQUINAS E EQUIP.</option>
        <OPTION VALUE='5114' > ND-LUZ</option>
        <OPTION VALUE='5124' > ND-ICMS</option>
        <OPTION VALUE='5104' > ND-SERVIÇOS POSTAIS</option>
        <OPTION VALUE='5152' > ND-TAXAS SEFAZ/JUNTA/DETRAN</option>
        <OPTION VALUE='5113' > ND-AGUA</option>
        <OPTION VALUE='5155' > ND-MULTAS DE TRANSITO</option>
        <OPTION VALUE='5106' > ND-CUSTAS JUDICIAIS</option>
        <OPTION VALUE='5127' > ND-MATERIAL DE EXPEDIENTE</option>
        <OPTION VALUE='5209' > ND-MATERIAL DE LIMP.RECOL DIST</option>
        <OPTION VALUE='5143' > ND-CORTESIAS E BRINDES</option>
        <OPTION VALUE= '5202' > ND-FRETES ESTOQUE PÇS</option>
        <OPTION VALUE='5003' > ND-ALUGUEL</option>
        <OPTION VALUE='5150' > ND-DESPESAS FINANCEIRAS CDCI</option>
        <OPTION VALUE='5121' > ND-MANUTENÇÃO DE IMOVEIS </option>
        <OPTION VALUE='5126' > ND-LANCHES E REFEICOES </option>
        <OPTION VALUE='5117' > ND-PRESTAÇÃO DE SERV. V. PJ </option>
        <OPTION VALUE='5165' > ND -  MANUTENÇÃO DE AR-CONDICI </option>
        <OPTION VALUE='5134' > ND-PROPAGANDA E PUBLICIDADE </option>
        <OPTION VALUE='5143' > ND-CORTESIAS E BR NDES </option>
        <OPTION VALUE='5140' > ND-SERVIÇOS DE LIMPEZA </option>
        <OPTION VALUE='5109' > ND-PRESTAÇÃO DE SERV. PJ</option>
        <OPTION VALUE='5119' > ND-MANUT. DE MAQUINAS E EQUIP.</option>
        <OPTION VALUE='5009' > ND-MENSALIDADES E ASSOCIAÇÕES</option>
        <OPTION VALUE='5101' > ND-COMISSOES A TERCEIROS</option>
        <OPTION VALUE='5144' > ND-SUPRIMENTO DE INFORMATICA</option>
        <OPTION VALUE='5128' > ND-UNIFORMES</option>
        <OPTION VALUE='5148' > ND-PROCESSAMENTO DE DADOS SIST</option>
        <OPTION VALUE='5103' > ND-COPA E BAR</option>
        <OPTION VALUE='5122' > ND-MANUTENÇÃO DAS INSTALAÇÕES</option>
        <OPTION VALUE='5111' > ND-IMPRESSOS COPIAS E REPREDUÇ</option>
        <OPTION VALUE='5123' > ND-MATERIAL BENS PERMANENTES
        <OPTION VALUE='5139' > ND-DESPACHANTE</option>
        <OPTION VALUE='5108' > ND-FRETES E CARRETOS</option>
        <OPTION VALUE='5131' > ND-CORTESIAS</option>
        <OPTION VALUE='5152' > ND-TAXAS SEFAZ/JUNTA/DETRAN</option>
        <OPTION VALUE='5184' > ND-LOCAÇÃO DE BENS MÓVEIS</option>
        <OPTION VALUE='5008' > ND-MATERIAL DE LIMPEZA</option>
        <OPTION VALUE='5125' > ND-SUFRAMA</option>
        <OPTION VALUE='5133' > ND-VIGILANCIA</option>
        <OPTION VALUE='5127' > ND-MATERIAL DE EXPEDIENTE</option>
        <OPTION VALUE='7506' > CP - CONV. FARMACIA</option>
        <OPTION VALUE='5123' > ND-MATERIAL BENS PERMANENTES</option>
        <OPTION VALUE='5138' > ND-PROGRAMA DE ALIMENTAÇÃO PAT</option>
        <OPTION VALUE='7508' > CP - CONV. SUPERMERCADO</option>
        <OPTION VALUE='5112' > ND-ASSINATURAS-LIVROS/REVISTA</option>
        <OPTION VALUE='5115' > ND-TELEFONE / INTERNET</option>
        <OPTION VALUE='5114' > ND-LUZ</option>
        <OPTION VALUE='5149' > ND-VALE-TRANSPORTE</option>
        <OPTION VALUE='5202' > ND-FRETES ESTOQUE PÇS
        <OPTION VALUE='5136' > ND-ASSISTENCIA MEDICA</option>
        <OPTION VALUE='5104' > ND-SERVIÇOS POSTAIS</option>
        <OPTION VALUE='5163' > ND-PERDAS E PROCESSOS</option>
        <OPTION VALUE='5159' > ND-OUTROS IMPOSTOS E TAXAS</option>
        <OPTION VALUE='5158' > ND-TAXAS PREFEITURA</option>
        <OPTION VALUE='5114' > ND-LUZ</option>
        <OPTION VALUE='9994' > ND - LIVRE DE DEBITO</option>
        <OPTION VALUE='5106' > ND-CUSTAS JUDICIAIS</option>
        <OPTION VALUE='5209' > ND-MATERIAL DE LIMPEZA</option>
        <OPTION VALUE='5006' > ND-SEGUROS</option>
        <OPTION VALUE='5205' > ND - I.O.F</option>
        <OPTION VALUE='5003' > ND-ALUGUEL
        <OPTION VALUE='5151' > ND-FGTS RESCISÓRIO</option>
        <OPTION VALUE='5110' > ND-PRESTAÇÃO DE SERV. PF</option>
        <OPTION VALUE='5103' > ND-COPA E BAR</option>
        <OPTION VALUE='5132' > ND-ORNAMENTOS E DECORAÇÃO</option>
        <OPTION VALUE='5134' > ND-PROPAGANDA E PUBLICIDADE
        <OPTION VALUE='5165' > ND -  MANUTENÇÃO DE AR-CONDICI </option>
        <OPTION VALUE='5138' > ND-PROGRAMA DE ALIMENTAÇÃO PAT</option>
        <OPTION VALUE='5140' > ND-SERVIÇOS DE LIMPEZA</option>
        <OPTION VALUE='5109' > ND-PRESTAÇÃO DE SERV. PJ</option>
        <OPTION VALUE='5122' > ND-MANUTENÇÃO DAS INSTALAÇÕES</option>
        <OPTION VALUE='5144' > ND-SUPRIMENTO DE INFORMATICA</option>
        <OPTION VALUE='5184' > ND-LOCAÇÃO DE BENS MÓVEIS</option>
        <OPTION VALUE='5113' > ND-AGUA</option>
        <OPTION VALUE='5121' > ND-MANUTENÇÃO DE IMOVEIS</option>
        <OPTION VALUE='5126' > ND-LANCHES E REFEICOES</option>
        <OPTION VALUE='5217' > ND-PRESTAÇÃO DE SERV. V. PJ</option>
        <OPTION VALUE='5139' > ND-DESPACHANTE</option>
        <OPTION VALUE='5111' > ND-IMPRESSOS COPIAS E REPREDUÇ</option>
        <OPTION VALUE='5148' > ND-PROCESSAMENTO DE DADOS SIST</option>
        <OPTION VALUE='5152' > ND-TAXAS SEFAZ/JUNTA/DETRAN</option>
        <OPTION VALUE='5206' > ND - TREINAMENTO/ VIAGENS/ESTA</option>
        <OPTION VALUE='5008' > ND-MATERIAL E SERVIÇOS DE LIMP</option>
        <OPTION VALUE='5009' > ND-MENSALIDADES E ASSOCIAÇÕES</option>
        <OPTION VALUE='5108' > ND-FRETES E CARRETOS</option>
        <OPTION VALUE='7506' > CP - CONV. FARMACIA</option>
        <OPTION VALUE='5125' > ND-SUFRAMA</option>
        <OPTION VALUE='5133' > ND-VIGILANCIA</option>
        <OPTION VALUE='5127' > ND-MATERIAL DE EXPEDIENTE</option>
        <OPTION VALUE='5115' > ND-TELEFONE / INTERNET</option>
        <OPTION VALUE= '7508' > CP - CONV. SUPERMERCADO
        <OPTION VALUE='5114' > ND-LUZ</option>
        <OPTION VALUE='5149' > ND-VALE-TRANSPORTE</option>
        <OPTION VALUE='5136' > ND-ASSISTENCIA MEDICA</option>
        <OPTION VALUE='5118' > ND-TAXAS DE CARTORIO E MULTAS</option>
        <OPTION VALUE='5114' > ND-LUZ</option>
        <OPTION VALUE='5137' > ND-GASTOS DIV. FUNCIONARIOS</option>
        <OPTION VALUE='5131' > ND-CORTESIAS</option>
        <OPTION VALUE='5110' > ND-PRESTAÇÃO DE SERV. PF
        <OPTION VALUE='5138' > ND-PROGRAMA DE ALIMENTAÇÃO PAT</option>
        <OPTION VALUE='5164' > ND - CURSOS TREINAMENTO</option>
        <OPTION VALUE='5134' > ND-PROPAGA NDA E PUBLICIDADE</option>
        <OPTION VALUE='5134' > ND-IMPRESSOS COPIAS E REPREDUÇ</option>
        <OPTION VALUE='5109' > ND-PRESTAÇÃO DE SERV. PJ</option>
        <OPTION VALUE='5122' > ND-MANUTENÇÃO DAS INSTALAÇÕES</option>
        <OPTION VALUE='5144' > ND-SUPRIMENTO DE INFORMATICA</option>
        <OPTION VALUE='5131' > ND-CORTESIAS</option>
        <OPTION VALUE='5105' > ND-VIAGENS E REPRESENTAÇÕES</option>
        <OPTION VALUE='5115' > ND-TELEFONE / INTERNET</option>
        <OPTION VALUE='5127' > ND-MATERIAL DE EXPEDIENTE</option>
        <OPTION VALUE='5108' > ND-FRETES E CARRETOS SIMPLES REMESSA</option>
        <OPTION VALUE='5009' > ND-MENSALIDADES E ASSOCIAÇÕES</option>
        <OPTION VALUE='5008' > ND-MATERIAL DE LIMPEZA</option>
        <OPTION VALUE='5126' > ND-LANCHES E REFEICOES</option>
        <OPTION VALUE='5148' > ND-PROCESSAMENTO DE DADOS SIST</option>
        <OPTION VALUE='5103' > ND-COPA E BAR</option>
        <OPTION VALUE='5118' > ND-TAXAS DE CARTORIO E MULTAS</option>
        <OPTION VALUE= '5114' > ND-LUZ
        <OPTION VALUE='5125' > ND-SUFRAMA</option>
        <OPTION VALUE='5118' > ND-TAXAS DE CARTORIO E MULTAS</option>
        <OPTION VALUE='5108' > ND-FRETES E CARRETOS</option>
        <OPTION VALUE='5119' > ND-MANUT. DE MAQUINAS E EQUIP.</option>
        <OPTION VALUE='51294' > ND-MAT. CONSUMO PEÇAS/SERVIÇO</option>
        <OPTION VALUE='5137' > ND-GASTOS DIV. FUNCIONARIOS</option>
        <OPTION VALUE='5111' > ND-IMPRESSOS COPIAS E REPREDUÇ</option>
        <OPTION VALUE='5159' > ND-OUTROS IMPOSTOS E TAXAS</option>
        <OPTION VALUE='5123' > ND-MATERIAL BENS PERMANENTES</option>
        <OPTION VALUE='5137' > ND-GASTOS DIV. FUNCIONARIOS</option>
        <OPTION VALUE='5163' > ND-PERDAS E PROCESSOS</option>
        <OPTION VALUE='5129' > ND-MAT. CONSUMO PEÇAS/SERVIÇO</option>
        <OPTION VALUE='5006' > ND-SEGUROS</option>
        <OPTION VALUE='5151' > ND-FGTS RESCISÓRIO</option>
        <OPTION VALUE='5184' > ND-LOCAÇÃO DE BENS MÓVEIS</option>
        <OPTION VALUE='5139' > ND-DESPACHANTE</option>
        <OPTION VALUE='5101' > ND-COMISSOES A TERCEIROS</option>
        <OPTION VALUE='5152' > ND-TAXAS SEFAZ/JUNTA</option>
        <OPTION VALUE='5123' > ND-MATERIAL BENS PERMANENTES</option>
        <OPTION VALUE='5215' > ND - OUTRAS DESPESAS</option>
        <OPTION VALUE='5146' > ND-IPVA BAST DRIVE</option>
        <OPTION VALUE='5120' > ND-MANUT. MOVEIS E UTENSILIOS</option>
        <OPTION VALUE='5159' > ND-OUTROS IMPOSTOS E TAXAS</option>
        <OPTION VALUE='5158' > ND-TAXAS PREFEITURA</option>
        <OPTION VALUE='5129' > ND-MAT. CONSUMO PEÇAS/SERVIÇO</option>
        <OPTION VALUE='5151' > ND-FGTS RESCISÓRIO</option>
        <OPTION VALUE='5159' > ND-OUTROS IMPOSTOS E TAXAS</option>
        <OPTION VALUE='5120' > ND-MANUT. MOVEIS E UTENSILIOS</option>
        <OPTION VALUE='5128' > ND-UNIFORMES</option>
        <OPTION VALUE='5119' > ND-MANUT. DE MAQUINAS E EQUIP.</option>
        <OPTION VALUE='5211' > ND - TAXAS PRA ALIENAÇÃO</option>
        <OPTION VALUE='5123' > ND-MATERIAL BENS PERMANENTES</option>
        <OPTION VALUE='5128' > ND-UNIFORMES</option>
        <OPTION VALUE='5119' > ND-MANUT. DE MAQUINAS E EQUIP.</option>
        <OPTION VALUE='5104' > ND-SERVIÇOS POSTAIS</option>
        <OPTION VALUE='5119' > ND-MANUT. DE MAQUINAS E EQUIP.</option>
        <OPTION VALUE='5163' > ND-PERDAS E PROCESSOS</option>
        <OPTION VALUE='5124' > ND-ICMS</option>
        <OPTION VALUE='5005' > ND-IPTU</option>
        <OPTION VALUE='5108' > ND-FRETES E CARRETOS
        <OPTION VALUE='5206'> ND - TREINAMENTO/ VIAGENS/ESTA</option>
        <OPTION VALUE='5010' > ND-ANUIDADES
        <OPTION VALUE='51374' > ND-GASTOS DIV. FUNCIONARIOS 4 </option>
        <OPTION VALUE='5117' > ND-DESPESAS MANUTENÇÃ VEICULOS</option>
        <OPTION VALUE='5005' > ND-IPTU</option>
        <OPTION VALUE=51293 > ND-MAT. CONSUMO PEÇAS/SERVIÇO</option>
        <OPTION VALUE='5106' > ND-CUSTAS JUDICIAIS</option>
        <OPTION VALUE='5131' > ND-CORTESIAS
        <OPTION VALUE='5152' > ND-TAXAS SEFAZ/JUNTA</option>
        <OPTION VALUE='5141' > ND-PATROCINIO</option>
        <OPTION VALUE='5130' > ND-EVENTOS</option>
        <OPTION VALUE='5158' > ND-TAXAS PREFEITURA</option>
        <OPTION VALUE='5211' > ND - TAXAS PRA ALIENAÇÃO</option>
        <OPTION VALUE='5120' > ND-MANUT. MOVEIS E UTENSILIOS</option>
        <OPTION VALUE='5157' > ND-TAXAS SEFAZ/ JUNTA/IEL</option>
        <OPTION VALUE='5146' > ND-IPVA BAST DRIVE</option>
        <OPTION VALUE='5130' > ND-EVENTOS</option>
        <OPTION VALUE='5158' > ND-TAXAS PREFEITURA</option>
        <OPTION VALUE='5217' > ND-PRESTAÇÃO DE SERV. V. PJ</option>
        <OPTION VALUE='5006' > ND-SEGUROS</option>
        <OPTION VALUE='5156' > ND-CORTESIA SEMINOVOS</option>
        <OPTION VALUE='5141' > ND-PATROCINIO</option>
        <OPTION VALUE='5106' > ND-CUSTAS JUDICIAIS</option>
        <OPTION VALUE='5211' > ND - TAXAS PRA ALIENAÇÃO</option>
        <OPTION VALUE='5163' > ND-PERDAS E PROCESSOS</option>
        
            </select>
        </td>
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>
              <INPUT type='text' placeholder='insira aqui a obs' />
            </td>
             <td class=' enviar$id border-2 border-[#333333] bg-[#060505] text-[#efefef] py-1 px-8'>
          <button id ='enviar$id' onclick='informations($id)' class=' bg-green-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full'>START</button>
          </td>

            </tr> ";

}

$listagemnotas1 ="select id, numero_nota, envionota,nomearquivo,obs, usuario_envio, datadeemissao,transacao, client_cnpj,datadepagamento,datadanota,departamento,origens,iss,csll,ir from notas where class= '' and avulso='1' and empresa='$empresa' order by id DESC";
$result_notas1=$pdo->prepare($listagemnotas1);
$result_notas1 -> execute();
echo '<pre>';

while($row_usuario1 = $result_notas1->fetch(PDO::FETCH_ASSOC) ){
    extract($row_usuario1);
   // $envionota= $row_usuario['envionota'];
   echo"  <div id='ex$id' class='modal'>
   <p>Detalhamento da nota</p><br>
   
    csll da nota = $csll <br>
   iss = $iss e ir = $ir <br>

   <strong>SOLICITADOR: </strong> $usuario_envio
   
   </p>
   <a href='#' rel='modal:close'>Close</a>
 </div>"; 
   // $numerodanota= $row_usuario['numero_nota'];
    echo "
<tr>
   <!-- <td id='identificador$id' class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>$id</td> -->
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>$datadanota</td>
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'><p><a href='#ex$id' rel='modal:open'>$numero_nota</a>
            </p></td>
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>$client_cnpj</td>
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>";echo "<a href='controllers/notas/$id/$nomearquivo'>nota</a>";echo"</td>
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>
  

            <select name='transação' id='transacao$id'>
            <option value='D01'>D01</option>
            <option value='D02'>D02</option>
            <option value='D03'>D03</option>
          </select></td>
            
            <td class='border-2 border-[#333333] bg-[#929292] text-orange py-1 px-8'>
    
          $departamento

            </td>
            <td class='border-2 border-[#333333] bg-[#087e17] text-[#580c0c] py-1 px-8'>
              $datadepagamento
            </td>
     
          <!--  <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>
              <select name='destino' defaulr='Despesa' id='destino'>
                <option value='103'>103</option>
                <option value='bb'>BB</option>
              </select>
            </td> -->
            <td class='border-2 border-[#333333] bg-[#929292] text-orange py-1 px-8'>
            <select style='width:8rem;' name='destino' default='Despesa' id='destino$id'>
            <option value='50' >Administracao</option>
          <option value='5217'>  ND-PRESTAÇÃO DE SERV. V. PJ </option>
      <option value='5101'> ND-COMISSOES A TERCEIROS </option>
      <option value='5126'>ND-LANCHES E REFEICOES</option>
      <option value='5134'>ND-PROPAGANDA E PUBLICIDADE</option>
      <option value='5138'>ND-PROGRAMA DE ALIMENTAÇÃO PAT</option>
      <option value='5140'>ND-SERVIÇOS DE LIMPEZA</option>
      <OPTION VALUE='51462' > ND-IPVA/LINC. USADOS</option>
      <OPTION VALUE='51911' > ND-WORKSHOP NOVOS</option>
      <OPTION VALUE='51292' > ND-MAT. CONSUMO PÇ/SERV USADOS</option>
      <OPTION VALUE='51293' > ND-MAT. CONSUMO PÇ/SERV PEÇAS</option>
      <OPTION VALUE='51294' > ND-MAT. CONSUMO PÇ/SERV OFICINA</option>
      <OPTION VALUE='5109' > ND-PRESTAÇÃO DE SERV. PJ</option>
      <OPTION VALUE= '5122' > ND-MANUTENÇÃO DAS INSTALAÇÕES</option>
      <OPTION VALUE=' 5132' > ND-ORNAMENTOS E DECORAÇÃO</option>
      <OPTION VALUE= '5144' > ND-SUPRIMENTO DE INFORMATICA</option>
      <OPTION VALUE= '5103' > ND-COPA E BAR</option>
      <OPTION VALUE='51161' > ND-COMBUSTÍVEL E LUBRI NOVOS</option>
      <OPTION VALUE='51162' > ND-COMBUSTÍVEL E LUBRI USADOS</option>
      <OPTION VALUE='51163' > ND-COMBUSTÍVEL E LUBRI PEÇAS</option>
      <OPTION VALUE='51164' > ND-COMBUSTÍVEL E LUBRI OFICINA</option>
      <OPTION VALUE='51165' > ND-COMBUSTÍVEL E LUBRI ADMINISTRACAO</option>
      <OPTION VALUE='5008' > ND-MATERIAL DE LIMPEZA</option>
      <OPTION VALUE='5139' > ND-DESPACHANTE</option>
      <OPTION VALUE='5009' > ND-MENSALIDADES E ASSOCIAÇÕES</option>
      <OPTION VALUE=  '9994' > ND - LIVRE DE DEBITO</option>
      <OPTION VALUE='5165'> ND -  MANUTENÇÃO DE AR-CONDICIONADO</option>
      <OPTION VALUE='5131' > ND-CORTESIAS</option>
      <OPTION VALUE='5148' > ND-PROCESSAMENTO DE DADOS SIST</option>
      <OPTION VALUE='5206' > ND - TREINAMENTO/ VIAGENS/ESTA</option>
      <OPTION VALUE='5184' > ND-LOCAÇÃO DE BENS MÓVEIS</option>
      <OPTION VALUE='5125' > ND-SUFRAMA</option>
      <OPTION VALUE='5133' > ND-VIGILANCIA</option>
      <OPTION VALUE='5110' > ND-PRESTAÇÃO DE SERV. PF</option>
      <OPTION VALUE='5146' > ND-IPVA BAST DRIVE</option>
      <OPTION VALUE='7506' > CP - CONV. FARMACIA</option>
      <OPTION VALUE='7508' > CP - CONV. SUPERMERCADO</option>
      <OPTION VALUE='5118' > ND-TAXAS DE CARTORIO E MULTAS</option>
      <OPTION VALUE='5149' > ND-VALE-TRANSPORTE</option>
      <OPTION VALUE='5136' > ND-ASSISTENCIA MEDICA</option>
      <OPTION VALUE='5115' > ND-TELEFONE / INTERNET</option>
      <OPTION VALUE='5117' > ND-DESPESAS MANUTENÇÃ VEICULOS</option>
      <OPTION VALUE= '5119' > ND-MANUT. DE MAQUINAS E EQUIP.</option>
      <OPTION VALUE='5114' > ND-LUZ</option>
      <OPTION VALUE='5124' > ND-ICMS</option>
      <OPTION VALUE='5104' > ND-SERVIÇOS POSTAIS</option>
      <OPTION VALUE='5152' > ND-TAXAS SEFAZ/JUNTA/DETRAN</option>
      <OPTION VALUE='5113' > ND-AGUA</option>
      <OPTION VALUE='5155' > ND-MULTAS DE TRANSITO</option>
      <OPTION VALUE='5106' > ND-CUSTAS JUDICIAIS</option>
      <OPTION VALUE='5127' > ND-MATERIAL DE EXPEDIENTE</option>
      <OPTION VALUE='5209' > ND-MATERIAL DE LIMP.RECOL DIST</option>
      <OPTION VALUE='5143' > ND-CORTESIAS E BRINDES</option>
      <OPTION VALUE= '5202' > ND-FRETES ESTOQUE PÇS</option>
      <OPTION VALUE='5003' > ND-ALUGUEL</option>
      <OPTION VALUE='5150' > ND-DESPESAS FINANCEIRAS CDCI</option>
      <OPTION VALUE='5121' > ND-MANUTENÇÃO DE IMOVEIS </option>
      <OPTION VALUE='5126' > ND-LANCHES E REFEICOES </option>
      <OPTION VALUE='5117' > ND-PRESTAÇÃO DE SERV. V. PJ </option>
      <OPTION VALUE='5165' > ND -  MANUTENÇÃO DE AR-CONDICI </option>
      <OPTION VALUE='5134' > ND-PROPAGANDA E PUBLICIDADE </option>
      <OPTION VALUE='5143' > ND-CORTESIAS E BR NDES </option>
      <OPTION VALUE='5140' > ND-SERVIÇOS DE LIMPEZA </option>
      <OPTION VALUE='5109' > ND-PRESTAÇÃO DE SERV. PJ</option>
      <OPTION VALUE='5119' > ND-MANUT. DE MAQUINAS E EQUIP.</option>
      <OPTION VALUE='5009' > ND-MENSALIDADES E ASSOCIAÇÕES</option>
      <OPTION VALUE='5101' > ND-COMISSOES A TERCEIROS</option>
      <OPTION VALUE='5144' > ND-SUPRIMENTO DE INFORMATICA</option>
      <OPTION VALUE='5128' > ND-UNIFORMES</option>
      <OPTION VALUE='5148' > ND-PROCESSAMENTO DE DADOS SIST</option>
      <OPTION VALUE='5103' > ND-COPA E BAR</option>
      <OPTION VALUE='5122' > ND-MANUTENÇÃO DAS INSTALAÇÕES</option>
      <OPTION VALUE='5111' > ND-IMPRESSOS COPIAS E REPREDUÇ</option>
      <OPTION VALUE='5123' > ND-MATERIAL BENS PERMANENTES
      <OPTION VALUE='5139' > ND-DESPACHANTE</option>
      <OPTION VALUE='5108' > ND-FRETES E CARRETOS</option>
      <OPTION VALUE='5131' > ND-CORTESIAS</option>
      <OPTION VALUE='5152' > ND-TAXAS SEFAZ/JUNTA/DETRAN</option>
      <OPTION VALUE='5184' > ND-LOCAÇÃO DE BENS MÓVEIS</option>
      <OPTION VALUE='5008' > ND-MATERIAL DE LIMPEZA</option>
      <OPTION VALUE='5125' > ND-SUFRAMA</option>
      <OPTION VALUE='5133' > ND-VIGILANCIA</option>
      <OPTION VALUE='5127' > ND-MATERIAL DE EXPEDIENTE</option>
      <OPTION VALUE='7506' > CP - CONV. FARMACIA</option>
      <OPTION VALUE='5123' > ND-MATERIAL BENS PERMANENTES</option>
      <OPTION VALUE='5138' > ND-PROGRAMA DE ALIMENTAÇÃO PAT</option>
      <OPTION VALUE='7508' > CP - CONV. SUPERMERCADO</option>
      <OPTION VALUE='5112' > ND-ASSINATURAS-LIVROS/REVISTA</option>
      <OPTION VALUE='5115' > ND-TELEFONE / INTERNET</option>
      <OPTION VALUE='5114' > ND-LUZ</option>
      <OPTION VALUE='5149' > ND-VALE-TRANSPORTE</option>
      <OPTION VALUE='5202' > ND-FRETES ESTOQUE PÇS
      <OPTION VALUE='5136' > ND-ASSISTENCIA MEDICA</option>
      <OPTION VALUE='5104' > ND-SERVIÇOS POSTAIS</option>
      <OPTION VALUE='5163' > ND-PERDAS E PROCESSOS</option>
      <OPTION VALUE='5159' > ND-OUTROS IMPOSTOS E TAXAS</option>
      <OPTION VALUE='5158' > ND-TAXAS PREFEITURA</option>
      <OPTION VALUE='5114' > ND-LUZ</option>
      <OPTION VALUE='9994' > ND - LIVRE DE DEBITO</option>
      <OPTION VALUE='5106' > ND-CUSTAS JUDICIAIS</option>
      <OPTION VALUE='5209' > ND-MATERIAL DE LIMPEZA</option>
      <OPTION VALUE='5006' > ND-SEGUROS</option>
      <OPTION VALUE='5205' > ND - I.O.F</option>
      <OPTION VALUE='5003' > ND-ALUGUEL
      <OPTION VALUE='5151' > ND-FGTS RESCISÓRIO</option>
      <OPTION VALUE='5110' > ND-PRESTAÇÃO DE SERV. PF</option>
      <OPTION VALUE='5103' > ND-COPA E BAR</option>
      <OPTION VALUE='5132' > ND-ORNAMENTOS E DECORAÇÃO</option>
      <OPTION VALUE='5134' > ND-PROPAGANDA E PUBLICIDADE
      <OPTION VALUE='5165' > ND -  MANUTENÇÃO DE AR-CONDICI </option>
      <OPTION VALUE='5138' > ND-PROGRAMA DE ALIMENTAÇÃO PAT</option>
      <OPTION VALUE='5140' > ND-SERVIÇOS DE LIMPEZA</option>
      <OPTION VALUE='5109' > ND-PRESTAÇÃO DE SERV. PJ</option>
      <OPTION VALUE='5122' > ND-MANUTENÇÃO DAS INSTALAÇÕES</option>
      <OPTION VALUE='5144' > ND-SUPRIMENTO DE INFORMATICA</option>
      <OPTION VALUE='5184' > ND-LOCAÇÃO DE BENS MÓVEIS</option>
      <OPTION VALUE='5113' > ND-AGUA</option>
      <OPTION VALUE='5121' > ND-MANUTENÇÃO DE IMOVEIS</option>
      <OPTION VALUE='5126' > ND-LANCHES E REFEICOES</option>
      <OPTION VALUE='5217' > ND-PRESTAÇÃO DE SERV. V. PJ</option>
      <OPTION VALUE='5139' > ND-DESPACHANTE</option>
      <OPTION VALUE='5111' > ND-IMPRESSOS COPIAS E REPREDUÇ</option>
      <OPTION VALUE='5148' > ND-PROCESSAMENTO DE DADOS SIST</option>
      <OPTION VALUE='5152' > ND-TAXAS SEFAZ/JUNTA/DETRAN</option>
      <OPTION VALUE='5206' > ND - TREINAMENTO/ VIAGENS/ESTA</option>
      <OPTION VALUE='5008' > ND-MATERIAL E SERVIÇOS DE LIMP</option>
      <OPTION VALUE='5009' > ND-MENSALIDADES E ASSOCIAÇÕES</option>
      <OPTION VALUE='5108' > ND-FRETES E CARRETOS</option>
      <OPTION VALUE='7506' > CP - CONV. FARMACIA</option>
      <OPTION VALUE='5125' > ND-SUFRAMA</option>
      <OPTION VALUE='5133' > ND-VIGILANCIA</option>
      <OPTION VALUE='5127' > ND-MATERIAL DE EXPEDIENTE</option>
      <OPTION VALUE='5115' > ND-TELEFONE / INTERNET</option>
      <OPTION VALUE= '7508' > CP - CONV. SUPERMERCADO
      <OPTION VALUE='5114' > ND-LUZ</option>
      <OPTION VALUE='5149' > ND-VALE-TRANSPORTE</option>
      <OPTION VALUE='5136' > ND-ASSISTENCIA MEDICA</option>
      <OPTION VALUE='5118' > ND-TAXAS DE CARTORIO E MULTAS</option>
      <OPTION VALUE='5114' > ND-LUZ</option>
      <OPTION VALUE='5137' > ND-GASTOS DIV. FUNCIONARIOS</option>
      <OPTION VALUE='5131' > ND-CORTESIAS</option>
      <OPTION VALUE='5110' > ND-PRESTAÇÃO DE SERV. PF
      <OPTION VALUE='5138' > ND-PROGRAMA DE ALIMENTAÇÃO PAT</option>
      <OPTION VALUE='5164' > ND - CURSOS TREINAMENTO</option>
      <OPTION VALUE='5134' > ND-PROPAGA NDA E PUBLICIDADE</option>
      <OPTION VALUE='5134' > ND-IMPRESSOS COPIAS E REPREDUÇ</option>
      <OPTION VALUE='5109' > ND-PRESTAÇÃO DE SERV. PJ</option>
      <OPTION VALUE='5122' > ND-MANUTENÇÃO DAS INSTALAÇÕES</option>
      <OPTION VALUE='5144' > ND-SUPRIMENTO DE INFORMATICA</option>
      <OPTION VALUE='5131' > ND-CORTESIAS</option>
      <OPTION VALUE='5105' > ND-VIAGENS E REPRESENTAÇÕES</option>
      <OPTION VALUE='5115' > ND-TELEFONE / INTERNET</option>
      <OPTION VALUE='5127' > ND-MATERIAL DE EXPEDIENTE</option>
      <OPTION VALUE='5108' > ND-FRETES E CARRETOS SIMPLES REMESSA</option>
      <OPTION VALUE='5009' > ND-MENSALIDADES E ASSOCIAÇÕES</option>
      <OPTION VALUE='5008' > ND-MATERIAL DE LIMPEZA</option>
      <OPTION VALUE='5126' > ND-LANCHES E REFEICOES</option>
      <OPTION VALUE='5148' > ND-PROCESSAMENTO DE DADOS SIST</option>
      <OPTION VALUE='5103' > ND-COPA E BAR</option>
      <OPTION VALUE='5118' > ND-TAXAS DE CARTORIO E MULTAS</option>
      <OPTION VALUE= '5114' > ND-LUZ
      <OPTION VALUE='5125' > ND-SUFRAMA</option>
      <OPTION VALUE='5118' > ND-TAXAS DE CARTORIO E MULTAS</option>
      <OPTION VALUE='5108' > ND-FRETES E CARRETOS</option>
      <OPTION VALUE='5119' > ND-MANUT. DE MAQUINAS E EQUIP.</option>
      <OPTION VALUE='51294' > ND-MAT. CONSUMO PEÇAS/SERVIÇO</option>
      <OPTION VALUE='5137' > ND-GASTOS DIV. FUNCIONARIOS</option>
      <OPTION VALUE='5111' > ND-IMPRESSOS COPIAS E REPREDUÇ</option>
      <OPTION VALUE='5159' > ND-OUTROS IMPOSTOS E TAXAS</option>
      <OPTION VALUE='5123' > ND-MATERIAL BENS PERMANENTES</option>
      <OPTION VALUE='5137' > ND-GASTOS DIV. FUNCIONARIOS</option>
      <OPTION VALUE='5163' > ND-PERDAS E PROCESSOS</option>
      <OPTION VALUE='5129' > ND-MAT. CONSUMO PEÇAS/SERVIÇO padrao</option>
      <OPTION VALUE='5006' > ND-SEGUROS</option>
      <OPTION VALUE='5151' > ND-FGTS RESCISÓRIO</option>
      <OPTION VALUE='5184' > ND-LOCAÇÃO DE BENS MÓVEIS</option>
      <OPTION VALUE='5139' > ND-DESPACHANTE</option>
      <OPTION VALUE='5101' > ND-COMISSOES A TERCEIROS</option>
      <OPTION VALUE='5152' > ND-TAXAS SEFAZ/JUNTA</option>
      <OPTION VALUE='5123' > ND-MATERIAL BENS PERMANENTES</option>
      <OPTION VALUE='5215' > ND - OUTRAS DESPESAS</option>
      <OPTION VALUE='5146' > ND-IPVA BAST DRIVE</option>
      <OPTION VALUE='5120' > ND-MANUT. MOVEIS E UTENSILIOS</option>
      <OPTION VALUE='5159' > ND-OUTROS IMPOSTOS E TAXAS</option>
      <OPTION VALUE='5158' > ND-TAXAS PREFEITURA</option>
      <OPTION VALUE='5129' > ND-MAT. CONSUMO PEÇAS/SERVIÇO</option>
      <OPTION VALUE='5151' > ND-FGTS RESCISÓRIO</option>
      <OPTION VALUE='5159' > ND-OUTROS IMPOSTOS E TAXAS</option>
      <OPTION VALUE='5120' > ND-MANUT. MOVEIS E UTENSILIOS</option>
      <OPTION VALUE='5128' > ND-UNIFORMES</option>
      <OPTION VALUE='5119' > ND-MANUT. DE MAQUINAS E EQUIP.</option>
      <OPTION VALUE='5211' > ND - TAXAS PRA ALIENAÇÃO</option>
      <OPTION VALUE='5123' > ND-MATERIAL BENS PERMANENTES</option>
      <OPTION VALUE='5128' > ND-UNIFORMES</option>
      <OPTION VALUE='5119' > ND-MANUT. DE MAQUINAS E EQUIP.</option>
      <OPTION VALUE='5104' > ND-SERVIÇOS POSTAIS</option>
      <OPTION VALUE='5119' > ND-MANUT. DE MAQUINAS E EQUIP.</option>
      <OPTION VALUE='5163' > ND-PERDAS E PROCESSOS</option>
      <OPTION VALUE='5124' > ND-ICMS</option>
      <OPTION VALUE='5005' > ND-IPTU</option>
      <OPTION VALUE='5108' > ND-FRETES E CARRETOS
      <OPTION VALUE='5206'> ND - TREINAMENTO/ VIAGENS/ESTA</option>
      <OPTION VALUE='5010' > ND-ANUIDADES
      <OPTION VALUE='51374' > ND-GASTOS DIV. FUNCIONARIOS 4 </option>
      <OPTION VALUE='5117' > ND-DESPESAS MANUTENÇÃ VEICULOS</option>
      <OPTION VALUE='5005' > ND-IPTU</option>
      <OPTION VALUE=51293 > ND-MAT. CONSUMO PEÇAS/SERVIÇO</option>
      <OPTION VALUE='5106' > ND-CUSTAS JUDICIAIS</option>
      <OPTION VALUE='5131' > ND-CORTESIAS
      <OPTION VALUE='5152' > ND-TAXAS SEFAZ/JUNTA</option>
      <OPTION VALUE='5141' > ND-PATROCINIO</option>
      <OPTION VALUE='5130' > ND-EVENTOS</option>
      <OPTION VALUE='5158' > ND-TAXAS PREFEITURA</option>
      <OPTION VALUE='5211' > ND - TAXAS PRA ALIENAÇÃO</option>
      <OPTION VALUE='5120' > ND-MANUT. MOVEIS E UTENSILIOS</option>
      <OPTION VALUE='5157' > ND-TAXAS SEFAZ/ JUNTA/IEL</option>
      <OPTION VALUE='5146' > ND-IPVA BAST DRIVE</option>
      <OPTION VALUE='5130' > ND-EVENTOS</option>
      <OPTION VALUE='5158' > ND-TAXAS PREFEITURA</option>
      <OPTION VALUE='5217' > ND-PRESTAÇÃO DE SERV. V. PJ</option>
      <OPTION VALUE='5006' > ND-SEGUROS</option>
      <OPTION VALUE='5156' > ND-CORTESIA SEMINOVOS</option>
      <OPTION VALUE='5141' > ND-PATROCINIO</option>
      <OPTION VALUE='5106' > ND-CUSTAS JUDICIAIS</option>
      <OPTION VALUE='5211' > ND - TAXAS PRA ALIENAÇÃO</option>
      <OPTION VALUE='5163' > ND-PERDAS E PROCESSOS</option>
      
          </select>
        </td>
            <td class='border-2 border-[#333333] bg-[#929292] text-[#efefef] py-1 px-8'>
             $obs
            </td>
             <td class=' enviar$id border-2 border-[#333333] bg-[#060505] text-[#efefef] py-1 px-8'>
          <button id ='enviar$id' onclick='send($id)' class=' bg-green-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full'>START</button>
          </td>

            </tr> ";

}







?>