<?php
	$titulo = 'Aula';
    include('../partials/cabecalho.php');

	$materia = $_POST['materia'];
	$turno = $_POST['turno'];
	$cargaHoraria = $_POST['cargaHoraria'];
    $curso = $_POST['curso'];
    $idProfessor = $_POST['idProfessor'];
    $nomeProfessor = $_POST['nomeProfessor'];
    $dataInicio = $_POST['dataInicio'];
    $dataTermino = $_POST['dataTermino'];
    $diaSemana = $_POST['diaSemana'];
    $horaInicio = $_POST['horaInicio'];
    $horaTermino = $_POST['horaTermino'];
    
    $botao = $_POST['botao'];
  
	try{
		$pdo=new PDO("mysql:host=localhost;dbname=escola","root","password");
	}catch(PDOException $e){
		echo $e->getMessage();
	}

	switch ($botao) {
		case 'Cadastrar':
			$inserir=$pdo->prepare(
                "INSERT into aula(materia, turno, cargaHoraria, curso, idProfessor, dataInicio, 
                                dataTermino, diaSemana, horaInicio, horaTermino) 
                        VALUES('$materia', '$turno', '$cargaHoraria', '$curso', '$idProfessor', '$dataInicio', 
								'$dataTermino', '$diaSemana', '$horaInicio', '$horaTermino');");

			$inserir->execute() or die ("Erro ao cadastrar aula, campos não preenchidos corretamente");
			$pdo = null;
			echo "<p>Aula adicionado com sucesso</p>";
			break;

		case 'Alterar':
			$idAula = $_POST['idAula'];
			$alterar=$pdo->prepare(
                "UPDATE aula set materia='$materia', turno='$turno', cargaHoraria='$cargaHoraria', 
                                curso='$curso', idProfessor='$idProfessor', dataInicio='$dataInicio',
                                dataTermino='$dataTermino', diaSemana='$diaSemana', horaInicio='$horaInicio', 
                                horaTermino='$horaTermino'
                            where idAula = '$idAula';");

			$alterar->execute() or die ("Erro ao alterar informações de aula, campos não preenchidos corretamente");
			$pdo = null;
			echo "<p>Dados da aula alterados com sucesso</p>";
			break;

		case 'Excluir':
			$idAula = $_POST['idAula'];
			$excluir = $pdo->prepare("DELETE from aula where idAula = '$idAula'");
			$excluir->execute();
			$pdo = null;
			echo "<p>Aula excluída com sucesso</p>";
			break;
	}
	//ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
?>
				<p><a href='../views/consultaAula.php'>Consultar Aula</a></p>

<?php
    include('../partials/rodape.php');
?>