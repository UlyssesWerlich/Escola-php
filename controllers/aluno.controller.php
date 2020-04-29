<?php
	require_once '../dao/aluno.dao.php';
	
	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$turma = $_POST['turma'];
	$dataNascimento = $_POST['dataNascimento'];
	$botao = $_POST['botao'];
	$message = null;

	switch ($botao) {
		case 'Cadastrar':
			$turno = $_POST['turno'];
			$message = create($nome, $endereco, $turma, $turno, $dataNascimento);;
			break;

		case 'Alterar':
			$matricula = $_POST['matricula'];
			$turno = $_POST['turno'];
			$message = edit($nome, $endereco, $turma, $turno, $dataNascimento, $matricula);
			break;

		case 'Excluir':
			$matricula = $_POST['matricula'];
			$message = remove($matricula);;
			break;
	} 

	header('Location: ../views/aluno.request.php?message='.$message);
?>