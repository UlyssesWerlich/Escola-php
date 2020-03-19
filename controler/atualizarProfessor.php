<?php
	$titulo = "Alterar dados de Professor";
    include('../partials/cabecalho.php');

	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$cpf = $_POST['cpf'];
	$telefone = $_POST['telefone'];
	$sexo = $_POST['sexo'];
	$dataNascimento = $_POST['dataNascimento'];
	$formacao = $_POST['formacao'];
	$botao = $_POST['botao'];

	try{
		$pdo=new PDO("mysql:host=localhost;dbname=escola","root","password");
	}catch(PDOException $e){
		echo $e->getMessage();
	}

	switch ($botao) {
		case 'Cadastrar':
			$inserir=$pdo->prepare("Insert into professor(
				nome, endereco, cpf, telefone, sexo, dataNascimento, formacao) 
				Values('$nome', '$endereco', '$cpf', '$telefone', '$sexo', '$dataNascimento', '$formacao');");
			$inserir->execute() or die ("Erro ao cadastrar professor, campos não preenchidos corretamente");
			$pdo = null;
			echo "<p>Professor adicionado com sucesso</p>";
			break;

		case 'Alterar':
			$idProfessor = $_POST['idProfessor'];
			$inserir=$pdo->prepare("update professor set nome='$nome', endereco='$endereco', cpf='$cpf', telefone='$telefone', sexo='$sexo', dataNascimento='$dataNascimento', formacao='$formacao' where idProfessor = '$idProfessor';");
			$inserir->execute() or die ("Erro ao alterar dados de professor, campos não preenchidos corretamente");
			$pdo = null;
			echo "<p>Dados de $nome alterados com sucesso</p>";
			break;

		case 'Excluir':
			$idProfessor = $_POST['idProfessor'];
			$excluir = $pdo->prepare("delete from professor where idProfessor = '$idProfessor'");
			$excluir->execute();
			$pdo = null;
			echo "<p>Professor excluído com sucesso</p>";
			break;
	}

	//ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
?>
				<p><a href='../views/consultaProfessor.php'>Consultar Professor</a></p>

<?php
    include('../partials/rodape.php');
?>