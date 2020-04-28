<?php
	require_once '../dao/aula.dao.php';

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

	switch ($botao) {
		case 'Cadastrar':
			$message = create($materia, $turno, $cargaHoraria, $curso, $idProfessor, $dataInicio, $dataTermino, $diaSemana, $horaInicio, $horaTermino);
			break;

		case 'Alterar':
			$idAula = $_POST['idAula'];
			$message = edit($idAula, $materia, $turno, $cargaHoraria, $curso, $idProfessor, $dataInicio, $dataTermino, $diaSemana, $horaInicio, $horaTermino);
			break;

		case 'Excluir':
			$idAula = $_POST['idAula'];
			$message = remove($idAula);
			break;
	}
	header('Location: ../views/consultaAula.php?message='.$message);
?>