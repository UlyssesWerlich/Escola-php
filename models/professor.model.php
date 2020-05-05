<?php 

    class Professor {

        private $idProfessor;
    	private $nome;
        private $endereco;
        private $cpf;
        private $telefone;
        private $sexo;
        private $dataNascimento;
        private $formacao;

        function __construct($params){
            if (isset($params['idProfessor'])) { $this->idProfessor = $params['idProfessor']; }
            if (isset($params['nome'])) { $this->nome = $params['nome']; }
            if (isset($params['endereco'])) { $this->endereco = $params['endereco']; }
            if (isset($params['cpf'])) { $this->cpf = $params['cpf']; }
            if (isset($params['telefone'])) { $this->telefone = $params['telefone']; }
            if (isset($params['sexo'])) { $this->sexo = $params['sexo']; }
            if (isset($params['dataNascimento'])) { $this->dataNascimento = $params['dataNascimento']; }
			if (isset($params['formacao'])) { $this->formacao = $params['formacao']; }
        }

        function create (){
            require_once 'database/connection.php';
            $create = $pdo->prepare("INSERT into professor(
                                            nome, endereco, cpf, telefone, sexo, dataNascimento, formacao) 
                                                    VALUES('$this->nome', '$this->endereco', 
                                                            '$this->cpf', '$this->telefone', 
                                                            '$this->sexo', '$this->dataNascimento', 
                                                            '$this->formacao');");
            $create->execute() or die ("Erro ao cadastrar professor, campos não preenchidos corretamente");
            $pdo = null;
            return "Professor cadastrado com sucesso";
        }

        function edit (){
            require_once 'database/connection.php';
            $edit=$pdo->prepare("UPDATE professor set nome='$this->nome', endereco='$this->endereco', 
                                                        cpf='$this->cpf', telefone='$this->telefone', 
                                                        sexo='$this->sexo', dataNascimento='$this->dataNascimento', 
                                                        formacao='$this->formacao' 
                                                                where idProfessor = '$this->idProfessor';");
            $edit->execute() or die ("Erro ao alterar dados de professor, campos não preenchidos corretamente");
            $pdo = null;
            return "Dados alterados com sucesso";
        }

        function remove (){
            require_once 'database/connection.php';
            $remove = $pdo->prepare("DELETE from professor where idProfessor = '$this->idProfessor'");
            $remove->execute();
            $pdo = null;
            return "Professor excluído com sucesso";
        }

        function find(){
            require_once 'database/connection.php';
            $find = $pdo->prepare("SELECT * from professor where idProfessor = '$this->idProfessor'");
            $find->execute();
            $result = $find->fetchAll();
            $pdo = null;
            return $result;
        }

        function toList(){
            require_once '../database/connection.php';
            $toList=$pdo->prepare("SELECT idProfessor, nome, endereco, telefone, sexo, dataNascimento 
                                        from professor 
                                                where nome like '$this->nome%';");
            $toList->execute();
            $result = $toList->fetchAll();
            $pdo = null;
            return $result;
        }

        function findByName(){
            require_once '../database/connection.php';
            $nomeConsulta = ((!empty($this->nome))?(" or nome like '$this->nome%' "):(""));
            $findByName = $pdo->prepare("SELECT idProfessor, nome from professor 
                                            where idProfessor = '$this->idProfessor' $nomeConsulta limit 1;");
            $findByName->execute();
            $result = $findByName->fetchAll();
            $pdo = null;
            return $result;
        }
    }