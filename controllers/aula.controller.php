<?php

	class AulaController{

		public static function create(){
			include 'views/aula.create.php';
		}

		public static function request(){
			include 'views/aula.request.php';
		}

		public static function edit(){
			include 'models/aula.model.php';
			$aula = new Aula($_GET);
			$resultado = $aula->find();
			include 'views/aula.update.php';
		}

		public static function save(){
			include 'models/aula.model.php';
			$aula = new Aula($_POST);
			$message = $aula->create();
			include 'views/aula.create.php';
		}

		public static function update(){
			include 'models/aula.model.php';
			$aula = new Aula($_POST);
			$message = $aula->edit();
			include 'views/aula.request.php';
		}

		public static function delete(){
			include 'models/aula.model.php';
			$aula = new Aula($_POST);
			$message = $aula->remove();
			include 'views/aula.request.php';
		}
	}


	/*require_once '../dao/aula.dao.php';

	$materia = $_POST['materia'];
	$turno = $_POST['turno'];
	$cargaHoraria = $_POST['cargaHoraria'];
    $curso = $_POST['curso'];
    $idaula = $_POST['idaula'];
    $nomeaula = $_POST['nomeaula'];
    $dataInicio = $_POST['dataInicio'];
    $dataTermino = $_POST['dataTermino'];
    $diaSemana = $_POST['diaSemana'];
    $horaInicio = $_POST['horaInicio'];
    $horaTermino = $_POST['horaTermino'];
    
    $botao = $_POST['botao'];

	switch ($botao) {
		case 'Cadastrar':
			$message = create($materia, $turno, $cargaHoraria, $curso, $idaula, $dataInicio, $dataTermino, $diaSemana, $horaInicio, $horaTermino);
			break;

		case 'Alterar':
			$idAula = $_POST['idAula'];
			$message = edit($idAula, $materia, $turno, $cargaHoraria, $curso, $idaula, $dataInicio, $dataTermino, $diaSemana, $horaInicio, $horaTermino);
			break;

		case 'Excluir':
			$idAula = $_POST['idAula'];
			$message = remove($idAula);
			break;
	}
	header('Location: ../views/aula.request.php?message='.$message);*/
?>