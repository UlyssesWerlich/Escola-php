<?php

	$tituloCabecalho = "Alterar dados de aluno";
    include('cabecalho.php');


	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$turma = $_POST['turma'];
	$dataNascimento = $_POST['dataNascimento'];
	$botao = $_POST['botao'];

	if ($botao == 'Cadastrar'){
		$turno = $_POST['turno'];
		try{
			$pdo=new PDO("mysql:host=localhost;dbname=escola","root","password");
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$inserir=$pdo->prepare("Insert into aluno(nome, endereco, turma, turno, dataNascimento) Values('$nome', '$endereco', '$turma', '$turno', '$dataNascimento');");
		$inserir->execute();
		$pdo = null;
		echo "<p>Aluno adicionado com sucesso</p>";

	} elseif ($botao == 'Alterar'){
		$matricula = $_POST['matricula'];
		$turno = $_POST['turno'];
		try{
			$pdo=new PDO("mysql:host=localhost;dbname=escola","root","password");
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$inserir=$pdo->prepare("update aluno set nome='$nome', endereco='$endereco', turma='$turma', turno='$turno', dataNascimento='$dataNascimento' where matricula = $matricula;");
		$inserir->execute();
		$pdo = null;
		echo "<p>Dados de $nome alterados com sucesso</p>";

	} else {
		$matricula = $_POST['matricula'];
		try {
			$pdo = new PDO("mysql:host=localhost;dbname=escola","root","password");
		} catch (PDOException $e){
			echo $e->getMessage();
		}
		$excluir = $pdo->prepare("delete from aluno where matricula = '$matricula'");
		$excluir->execute();
		$pdo = null;
		echo "<p>Aluno excluído com sucesso</p>";
	}


	//ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
?>
</body>
</html> 