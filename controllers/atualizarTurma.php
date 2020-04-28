<?php
    require_once '../database/connection.php';
    $message = 4;
    if ((isset($_POST['idAula'])) and (isset($_POST['matriculas']))){
        $idAula = $_POST['idAula'];
        $matriculas = $_POST['matriculas'];

        $excluir = $pdo->prepare("DELETE from turma where idAula = '$idAula'");
        $excluir->execute() or die ("Erro ao deletar lista antiga");

        foreach ($matriculas as $matricula){
            $inserir = $pdo->prepare("INSERT INTO turma(idAula, matricula) values('$idAula', '$matricula')");
            $inserir->execute() or die ("Erro ao atualizar nova lista");
        }
        $pdo = null;
    };
    header('Location: ../views/consultaAula.php?message='.$message);
?>