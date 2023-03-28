<?php
	//recebemos nosso par�metro vindo do form
	$parametro = isset($_POST['pesquisaCliente']) ? $_POST['pesquisaCliente'] : null;
	$msg = "";
	//come�amos a concatenar nossa tabela

				
				//requerimos a classe de conex�o
				require_once('class/Conexao.class.php');
					try {
						$pdo = new Conexao(); 
						$resultado = $pdo->select("SELECT * FROM cliente WHERE nome LIKE '$parametro%' ORDER BY nome ASC");
						$pdo->desconectar();
								
						}catch (PDOException $e){
							echo $e->getMessage();
						}	
						//resgata os dados na tabela
						if(count($resultado)){
							
							foreach ($resultado as $res) {

	
	$msg .="'".$res['nome']."',";


								
							}
							$msg.= "'zero',";	
							
						}else{
							$msg = "";
							$msg .="Nenhum resultado foi encontrado...";
						}
				
	//retorna a msg concatenada
	echo $msg;
?>