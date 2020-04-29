<?php
    function toList($idAula){
        require_once '../database/connection.php';
        $consulta = $pdo->prepare("SELECT t.matricula as matricula, a.nome as nome from turma t join aluno a on t.matricula = a.matricula 
                                        where idAula = '$idAula'");
        $consulta->execute();
        $alunos = $consulta->fetchAll();
        $pdo = null;
        return $alunos;
    }

    function updateList($idAula, $matriculas){
        require_once '../database/connection.php';
        $delete = $pdo->prepare("DELETE from turma where idAula = '$idAula'");
        $delete->execute() or die ("Erro ao deletar lista antiga");

        foreach ($matriculas as $matricula){
            $insert = $pdo->prepare("INSERT INTO turma(idAula, matricula) values('$idAula', '$matricula')");
            $insert->execute() or die ("Erro ao atualizar nova lista");
        }
        $pdo = null;
        return 3;
    }