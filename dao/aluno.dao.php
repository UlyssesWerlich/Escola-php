<?php 

    function create ($nome, $endereco, $turma, $turno, $dataNascimento){
        require_once '../database/connection.php';
        $create=$pdo->prepare("INSERT into aluno(nome, endereco, turma, turno, dataNascimento) Values('$nome', '$endereco', '$turma', '$turno', '$dataNascimento');");
        $create->execute() or die ("Erro ao cadastrar aluno, campos não preenchidos corretamente");
        $pdo = null;
        return 0;
    }

    function edit ($nome, $endereco, $turma, $turno, $dataNascimento, $matricula){
        require_once '../database/connection.php';
        $edit=$pdo->prepare("update aluno set nome='$nome', endereco='$endereco', turma='$turma', turno='$turno', dataNascimento='$dataNascimento' where matricula = $matricula;");
        $edit->execute() or die ("Erro ao alterar dados de aluno, campos não preenchidos corretamente");
        $pdo = null;
        return 1;
    }

    function remove($matricula){
        require_once '../database/connection.php';
        $remove = $pdo->prepare("delete from aluno where matricula = '$matricula'");
        $remove->execute();
        $pdo = null;
        return 2;
    }

    function find($matricula){
        require_once '../database/connection.php';
        $find = $pdo->prepare("select * from aluno where matricula = '$matricula'");
        $find->execute();
        $result = $find->fetchAll();
        $pdo = null;
        return $result;
    }

    function toList($nomeConsulta, $turmaConsulta, $turnoConsulta){
        require_once '../database/connection.php';
        $toList=$pdo->prepare("SELECT * from aluno 
                                        where nome like '$nomeConsulta%' 
                                            AND turma LIKE '$turmaConsulta%' 
                                            AND turno LIKE '$turnoConsulta' ;");
        $toList->execute();
        $result = $toList->fetchAll();
        return $result;
    }

    function findByName($valorConsulta){
        require_once '../database/connection.php';
        $findByName=$pdo->prepare("SELECT * from aluno 
                                            where (matricula like '$valorConsulta') 
                                                    OR ( nome LIKE '$valorConsulta%') limit 1;");
        $findByName->execute();
        $result = $findByName->fetchAll();
        return $result;
    }