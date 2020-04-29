<?php
	require_once '../dao/professor.dao.php';

	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$cpf = $_POST['cpf'];
	$telefone = $_POST['telefone'];
	$sexo = $_POST['sexo'];
	$dataNascimento = $_POST['dataNascimento'];
	$formacao = $_POST['formacao'];
	$botao = $_POST['botao'];

	$message = null;

	switch ($botao) {
		case 'Cadastrar':
			$message = create($nome, $endereco, $cpf, $telefone, $sexo, $dataNascimento, $formacao);
			break;

		case 'Alterar':
			$idProfessor = $_POST['idProfessor'];
			$message = edit($idProfessor, $nome, $endereco, $cpf, $telefone, $sexo, $dataNascimento, $formacao);
			break;

		case 'Excluir':
			$idProfessor = $_POST['idProfessor'];
			$message = remove($idProfessor);
			break;
	}

	header('Location: ../views/professor.request.php?message='.$message);
?>