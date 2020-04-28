<?php 

    function create ($materia, $turno, $cargaHoraria, $curso, $idProfessor, $dataInicio, $dataTermino, $diaSemana, $horaInicio, $horaTermino){
        require_once '../database/connection.php';
        $create = $pdo->prepare(
            "INSERT into aula(materia, turno, cargaHoraria, curso, idProfessor, dataInicio, 
                            dataTermino, diaSemana, horaInicio, horaTermino) 
                    VALUES('$materia', '$turno', '$cargaHoraria', '$curso', '$idProfessor', '$dataInicio', 
                            '$dataTermino', '$diaSemana', '$horaInicio', '$horaTermino');");
        $create->execute() or die ("Erro ao cadastrar aula, campos não preenchidos corretamente");
        $pdo = null;
        return 0;
    }

    function edit ($idAula, $materia, $turno, $cargaHoraria, $curso, $idProfessor, $dataInicio, $dataTermino, $diaSemana, $horaInicio, $horaTermino){
        require_once '../database/connection.php';
        $edit = $pdo->prepare(
            "UPDATE aula set materia='$materia', turno='$turno', cargaHoraria='$cargaHoraria', 
                            curso='$curso', idProfessor='$idProfessor', dataInicio='$dataInicio',
                            dataTermino='$dataTermino', diaSemana='$diaSemana', horaInicio='$horaInicio', 
                            horaTermino='$horaTermino'
                        where idAula = '$idAula';");
        $edit->execute() or die ("Erro ao alterar dados de aluno, campos não preenchidos corretamente");
        $pdo = null;
        return 1;
    }

    function remove($idAula){
        require_once '../database/connection.php';
        $delete = $pdo->prepare("DELETE from aula where idAula = '$idAula'");
        $delete->execute();
        $pdo = null;
        return 2;
    }

    function find($idAula){
        require_once '../database/connection.php';
        $find = $pdo->prepare("SELECT * from aula where idAula = '$idAula'");
        $find->execute();
        $result = $find->fetchAll();
        $pdo = null;
        return $result;
    }

    function toList($materiaConsulta, $cursoConsulta, $professorConsulta, $diaSemana, $turno){
        require_once '../database/connection.php';
        $toList = $pdo->prepare("SELECT idAula, materia, curso, diaSemana, p.nome as professor, horaInicio, horaTermino
                                        from aula a join professor p on a.idProfessor = p.idProfessor 
                                        where a.materia like '$materiaConsulta%' 
                                            AND a.curso like '$cursoConsulta%' 
                                            AND p.nome like '$professorConsulta%' 
                                            AND a.diaSemana like '$diaSemana' 
                                            AND a.turno like '$turno' limit 4;");

        $toList->execute();
        $result = $toList->fetchAll();
        return $result;
    }