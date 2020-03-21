<?php
    $titulo = "Cadastro de Aula";
    include('../partials/cabecalho.php');
?>
                <form class="form-horizontal" name="form" method="POST" action="../controler/atualizarAula.php">
                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='materia'>Matéria</label>
                            <input type="text" minlength="3" maxlength="50" name="materia" id="materia" class="form-control">
                        </div>
                    </div>
                
                    <div class='row'>

                        <div class="form-group col-sm-4">
                            <label class="control-label" for='curso'>Curso</label>
                            <input type="text" minlength="3" maxlength="30" name="curso" id="curso" class="form-control">
                        </div>

                        <div class="form-group col-sm-2">
                            <label class="control-label" for='turno'>Turno</label>
                            <select id="turno" class="form-control" name="turno">
                                <option value="M">Matutino</option>
                                <option value="V">Vespertino</option>
                                <option value="N">Noturno</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-2">
                            <label class="control-label" for='cargaHoraria'>Carga horária</label>
                            <input type="text" name="cargaHoraria" id="cargaHoraria" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-3">
                            <label class="control-label" for='idProfessor'>ID do Professor</label>
                            <input  type="text" name="idProfessor" id="idProfessor" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="control-label" for='nomeProfessor'>Nome do Professor</label>
                            <input type="text"  minlength="3" maxlength="80" name="nomeProfessor" id="nomeProfessor" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <br/>
                            <p><a href="javascript:getDados()">Consultar Professor</a></p>
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-3">
                            <label class="control-label" for='dataInicio'>Data de Início</label>
                            <input type="date" name="dataInicio" id="dataInicio" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="control-label" for='dataTermino'>Data de Termino</label>
                            <input type="date" name="dataTermino" id="dataTermino" class="form-control">
                        </div>
                    </div>
                    <div class='row'>
                        <div class="form-group col-sm-2">
                            <label class="control-label" for='diaSemana'>Dia da Semana</label>
                            <select id="diaSemana" class="form-control" name="diaSemana">
                                <option value="seg">Segunda-feira</option>
                                <option value="ter">Terça-feira</option>
                                <option value="qua">Quarta-feira</option>
                                <option value="qui">Quinta-feira</option>
                                <option value="sex">Sexta-feira</option>
                                <option value="sab">Sábado</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-2">
                            <label class="control-label" for='horaInicio'>Hora de início</label>
                            <input  type="text" name="horaInicio" id="horaInicio" class="form-control">
                        </div>

                        <div class="form-group col-sm-2">
                            <label class="control-label" for='horaTermino'>Hora de término</label>
                            <input type="text"  name="horaTermino" id="horaTermino" class="form-control">
                        </div>
                    </div>
                    
                    <input type="submit" class="btn btn-success" name="botao" value="Cadastrar"/>
                </form>

<!----------------------------------AJAX--------------------------------------->                    
                <script src='../ajax/request.js'></script>
                <script>
                    function getDados(){
                        var id = document.getElementById("idProfessor").value;
                        var nome = document.getElementById("nomeProfessor").value;
                    
                        if (nome.length > 2 || id.length > 0) {

                            var result = document.getElementById("resultado");
                            var xmlreq = CriarRequest();
                            xmlreq.open("GET", "../ajax/ajaxNomeProfessor.php?nomeConsulta=" + nome + "&idConsulta=" + id, true);

                            xmlreq.onreadystatechange = function(){
                                if (xmlreq.status == 200){
                                    var resposta = xmlreq.responseText;
                                    var array = resposta.split('<td>');
                                    document.getElementById("idProfessor").value = array[0];
                                    document.getElementById("nomeProfessor").value = array[1];
                                } else {
                                    result.innerHTML = "Erro: " + xmlreq.statusText;
                                }
                            };
                            xmlreq.send(null);
                        } else {
                            document.getElementById("idProfessor").innerHTML = '';
                            document.getElementById("nomeProfessor").innerHTML = '';
                        }
                    }
                </script>
<?php
    include('../partials/rodape.php');
?>