<?php 

    class Aula {

        private $idAula;
        private $materia;
        private $turno;
        private $cargaHoraria;
        private $curso;
        private $idProfessor;
        private $dataInicio;
        private $dataTermino;
        private $diaSemana;
        private $horaInicio;
        private $horaTermino;

        function __construct($params){
            if (isset($params['idAula'])) { $this->idAula = $params['idAula']; }
            if (isset($params['materia'])) { $this->materia = $params['materia']; }
            if (isset($params['turno'])) { $this->turno = $params['turno']; }
            if (isset($params['cargaHoraria'])) { $this->cargaHoraria = $params['cargaHoraria']; }
            if (isset($params['curso'])) { $this->curso = $params['curso']; }
            if (isset($params['idProfessor'])) { $this->idProfessor = $params['idProfessor']; }
            if (isset($params['dataInicio'])) { $this->dataInicio = $params['dataInicio']; }
            if (isset($params['dataTermino'])) { $this->dataTermino = $params['dataTermino']; }
            if (isset($params['diaSemana'])) { $this->diaSemana = $params['diaSemana']; }
            if (isset($params['horaInicio'])) { $this->horaInicio = $params['horaInicio']; }
            if (isset($params['horaTermino'])) { $this->horaTermino = $params['horaTermino']; }
        }

        function create (){
            require_once 'database/connection.php';
            $create = $pdo->prepare(
                    "INSERT into aula(materia, turno, cargaHoraria, curso, idProfessor, dataInicio, 
                                dataTermino, diaSemana, horaInicio, horaTermino) 
                            VALUES('$this->materia', '$this->turno', 
                                '$this->cargaHoraria', '$this->curso', 
                                '$this->idProfessor', '$this->dataInicio', 
                                '$this->dataTermino', '$this->diaSemana', 
                                '$this->horaInicio', '$this->horaTermino');");
            $create->execute() or die ("Erro ao cadastrar aula, campos não preenchidos corretamente");
            $pdo = null;
            return "Aula cadastrada com sucesso";
        }

        function edit (){
            require_once 'database/connection.php';
            $edit = $pdo->prepare(
                "UPDATE aula set materia='$this->materia', turno='$this->turno', 
                                cargaHoraria='$this->cargaHoraria', curso='$this->curso', 
                                idProfessor='$this->idProfessor', dataInicio='$this->dataInicio', 
                                dataTermino='$this->dataTermino', diaSemana='$this->diaSemana', 
                                horaInicio='$this->horaInicio', horaTermino='$this->horaTermino'
                            where idAula = '$this->idAula'");
            $edit->execute() or die ("Erro ao alterar dados de aluno, campos não preenchidos corretamente");
            $pdo = null;
            return "Dados alterados com sucesso";
        }

        function remove(){
            require_once 'database/connection.php';
            $delete = $pdo->prepare("DELETE from aula where idAula = '$this->idAula'");
            $delete->execute();
            $pdo = null;
            return "Aula excluída com sucesso";
        }

        function find(){
            require_once 'database/connection.php';
            $find = $pdo->prepare("SELECT * from aula where idAula = '$this->idAula'");
            $find->execute();
            $result = $find->fetchAll();
            $pdo = null;
            return $result;
        }

        function toList($professorNome){
            require_once '../database/connection.php';
            $toList = $pdo->prepare("SELECT idAula, materia, curso, diaSemana, p.nome as professor, horaInicio, horaTermino
                                            from aula a join professor p on a.idProfessor = p.idProfessor 
                                            where a.materia like '$this->materia%' 
                                                AND a.curso like '$this->curso%' 
                                                AND p.nome like '$professorNome%' 
                                                AND a.diaSemana like '$this->diaSemana' 
                                                AND a.turno like '$this->turno' limit 4;");

            $toList->execute();
            $result = $toList->fetchAll();
            return $result;
        }
    }