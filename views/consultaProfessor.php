<!DOCTYPE html>
<html>
    <head>
        <?php include('../partials/header.php') ?>
    </head>
    <body>
        <div class='d-flex'>
        <?php include('../partials/menu.php') ?>

           <div class='container-fluid'>
                <h3 class='mt-3'>Consulta de Professor</h3>

                <form method='POST' action='../controllers/consultaProfessor.php'>
                    <div class='row'>
                        <div class="form-group col-sm-4">
                            <label class="control-label" for='nomeConsulta'>Nome</label>
                            <input type='text' onkeyup='getDados()' class="form-control" size='40' id='nomeConsulta' name='nomeConsulta' placeholder='Escreva aqui o nome para consulta' />
                        </div>
                    </div>
                </form>
                <div>

                    <table class='table' id='resultado'>

                    </table>
<!----------------------------------AJAX--------------------------------------->                    
                    <script src='../ajax/request.js'></script>
                    <script>
                        function getDados(){

                            // Declaração de Variáveis
                            var nome = document.getElementById("nomeConsulta").value;
                            if (nome.length > 2) {

                                var result = document.getElementById("resultado");
                                var xmlreq = CriarRequest();

                                // Iniciar uma requisição
                                xmlreq.open("GET", "../ajax/ajaxProfessor.php?nomeConsulta=" + nome /*+ "&turmaConsulta=" + turma +"&turnoConsulta=" + turno*/, true);

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
    include('../partials/rodape.php');
?>
