<?php
class Report
{
  public $dados;

  public function tableanalitico($dados){
    foreach ($dados as $val){
		$cliente =$val[0];
		$grupo = $val[1];
		$categoria = $val[2];
      $revenda = $val[3];
      $fatoperacao = $val[4];
      $condicao=$val[5];
      $datanota = new DateTime($val[6]);
      $datanota= date_format($datanota,"d/m/Y ");
      $fabrica = $val[7];
      $itemestoque= $val[8];
      $codigopublico= $val[9];
      $descricaoitem=$val[10];
      $precopublico=$val[11];
      $itempelaquantidade=$val[12];
      $numeronota=$val[13];
      $operacao= $val[14];
      $descondicao= $val[15];
      $tipotransacao= $val[16];
      $codfiscal= $val[17];
      $vendedor=  $val[18];
      $classabc=$val[19];
      $marca = $val[20];
      $quantidade= $val[21];
	
      $valtotalnota= $val[22];
      $valtotalnota = number_format($valtotalnota,2,",",".");
      $customedio=$val[23];
      $customedio1 = $customedio/$quantidade;
      if ($itempelaquantidade!=0){

      
  
      $rentabilidade =(($itempelaquantidade - $customedio1)/$itempelaquantidade*100);
      $customedio = number_format($customedio,2,",",".");
      $itempelaquantidade = number_format($itempelaquantidade,2,",",".");
      }else{
        $rentabilidade=0;
      }
  
   
    echo "
    <tr > 
	 <td class='text-center'>".$grupo."</td>
	  <td class='text-center'>".$categoria."</td>
      <td class='text-center'>".$codigopublico."</td>
      <td class='text-center' > ".$fabrica."</td>
      <td class='text-center' >".$descricaoitem." </td>
      <td class='text-center' >".$marca."</td>
  
      <td class='text-center' >".$numeronota."</td>
      <td class='text-center' >".$tipotransacao."</td>
      <td class='text-center' >".$datanota."</td>
      <td class='text-center' >".$condicao."</td>
      <td class='text-center' >".$descondicao."</td>
      <td class='text-center' >".$revenda."</td>
      <td class='text-center' >".$vendedor."</td>
	   <td class='text-center' >".$cliente."</td>
      <td class='text-center' >".$quantidade."</td>
      <td class='text-center' >".$itempelaquantidade."</td>
      <td class='text-center' >".$valtotalnota."</td>
      <td class='text-center' >".number_format($rentabilidade)."%</td>
      <td class='text-center'>".$customedio." </td>
     
  
     
    </tr>";
    
  }
  }

