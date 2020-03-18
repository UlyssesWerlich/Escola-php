<?php

    $materia = $_POST['materia'];
    $turno = $_POST['turno'];
    $cargaHoraria = $_POST['cargaHoraria'];
    $curso = $_POST['curso'];
    $IdProfessor = $_POST['IdProfessor'];
    $nomeProfessor = $_POST['nomeProfessor'];
    $dataInicio = $_POST['dataInicio'];
    $dataTermino = $_POST['dataTermino'];
    $diaSemana = $_POST['diaSemana'];
    $horaInicio = $_POST['horaInicio'];
    $horaTermino = $_POST['horaTermino'];
    

    $titulo = "Cadastro de Aula - Inserir Alunos";
    include('../partials/cabecalho.php');
?>
                <h5>Consulta de Aluno</h5>
                <form>
                    <table class='table'>
                        <tr>
                            <td><input type='text' size='1' placeholder='Digite aqui a matrícula ou nome para consulta' onkeyup='getDados()' class="form-control" id='valorConsulta' name='valorConsulta' /></td>
                            <td>Matrícula</td>
                            <td>Nome</td>
                        </tr>
                        <tbody id='result'>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                        </tbody>
                    </table>
                </form>

                <h5>Lista de Alunos cadastrados na Aula</h5>
                <form class="form-horizontal" name="form" method="POST" action="../controler/atualizarAula.php">
                    <input type='hidden' name='materia' value='<?php echo $materia ?>'/>
                    <input type='hidden' name='turno' value='<?php echo $turno ?>'/>
                    <input type='hidden' name='curso' value='<?php echo $curso ?>'/>
                    <input type='hidden' name='IdProfessor' value='$<?php echo $IdProfessor ?>'/>
                    <input type='hidden' name='nomeProfessor' value='$<?php echo $nomeProfessor ?>'/>
                    <input type='hidden' name='dataInicio' value='$<?php echo $dataInicio ?>'/>
                    <input type='hidden' name='dataTermino' value='$<?php echo $dataTermino ?>'/>
                    <input type='hidden' name='diaSemana' value='$<?php echo $diaSemana ?>'/>

                    <table class='table' id='listaAlunos'>
                        <tr>
                            <td><input type="submit" class="btn btn-success" name="botao" value="Cadastrar Aula"/></td>
                            <td>Matrícula</td>
                            <td>Nome</td>
                        </tr>
                    </table>
                </form>

    <!----------------------------------AJAX--------------------------------------->                    
                <script src='../ajax/request.js'></script>
                <script>
                    function getDados(){
                        // Declaração de Variáveis
                        var valor = document.getElementById("valorConsulta") ? document.getElementById("valorConsulta").value : "%";

                        var result = document.getElementById("result");
                        var xmlreq = CriarRequest();
                        // Iniciar uma requisição
                        xmlreq.open("GET", "../ajax/ajaxAulaAluno.php?valorConsulta=" + valor, true);

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
                    }

                    function adicionarAluno(matricula, aluno){
                        alert("cheguei");
                        var linha = "<tr><td></td><td>" + matricula + "</td><td>" + aluno + "</td></tr>";
                        var listaAlunos = document.getElementById("listaAlunos");
                        listaAlunos.innerHTML += linha;
                    }

                    function removerlinha(){
                        
                    }
                </script>
<?php
    include('../partials/rodape.php');
?>