<?php 

    class Aluno {

        private $matricula;
        private $nome;
        private $endereco;
        private $turma;
        private $dataNascimento;
        private $turno;

        function __construct($params){
            if (isset($params['matricula'])) { $this->matricula = $params['matricula']; }
            if (isset($params['nome'])) { $this->nome = $params['nome']; }
            if (isset($params['endereco'])) { $this->endereco = $params['endereco']; }
            if (isset($params['turma'])) { $this->turma = $params['turma']; }
            if (isset($params['dataNascimento'])) { $this->dataNascimento = $params['dataNascimento']; }
			if (isset($params['turno'])) { $this->turno = $params['turno']; }
        }

        public function find(){
            require_once 'database/connection.php';
            $find = $pdo->prepare("SELECT * from aluno where matricula = '$this->matricula'");
            $find->execute();
            $result = $find->fetchAll();
            $pdo = null;
            return $result;
        }

        function create (){
            require_once 'database/connection.php';
            $create=$pdo->prepare("INSERT into aluno(nome, endereco, turma, turno, dataNascimento) 
                                        Values('$this->nome', '$this->endereco', 
                                                '$this->turma', '$this->turno', 
                                                '$this->dataNascimento');");
            $create->execute() or die ("Erro ao cadastrar aluno, campos não preenchidos corretamente");
            $pdo = null;
            return "Aluno adicionado com sucesso";
        }

        function edit (){
            require_once 'database/connection.php';
            $edit=$pdo->prepare("UPDATE aluno set nome='$this->nome', endereco='$this->endereco', 
                                                    turma='$this->turma', turno='$this->turno', 
                                                    dataNascimento='$this->dataNascimento' 
                                                        where matricula = $this->matricula;");
            $edit->execute() or die ("Erro ao alterar dados de aluno, campos não preenchidos corretamente");
            $pdo = null;
            return "Dados alterados com sucesso";
        }

        function remove(){
            require_once 'database/connection.php';
            $remove = $pdo->prepare("delete from aluno where matricula = '$this->matricula'");
            $remove->execute();
            $pdo  = null;
            return "Aluno excluído com sucesso";
        }

        function toList(){
            require_once '../database/connection.php';
            $toList=$pdo->prepare("SELECT * from aluno 
                                            where nome like '$this->nome%' 
                                                AND turma LIKE '$this->turma%' 
                                                AND turno LIKE '$this->turno' ;");
            $toList->execute();
            $result = $toList->fetchAll();
            return $result;
        }
    
        function findByName(){
            require_once '../database/connection.php';
            $findByName=$pdo->prepare("SELECT * from aluno 
                                                where (matricula like '$this->nome') 
                                                        OR ( nome LIKE '$this->nome%') limit 1;");
            $findByName->execute();
            $result = $findByName->fetchAll();
            return $result;
        }
    }