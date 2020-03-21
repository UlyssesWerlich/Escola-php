<?php
    $titulo = "Consulta de Aula";
    include('../partials/cabecalho.php');
?>
                <form method='POST'>
                    <div class='row'>
                        <div class="form-group col-sm-3">
                            <label class="control-label" for='materiaConsulta'>Matéria</label>
                            <input type='text' onkeyup='getDados()' class="form-control" size='40' id='materiaConsulta' name='materiaConsulta' />
                        </div>

                        <div class='form-group col-sm-2'>
                            <label class="control-label" for='cursoConsulta'>Curso</label>
                            <input type='text' onkeyup='getDados()' class="form-control" id='cursoConsulta' name='cursoConsulta'/>
                        </div>

                        <div class='form-group col-sm-2'>
                            <label class="control-label" for='professorConsulta'>Professor</label>
                            <input type='text' onkeyup='getDados()' class="form-control" id='professorConsulta' name='professorConsulta'/>
                        </div>

                        <div class='form-group col-sm-2'>
                            <label class="control-label" for='diaSemanaConsulta'>Dia da semana</label>
                            <select name="diaSemanaConsulta" class="form-control" id="diaSemanaConsulta" onchange='getDados()'>
                                <option value="%"></option>
                                <option value="seg">Segunda-feira</option>
                                <option value="ter">Terça-feira</option>
                                <option value="qua">Quarta-feira</option>
                                <option value="qui">Quinta-feira</option>
                                <option value="sex">Sexta-feira</option>
                                <option value="sab">Sábado</option>
                            </select>
                        </div>

                        <div class='form-group col-sm-2'>
                            <label class="control-label" for='turnoConsulta'>Turno</label>
                            <select name="turnoConsulta" class="form-control" id="turnoConsulta" onchange='getDados()'>
                                <option value="%"></option>
                                <option value="M">Matutino</option>
                                <option value="V">Vespertino</option>
                                <option value="N">Noturno</option>
                            </select>
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
                            var materia = document.getElementById("materiaConsulta").value
                            var curso = document.getElementById("cursoConsulta").value;
                            var professor = document.getElementById("professorConsulta").value;
                            var diaSemana = document.getElementById("diaSemanaConsulta").value;
                            var turno = document.getElementById("turnoConsulta").value;

                            if (materia.length > 2 || curso.length > 2 || professor.length > 2 || diaSemana != "%" || turno != "%") {

                                var result = document.getElementById("resultado");
                                var xmlreq = CriarRequest();

                                // Iniciar uma requisição
                                xmlreq.open("GET", "../ajax/ajaxAula.php?" + 
                                                    "materiaConsulta=" + materia + 
                                                    "&cursoConsulta=" + curso + 
                                                    "&professorConsulta=" + professor +
                                                    "&diaSemana=" + diaSemana +
                                                    "&turno=" + turno, true);

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
                
                
