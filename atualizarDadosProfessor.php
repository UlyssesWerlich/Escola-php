<?php
    include('cabecalho.php');
?>

	<div class='bloco'>
		<div class='titulo'>
			<p>Alterar dados de Professor</p>
		</div>

<?php
	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$cpf = $_POST['cpf'];
	$telefone = $_POST['telefone'];
	$sexo = $_POST['sexo'];
	$dataNascimento = $_POST['dataNascimento'];
	$formacao = $_POST['formacao'];
	$botao = $_POST['botao'];

	if ($botao == 'Cadastrar'){
		try{
			$pdo=new PDO("mysql:host=localhost;dbname=escola","root","password");
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$inserir=$pdo->prepare("Insert into professor(
			nome, endereco, cpf, telefone, sexo, dataNascimento, formacao) 
			Values('$nome', '$endereco', '$cpf', '$telefone', '$sexo', '$dataNascimento', '$formacao');");
		$inserir->execute();
		$pdo = null;
		echo "<p>Professor adicionado com sucesso</p>";

	} elseif ($botao == 'Alterar'){
		$idProfessor = $_POST['idProfessor'];
		try{
			$pdo=new PDO("mysql:host=localhost;dbname=escola","root","password");
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$inserir=$pdo->prepare("update professor set nome='$nome', endereco='$endereco', cpf='$cpf', telefone='$telefone', sexo='$sexo', dataNascimento='$dataNascimento', formacao='$formacao' where idProfessor = '$idProfessor';");
		$inserir->execute();
		$pdo = null;
		echo "<p>Dados de $nome alterados com sucesso</p>";

	} else {
		$idProfessor = $_POST['idProfessor'];
		try {
			$pdo = new PDO("mysql:host=localhost;dbname=escola","root","password");
		} catch (PDOException $e){
			echo $e->getMessage();
		}
		$excluir = $pdo->prepare("delete from professor where idProfessor = '$idProfessor'");
		$excluir->execute();
		$pdo = null;
		echo "<p>Professor excluído com sucesso</p>";
	}


	//ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
?>
	</div>
</body>
</html> 