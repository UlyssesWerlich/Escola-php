<?php
	class TurmaController{

		public static function edit(){
            if ((isset($_GET['idAula'])) and (isset($_GET['materia'])) and (isset($_GET['curso']))){
                require_once 'models/turma.model.php';
                $idAula = $_GET['idAula'];
                $materia = $_GET['materia'];
                $curso = $_GET['curso'];
                $alunos = toList($idAula);
                include 'views/turma.edit.php';
            } else {
                $message = "Erro ao listar turma.";
                include 'views/aula.request.php';
            }
		}

		public static function update(){
            require_once 'models/turma.model.php';
            if ((isset($_POST['idAula'])) and (isset($_POST['matriculas']))){
                $idAula = $_POST['idAula'];
                $matriculas = $_POST['matriculas'];
        
                $message = updateList($idAula, $matriculas);
                include 'views/aula.request.php';
            };
        }
    }
?>