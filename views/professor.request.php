<!DOCTYPE html>
<html>
    <head>
        <?php include('../includes/header.php') ?>
    </head>
    <body>
        <div class='d-flex'>
        <?php include('../includes/menu.php') ?>

           <div class='container-fluid'>
                <h3 class='mt-3'>Consulta de Professor</h3>

                <form method='POST'>
                    <div class='row'>
                        <div class="form-group col-sm-4">
                            <label class="control-label" for='nomeConsulta'>Nome</label>
                            <input type='text' onkeyup='getDados()' class="form-control" size='40' id='nomeConsulta' name='nomeConsulta' placeholder='Escreva aqui o nome para consulta' />
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
                                <td>Telefone</td>
                                <td>Sexo</td>
                                <td>Data de Nascimento</td>
                            </tr>
                        </thead>
                        <tbody id='resultado'></tbody>
                    </table>
<!----------------------------------AJAX--------------------------------------->                    
                    <script src='../request/request.js'></script>
                    <script>
                        function getDados(){

                            // Declaração de Variáveis
                            var nome = document.getElementById("nomeConsulta").value;
                            if (nome.length > 2) {

                                var result = document.getElementById("resultado");
                                var xmlreq = CriarRequest();

                                // Iniciar uma requisição
                                xmlreq.open("GET", "../request/professor.find.php?nomeConsulta=" + nome, true);
                                xmlreq.onreadystatechange = function(){
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
        include('../messages/professor.message.php');
    }
    include('../includes/footer.php');
?>
