<!DOCTYPE html>
<html>
    <head>
        <?php require 'includes/header.php' ?>
    </head>
    <body>
        <div class='d-flex'>
        <?php require 'includes/menu.php' ?>

           <div class='container-fluid'>
                <h3 class='mt-3'>Atualizar Turma</h3>
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
                <form class="form-horizontal" name="form" method="POST" action="?controller=turma&method=update">
                    <input type='hidden' name='idAula' value='<?php echo $idAula ?>'/>
                    <table class='table' id='listaAlunos'>
                        <tr>
                            <td><input type="submit" class="btn btn-success" name="botao" value="Cadastrar Turma"/></td>
                            <td>Matrícula</td>
                            <td>Nome</td>
                        </tr>
<?php
            foreach ($alunos as $aluno){ 
?>
                <tr>
                    <td><button class='btn btn-danger' onclick='removerLinha(this)'>Remover</button></td>
                    <td><?php echo $aluno['matricula'] ?><input type='hidden' name='matriculas[]' value='<?php echo $aluno['matricula'] ?>'/></td>
                    <td><?php echo $aluno['nome']; ?></td>
                </tr>
<?php } ?>
                    </table>
                </form>

    <!----------------------------------AJAX + FUNÇÕES JAVASCRIPT--------------------------------------->                    
                <script src='../request/request.js'></script>
                <script>
                    function getDados(){
                        var valor = document.getElementById("valorConsulta").value;

                        if (valor.length > 2) {
                            var resultado = document.getElementById("resultado");
                            var xmlreq = CriarRequest();
                            xmlreq.open("GET", "../request/aluno.findByName.php?nome=" + valor, true);
                            xmlreq.onreadystatechange = function(){
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
    require 'includes/footer.php';
?>