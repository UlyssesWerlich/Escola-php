<?php
	$titulo = 'Alterar dados de Aluno';
    include('../partials/cabecalho.php');

	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$turma = $_POST['turma'];
	$dataNascimento = $_POST['dataNascimento'];
	$botao = $_POST['botao'];

	try{
		$pdo=new PDO("mysql:host=localhost;dbname=escola","root","password");
	}catch(PDOException $e){
		echo $e->getMessage();
	}

	switch ($botao) {
		case 'Cadastrar':
			$turno = $_POST['turno'];
			$inserir=$pdo->prepare("Insert into aluno(nome, endereco, turma, turno, dataNascimento) Values('$nome', '$endereco', '$turma', '$turno', '$dataNascimento');");
			$inserir->execute() or die ("Erro ao cadastrar aluno, campos não preenchidos corretamente");
			$pdo = null;
			echo "<p>Aluno adicionado com sucesso</p>";
			break;

		case 'Alterar':
			$matricula = $_POST['matricula'];
			$turno = $_POST['turno'];
			$inserir=$pdo->prepare("update aluno set nome='$nome', endereco='$endereco', turma='$turma', turno='$turno', dataNascimento='$dataNascimento' where matricula = $matricula;");
			$inserir->execute() or die ("Erro ao alterar dados de aluno, campos não preenchidos corretamente");
			$pdo = null;
			echo "<p>Dados de $nome alterados com sucesso</p>";
			break;

		case 'Excluir':
			$matricula = $_POST['matricula'];
			$excluir = $pdo->prepare("delete from aluno where matricula = '$matricula'");
			$excluir->execute();
			$pdo = null;
			echo "<p>Aluno excluído com sucesso</p>";
			break;
	}
	//ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
?>
				<p><a href='../views/consultaAluno.php'>Consultar Aluno</a></p>

<?php
    include('../partials/rodape.php');
?>