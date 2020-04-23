<!DOCTYPE html>
<html>
    <head>
        <?php include('../partials/header.php') ?>
    </head>
    <body>
        <div class='d-flex'>
        <?php include('../partials/menu.php') ?>

           <div class='container-fluid'>
                <h3 class='mt-3'>Atualizar Turma</h3>

<?php
    if ((isset($_GET['idAula'])) and (isset($_GET['materia'])) and (isset($_GET['curso']))){

        $idAula = $_GET['idAula'];
        $materia = $_GET['materia'];
        $curso = $_GET['curso'];
?>
                <br/>
                <h5>Consulta de Aluno</h5>
                <form>
                    <table class='table'>
                        <tr>
                            <td><input type='text' size='1' placeholder='Consulta por nome ou matrícula' onkeyup='getDados()' class="form-control" id='valorConsulta' name='valorConsulta' /></td>
                            <td>Matrícula</td>
                            <td>Nome</td>
                        </tr>
                        <tbody id='resultado'>
                            <tr><td>-</td><td> </td><td> </td></tr>
                        </tbody>
                    </table>
                </form>
                <br/>

                <h5>Lista de Alunos cadastrados na Aula</h5>
                <form class="form-horizontal" name="form" method="POST" action="../controllers/atualizarTurma.php">
                    <input type='hidden' name='idAula' value='<?php echo $idAula ?>'/>
                    <table class='table' id='listaAlunos'>
                        <tr>
                            <td><input type="submit" class="btn btn-success" name="botao" value="Cadastrar Turma"/></td>
                            <td>Matrícula</td>
                            <td>Nome</td>
                        </tr>
<?php
            try {
                $pdo=new PDO("mysql:host=localhost;dbname=escola","root","password");
            } catch (PDOException $e){
                echo $e->getMessage();
            }
            $consulta = $pdo->prepare("SELECT t.matricula as matricula, a.nome as nome from turma t join aluno a on t.matricula = a.matricula 
                                            where idAula = '$idAula'");
            $consulta->execute();
            $alunos = $consulta->fetchAll();
            foreach ($alunos as $aluno){ ?>

                <tr>
                    <td><button class='btn btn-danger' onclick='removerLinha(this)'>Remover</button></td>
                    <td><?php echo $aluno['matricula'] ?><input type='hidden' name='matriculas[]' value='<?php echo $aluno['matricula'] ?>'/></td>
                    <td><?php echo $aluno['nome'] ?></td>
                </tr>
            <?php
            
            }
            $pdo=null;

?>
                    </table>
                </form>

    <!----------------------------------AJAX + FUNÇÕES JAVASCRIPT--------------------------------------->                    
                <script src='../ajax/request.js'></script>
                <script>
                    function getDados(){
                        // Declaração de Variáveis
                        var valor = document.getElementById("valorConsulta").value;
                        if (valor.length > 2) {
                            var resultado = document.getElementById("resultado");
                            var xmlreq = CriarRequest();
                            // Iniciar uma requisição
                            xmlreq.open("GET", "../ajax/ajaxAulaAluno.php?valorConsulta=" + valor, true);

                            // Atribui uma função para ser executada sempre que houver uma mudança de ado
                            xmlreq.onreadystatechange = function(){

                                // Verifica se o arquivo foi encontrado com sucesso
                                if (xmlreq.status == 200){
                                    resultado.innerHTML = xmlreq.responseText;
                                } else {
                                    resultado.innerHTML = "Erro: " + xmlreq.statusText;
                                }
                            };
                            xmlreq.send(null);
                        } else {
                            document.getElementById("resultado").innerHTML = '';
                        }
                    }

                    function adicionarAluno(matricula, aluno){
                        var linha = document.createElement('tr');
                        linha.insertCell(0).innerHTML = "<button class='btn btn-danger' onclick='removerLinha(this)'>Remover</button>";
                        linha.insertCell(1).innerHTML = matricula + "<input type='hidden' name='matriculas[]' value='" + matricula + "'/>";
                        linha.insertCell(2).innerHTML = aluno;
                        document.getElementById('listaAlunos').appendChild(linha);
                        return false;
                    }

                    function removerLinha(linha){
                        var i=linha.parentNode.parentNode.rowIndex;
                        document.getElementById('listaAlunos').deleteRow(i);
                    }
                </script>
<?php
    } else {
?>
        <h5>Erro ao cadastrar turma, favor retornar a página</h5>
<?php
    }
    include('../partials/rodape.php');
?>