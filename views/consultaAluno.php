<!DOCTYPE html>
<html>
    <head>
        <?php include('../includes/header.php') ?>
    </head>
    <body>
        <div class='d-flex'>
        <?php include('../includes/menu.php') ?>

           <div class='container-fluid'>
                <h3 class='mt-3'>Consulta de Aluno</h3>

                <form method='POST' action='../controllers/consultaAluno.php'>
                    <div class='row'>
                        <div class="form-group col-sm-4">
                            <label class="control-label" for='nomeConsulta'>Nome</label>
                            <input type='text' onkeyup='getDados()' class="form-control" size='40' id='nomeConsulta' name='nomeConsulta' placeholder='Escreva aqui o nome para consulta' />
                        </div>
                        <div class='form-group col-sm-2'>
                            <label class="control-label" for='turmaConsulta'>Turma</label>
                            <input type='text' onkeyup='getDados()' class="form-control" id='turmaConsulta' name='turmaConsulta'/>
                        </div>
                        <div class='form-group col-sm-2'>
                            <label class="control-label" for='turnoConsulta'>Turno</label>

                            <select name="turnoConsulta" class="form-control" id="turnoConsulta" onchange='getDados()'>
                                <option value="%"></option>
                                <option value="M">Matutino</option>
                                <option value="V">Vespertino</option>
                                <option value="N">Noturno</option>
                            </select>

                            <!-- <input type='text' onkeyup='getDados()' class="form-control" id='turnoConsulta' name='turnoConsulta'/> -->
                        </div>
                    </div>
                </form>
                <div>
                <table class='table'>
                        <thead>
                            <tr>
                                <td>Matrícula</td>
                                <td>Nome</td>
                                <td>Endereço</td>
                                <td>Turma</td>
                                <td>Turno</td>
                                <td>Data de Nascimento</td>
                            </tr>
                        </thead>
                        <tbody id='resultado'></tbody>
                    </table>
<!----------------------------------AJAX--------------------------------------->                    
                    <script src='../ajax/request.js'></script>
                    <script>
                        function getDados(){
                            var nome = document.getElementById("nomeConsulta").value;
                            var turma = document.getElementById("turmaConsulta").value;
                            var turno = document.getElementById("turnoConsulta").value;

                            if (nome.length > 2 || turma.length > 2 || turno != "%") {

                                var result = document.getElementById("resultado");
                                var xmlreq = CriarRequest();

                                // Iniciar uma requisição
                                xmlreq.open("GET", "../ajax/ajaxAluno.php?nomeConsulta=" + nome + "&turmaConsulta=" + turma +"&turnoConsulta=" + turno, true);

                                // Atribui uma função para ser executada sempre que houver uma mudança de ado
                                xmlreq.onreadystatechange = function(){

                                    // Verifica se o arquivo foi encontrado com sucesso
                                    if (xmlreq.status == 200){
                                        result.innerHTML = xmlreq.responseText;
                                    } else {
                                        result.innerHTML = "Erro: " + xmlreq.statusText;
                                    }
                                };
                                xmlreq.send(null);
                            } else {
                                document.getElementById("resultado").innerHTML = '';
                            }
                        }
                    </script>

<?php
    if (isset($_GET['message'])){ 
        $message = $_GET['message'];
        include('../messages/aluno.message.php');
    }

    include('../includes/rodape.php');
?>
                
                
