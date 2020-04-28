<?php 

    function create ($nome, $endereco, $cpf, $telefone, $sexo, $dataNascimento, $formacao){
        require_once '../database/connection.php';
        $create = $pdo->prepare("Insert into professor(
            nome, endereco, cpf, telefone, sexo, dataNascimento, formacao) 
            Values('$nome', '$endereco', '$cpf', '$telefone', '$sexo', '$dataNascimento', '$formacao');");
        $create->execute() or die ("Erro ao cadastrar professor, campos não preenchidos corretamente");
        $pdo = null;
        return 0;
    }

    function edit ($idProfessor, $nome, $endereco, $cpf, $telefone, $sexo, $dataNascimento, $formacao){
        require_once '../database/connection.php';
        $edit=$pdo->prepare("update professor set nome='$nome', endereco='$endereco', cpf='$cpf', telefone='$telefone', sexo='$sexo', dataNascimento='$dataNascimento', formacao='$formacao' where idProfessor = '$idProfessor';");
        $edit->execute() or die ("Erro ao alterar dados de professor, campos não preenchidos corretamente");
        $pdo = null;
        return 1;
    }

    function remove ($idProfessor){
        require_once '../database/connection.php';
        $remove = $pdo->prepare("delete from professor where idProfessor = '$idProfessor'");
        $remove->execute();
        $pdo = null;
        return 2;
    }

    function find($idProfessor){
        require_once '../database/connection.php';
        $find = $pdo->prepare("SELECT * from professor where idProfessor = '$idProfessor'");
        $find->execute();
        $result = $find->fetchAll();
        $pdo = null;
        return $result;
    }

    function toList($nomeConsulta){
        require_once '../database/connection.php';
        $toList=$pdo->prepare("SELECT idProfessor, nome, endereco, telefone, sexo, dataNascimento 
                                    from professor 
                                            where nome like '$nomeConsulta%';");
        $toList->execute();
        $result = $toList->fetchAll();
        $pdo = null;
        return $result;
    }

    function findByName($nomeConsulta, $idConsulta ){
        require_once '../database/connection.php';
        $nomeConsulta = ((!empty($nomeConsulta))?(" or nome like '$nomeConsulta%' "):(""));
        $idConsulta = $_GET['idConsulta'];
        $findByName = $pdo->prepare("SELECT idProfessor, nome from professor 
                                        where idProfessor = '$idConsulta' $nomeConsulta limit 1;");
        $findByName->execute();
        $result = $findByName->fetchAll();
        $pdo = null;
        return $result;

    }