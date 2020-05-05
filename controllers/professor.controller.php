<?php

	class ProfessorController{

		public static function create(){
			include 'views/professor.create.php';
		}

		public static function request(){
			include 'views/professor.request.php';
		}

		public static function edit(){
			include 'models/professor.model.php';
			$professor = new Professor($_GET);
			$resultado = $professor->find();
			include 'views/professor.update.php';
		}

		public static function save(){
			include 'models/professor.model.php';
			$professor = new Professor($_POST);
			$message = $professor->create();
			include 'views/professor.create.php';
		}

		public static function update(){
			include 'models/professor.model.php';
			$professor = new Professor($_POST);
			$message = $professor->edit();
			include 'views/professor.request.php';
		}

		public static function delete(){
			include 'models/professor.model.php';
			$professor = new Professor($_POST);
			$message = $professor->remove();
			include 'views/professor.request.php';
		}
	}
?>