<?php

    /*$materia = $_POST['materia'];
    $turno = $_POST['turno'];
    $cargaHoraria = $_POST['cargaHoraria'];
    $curso = $_POST['curso'];
    $idProfessor = $_POST['idProfessor'];
    $nomeProfessor = $_POST['nomeProfessor'];
    $dataInicio = $_POST['dataInicio'];
    $dataTermino = $_POST['dataTermino'];
    $diaSemana = $_POST['diaSemana'];
    $horaInicio = $_POST['horaInicio'];
    $horaTermino = $_POST['horaTermino'];*/
    

    $titulo = "Cadastro de Aula - Inserir Alunos";
    include('../partials/cabecalho.php');
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
                <form class="form-horizontal" name="form" method="POST" action="../controler/atualizarTurma.php">
                    <table class='table' id='listaAlunos'>
                        <tr>
                            <td><input type="submit" class="btn btn-success" name="botao" value="Cadastrar Turma"/></td>
                            <td>Matrícula</td>
                            <td>Nome</td>
                        </tr>
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
                        linha.insertCell(1).innerHTML = matricula;
                        linha.insertCell(2).innerHTML = aluno + "<input type='hidden' name='matriculas[]' value='" + matricula + "'/>";
                        document.getElementById('listaAlunos').appendChild(linha);
                        return false;
                    }

                    function removerLinha(linha){
                        var i=linha.parentNode.parentNode.rowIndex;
                        document.getElementById('listaAlunos').deleteRow(i);
                    }
                </script>
<?php
    include('../partials/rodape.php');
?>