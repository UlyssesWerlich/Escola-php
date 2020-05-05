<?php

	class AlunoController{
		
		public static function create(){
			include 'views/aluno.create.php';
		}

		public static function request(){
			include 'views/aluno.request.php';
		}

		public static function edit(){
			include 'models/aluno.model.php';
			$aluno = new Aluno($_GET);
			$resultado = $aluno->find();
			include 'views/aluno.update.php';
		}

		public static function save(){
			include 'models/aluno.model.php';
			$aluno = new Aluno($_POST);
			$message = $aluno->create();
			include 'views/aluno.create.php';
		}

		public static function update(){
			include 'models/aluno.model.php';
			$aluno = new Aluno($_POST);
			$message = $aluno->edit();
			include 'views/aluno.request.php';
		}

		public static function delete(){
			include 'models/aluno.model.php';
			$aluno = new Aluno($_POST);
			$message = $aluno->remove();
			include 'views/aluno.request.php';
		}
	}