<?php 
Class Xray{
    public $revenda;
    public $dados;
    public function generalstock($dados){
        

        foreach($dados as $data){

            // var_dump($data);
 
           $percent = percent ($data[2],$data[4]);
             echo"
             <tr>
                
                    <td style= 'text-align: center;'>".  $data[0]."
                    
                    </td>
                    <td style= 'text-align: center;'> 
                  ".  number_format($data[1],2,",",".")."
                    </td>
                    <td style= 'text-align: center;'>
                    ".  number_format($data[2],2,",",".")." </td>
                    <td style= 'text-align: center;'>
                    ".  number_format($data[3],2,",",".")." </td>
                    <td style= 'text-align: center;'>
                    ".$percent ."% </td>
 
                    </tr>
                 
             ";}
    }

}


?>