  public function valorescondicoes($dados)
  {
    foreach ($dados as $data){
      // $y =$data[1]+$data[2]+$data[3]+$data[4];
       $time= $data[0];
     // // $time= date_format($time,"d/m/Y");
     
       if($data[2]==''){
         $data[2]=0;
       }
       if($data[3]==''){
         $data[3]=0;
       }
      if($data[4]==''){
         $data[4]=0;
        }
        if($data[5]==''){
          $data[5]=0;
        }
     // //var_dump($data);
        echo " {
          name: '".$data[1]."',
          id: '".$time."',
          data: [
            [
             'Revenda1',
              ".$data[2]."
            ],
            [
              'Revenda2',
             ".$data[3]."
            ],
            [
              'Revenda3',
              ".$data[4]."
     
            ], [
     
              'Revenda4',
              ".$data[5]."
            ]
         ]
        },";
      }
  }

  public function somatoriodiariorevenda($dados, $revenda)
  {
    switch ($revenda) {
      case 1:
        $number = 1;
        break;
      case 2:
        $number = 3;
        break;
      case 3:
        $number = 5;
        break;
      case 4:
        $number = 7;
    }
    foreach ($dados as $data) {
      if ($data[$number] == '') {
        $data[$number] = 0;
      } else {
        $data[$number] = floatval($data[$number]) - floatval($data[$number + 1]);
        $data[$number] = floatval($data[$number]);
      }
      echo $data[$number] . ",";
    }
    echo "null";
  }

  public function somatoriodiariovendadata($dados)
  {
    foreach ($dados as $data) {
      $dta = new DateTime($data[0]);
      //var_dump($dta);
      $dta = date_format($dta, "d-m-Y");

      echo "'" . $dta . "',";
    }
    echo "null";
  }

  public function graficolinhavendedor($dados)
  {
    foreach ($dados as $data) {
      $revenda = escolherrevenda($data[0]);

      echo "{
name: '" . $data[1] . "(" . $revenda . ")',
low: " . ($data[4] - $data[5]) . "
},";
    }
  }

  public function condicoes($dados)
  {
    foreach ($dados as $data){
      $y =$data[2]+$data[3]+$data[4]+$data[5];

// $dta= new DateTime($data[1]);
//var_dump($dta);
// $dta= date_format($dta,"d-m-Y");

echo "{
name: '".$data[1]."',
y: ".$y.",
drilldown: '".$data[0]."'

},";
}

  }




  public function echotablevendedores($dados)
  {
    foreach ($dados as $val) {
      //var_dump($val);
      // die;


      $revenda = $val[0];
      $tipotransacao = $val[1];

      $tiponf = $val[2];
      $tiponfos = $val[3];
      $numeronotafiscal = $val[4];
      $cliente = $val[5];
      $vendedor = $val[6];
      $fatoperacao = $val[7];
      $condicaopgto = $val[8];
      $somatorionotafiscal =  number_format($val[9], 2, ",", ".");
      $somatorioimposto = number_format($val[10], 2, ",", ".");
      $lucrobruto = number_format($val[13], 2, ",", ".");
      $percent = number_format($val[14], 2, ",", ".");
      echo "
         
     
                     <tr>
                     <td>" . $revenda . "</td>
                     <td>" . $tiponf . "</td>
                     <td>" . $numeronotafiscal . "</td>
                     <td>" . $cliente . "</td>
                     <td>" . $vendedor . "</td>
                     <td>" . $condicaopgto . "</td>
                     <td>" . $somatorionotafiscal . "</td>
                     <td>" . $somatorioimposto . "</td>
                     <td>" . $lucrobruto . "</td>
                     <td>" . $percent . " %</td>
                     </tr>";
    }
  }


  public function echoliquidado($dados)
  {

    $acumulativo = 0;
    $pcac = 0;

    foreach ($dados  as $val) {
      //var_dump($val);




      $nomecliente = $val[0];
      $origem = $val[1];
      $desorigem = $val[2];
      $valtitulo = $val[3];
      $totalpago = $val[4];
      $titulo = $val[5];
      $duplicata = $val[6];
      $contagemtitulos = $val[7];
      $dataemissao = new DateTime($val[8]);
      $dataemissao = date_format($dataemissao, "d/m/Y");

      $dtadevencimento = new DateTime($val[9]);
      $dtadevencimento = date_format($dtadevencimento, "d/m/Y");
      $dtapgto = new DateTime($val[10]);
      $dtapgto = date_format($dtapgto, "d/m/Y");
      $revenda = escolherrevenda($val[11]);
      $status = $val[12];

      $acumulativo += $totalpago;




      if ($status == 'PT') {


        $valtitulo = number_format($valtitulo, 2, ",", ".");
        $pcrel = number_format(100, 2, ",", ".");



        echo "
  <tr > 
  
 
    <td class='text-center'>" . $nomecliente . "</td>
    <td class='text-center' > " . $desorigem . "</td>
    <td class='text-center' >" . $valtitulo . " </td>
    <td class='text-center' >" . $totalpago . " </td>
   
   
    <td class='text-center' >" . $titulo . "</td>
    <td class='text-center' >" . $duplicata . "/" . $contagemtitulos . "</td>
    <td class='text-center' >" . $dataemissao . "</td>
    <td class='text-center' >" . $dtadevencimento . "</td>
    <td class='text-center' >" . $dtapgto . "</td>
    <td class='text-center'>" . $revenda . "</td>
    <td class='text-center'>" . $status . "</td>
  
   

   
  </tr>";
      } else {

        // $acumulativo += $totalpago;
        //   $pcrel = percent($valtitulo, $totalpago);
        //  $pcac += $pcrel;
        $saldo = $valtitulo - $totalpago;


        $saldo = number_format($saldo, 2, ",", ".");
        $valtitulo = number_format($valtitulo, 2, ",", ".");
        $pcrel = number_format(100, 2, ",", ".");

        echo "
    <tr > 
 
      <td class='text-center'>" . $nomecliente . "</td>
      <td class='text-center' > " . $desorigem . "</td>
      <td class='text-center' >" . $saldo . " </td>
      <td class='text-center' >" . $totalpago . " </td>
    
     
  
      <td class='text-center' >" . $titulo . "</td>
      <td class='text-center' >" . $duplicata . "/" . $contagemtitulos . "</td>
      <td class='text-center' >" . $dataemissao . "</td>
      <td class='text-center' >" . $dtadevencimento . "</td>
      <td class='text-center' >" . $dtapgto . "</td>
      <td class='text-center'>" . $revenda . "</td>
      <td class='text-center'>" . $status . "</td>
  
      
      </tr>";
      }
    }
    $cem = number_format(100, 2, ",", ".");
    $acumulativo = number_format($acumulativo, 2, ",", ".");
    echo "
    <tr > 
 
    <td class='text-center' > total</td>
      <td class='text-center' > total</td>
      <td class='text-center' >" . $acumulativo . " </td>
      <td class='text-center' >" . $acumulativo . " </td>
    
      <td class='text-center' > " . $acumulativo . "</td>
      <td class='text-center' > total</td>
      <td class='text-center' > total</td>

      <td class='text-center' > " . $dataemissao . "</td>

   
      
      <td class='text-center' > " . $dtadevencimento . "</td>
      
      <td class='text-center' > MATRIZ - 1</td>
      
      <td class='text-center' > EM</td>

  
      
      </tr>";
  }

  public function echoliquidaorigem($dados, $revenda)
  {
    $pcac = 0;
    $acumulativo = 0;
    foreach ($dados as $val) {
      // var_dump($val);
      //die();




      $nomeorigem = $val[0];

      $codorigem = $val[1];
      $somarevenda1 = $val[2];
      $somarevenda2 = $val[3];
      $somarevenda3 = $val[4];
      $somarevenda4 = $val[5];
      $totalorigem = $somarevenda1 + $somarevenda2 + $somarevenda3 + $somarevenda4;
      $acumulativo += $totalorigem;
      $total = $val[6];



      $pcrel = percent($totalorigem, $total);
      $pcac += $pcrel;
      $totalorigem = number_format($totalorigem, 2, ",", ".");

      $pcrel = number_format($pcrel, 2, ",", ".");


      //  var_dump($dataemissao);
      // $dataemissao= strtotime($dataemissao);


      // $dataemissao1 = DateTime::createFromFormat("d-m-Y", $dataemissao);
      //var_dump($dataemissao1);
      // $dataemissao1= 
      //     $tipotransacao= $val[13];
      //     $codfiscal= $val[14];
      //     $vendedor=  $val[15];
      //     $classabc=$val[16];
      //     $marca = $val[17];
      //     $quantidade= $val[18];
      //     $valtotalnota= $val[19];
      //     $customedio=$val[20];

      // $rentabilidade =$itempelaquantidade 

      echo "
  <tr > 
  
 
    <td class='text-center'>" . $nomeorigem . "</td>
    <td class='text-center' > " . $totalorigem . "</td>
    <td class='text-center' >" . $pcrel . " %</td>

  
   

   
  </tr>";
    }


    //$somatotal = number_format($somatotal,2,",",".");
    $cem = number_format(100, 2, ",", ".");
    $acumulativo = number_format($acumulativo, 2, ",", ".");
    echo "
    <tr > 
 
    <td class='text-center' > total</td>
      <td class='text-center' > " . $acumulativo . "</td>
      <td class='text-center' >" . $cem . " % </td>
    
      
      </tr>";
  }


  public function echomapeamento($dados)
  {
    foreach ($dados as $val) {
	$grupo = $val[0];
	$categoria = $val[1];
      $desitemestoque = $val[2];
      $itemestoque = $val[3];
      $codigopublico = $val[4];
      $codigodefabrica = $val[5];
      $marca = $val[6];
      $utilizacao_item = $val[7];
      $precopublico = $val[8];
      $qtdvendar1 = $val[9];
      $qtdvendar2 = $val[10];
      $qtdvendar3 = $val[11];
      $qtdvendar4 = $val[12];
      $qtdcontabilr1 = $val[13];
      $qtdcontabilr2 = $val[14];
      $qtdcontabilr3 = $val[15];
      $qtdcontabilr4 = $val[16];
      $precodecusto =  $val[17];
      $ultimanf =  $val[18];
      $cliente = $val[19];
      $revenda = $val[20];
      $classabc = $val[21];
      $pedidos = '0';
      echo "
          <tr > 
		  <td class='text-center'>" . $grupo . "</td>
		  <td class='text-center'>" . $categoria . "</td>
            <td class='text-center'>" . $codigodefabrica . "</td>
			 <td class='text-center'>" . $codigopublico . "</td>
			
            <td class='text-center' > " . $desitemestoque . "</td>
            <td class='text-center' >" . $utilizacao_item . " </td>
            <td class='text-center' >" . $marca . "</td>
            <td class='text-center' >" . $qtdcontabilr1 . "</td>
            <td class='text-center' >" .  $qtdvendar1 . "</td>
            <td class='text-center' >" . $qtdcontabilr2 . "</td>
			  <td class='text-center' >" . $qtdvendar2 . "</td>
            <td class='text-center' >" . $qtdcontabilr3 . "</td>
		 <td class='text-center' >" . $qtdvendar3 . "</td>
             <td class='text-center' >" . $qtdcontabilr4. "</td>
		 <td class='text-center' >" . $qtdvendar4 . "</td>
            <td class='text-center' >" . $qtdcontabilr1 + $qtdcontabilr2 + $qtdcontabilr3 + $qtdcontabilr4 . "</td>
            <td class='text-center' >" . $qtdvendar1 + $qtdvendar2 + $qtdvendar3 + $qtdvendar4 . "</td>
       
        
            <td class='text-center'>
            " . $pedidos . "
            
              </td>
              <td class='text-center' >
              " . $classabc . "
              
                </td>
                <td class='text-center' >
                
                
                  </td>
        
           
          </tr>";
    }
  }
}
