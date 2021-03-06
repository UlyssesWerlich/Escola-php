<!DOCTYPE html>
<html>
    <head>
        <?php require 'includes/header.php' ?>
    </head>
    <body>
        <div class='d-flex'>
        <?php require 'includes/menu.php' ?>

           <div class='container-fluid'>
                <h3 class='mt-3'>Alterar informações da Aula</h3>

<?php
    foreach ($resultado as $campo){
?>
                <form class="form-horizontal" name="form" method="POST" action="../controllers/aula.controller.php">
                    <input type='hidden' name='idAula' value='<?php echo $campo['idAula'] ?>'/>

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='materia'>Matéria</label>
                            <input type="text" value='<?php echo $campo['materia'] ?>' minlength="3" maxlength="50" name="materia" id="materia" class="form-control">
                        </div>
                    </div>
                
                    <div class='row'>

                        <div class="form-group col-sm-4">
                            <label class="control-label" for='curso'>Curso</label>
                            <input type="text" value='<?php echo $campo['curso'] ?>' minlength="3" maxlength="30" name="curso" id="curso" class="form-control">
                        </div>

                        <div class="form-group col-sm-2">
                            <input type='hidden' id='hiddenTurno' value='<?php echo $campo['turno'] ?>'/>
                            <label class="control-label" for='turno'>Turno</label>
                            <select id="turno" class="form-control" name="turno">
                                <option value="M">Matutino</option>
                                <option value="V">Vespertino</option>
                                <option value="N">Noturno</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-2">
                            <label class="control-label" for='cargaHoraria'>Carga horária</label>
                            <input type="text" value='<?php echo $campo['cargaHoraria'] ?>' name="cargaHoraria" id="cargaHoraria" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-3">
                            <label class="control-label" for='idProfessor'>ID do Professor</label>
                            <input  type="text" value='<?php echo $campo['idProfessor'] ?>' name="idProfessor" id="idProfessor" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="control-label" for='nomeProfessor'>Nome do Professor</label>
                            <input type="text" minlength="3" maxlength="80" name="nomeProfessor" id="nomeProfessor" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <br/>
                            <p><a href="javascript:getDados()">Consultar Professor</a></p>
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-3">
                            <label class="control-label" for='dataInicio'>Data de Início</label>
                            <input type="date" value='<?php echo $campo['dataInicio'] ?>' name="dataInicio" id="dataInicio" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="control-label" for='dataTermino'>Data de Termino</label>
                            <input type="date" value='<?php echo $campo['dataTermino'] ?>' name="dataTermino" id="dataTermino" class="form-control">
                        </div>
                    </div>
                    <div class='row'>
                        <div class="form-group col-sm-2">
                            <input type='hidden' id='hiddenDiaSemana' value='<?php echo $campo['diaSemana'] ?>'/>
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
                            <input  type="text" value='<?php echo $campo['horaInicio'] ?>' name="horaInicio" id="horaInicio" class="form-control">
                        </div>

                        <div class="form-group col-sm-2">
                            <label class="control-label" for='horaTermino'>Hora de término</label>
                            <input type="text" value='<?php echo $campo['horaTermino'] ?>' name="horaTermino" id="horaTermino" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                            <input type="submit" class="btn btn-primary" name="botao" value="Alterar"/>
                        </form>

                        <form name="form" method="POST" action="?controller=Aula&method=delete">
                            <input value='<?php echo "$campo[idAula]"; ?>' type="hidden" name='idAula' id="idAula">
                            <input type="submit" class="btn btn-danger" name="botao" value="Excluir"/>
                        </form>
                    </div>
        <script>
            var diaSemana = document.getElementById('hiddenDiaSemana').value;
            document.getElementById('diaSemana').value = diaSemana;

            var turno = document.getElementById('hiddenTurno').value;
            document.getElementById('turno').value = turno;
        </script>
        <!----------------------------------AJAX--------------------------------------->                    
        <script src='../request/request.js'></script>
        <script>
            function getDados(){
                var id = document.getElementById("idProfessor").value;
                var nome = document.getElementById("nomeProfessor").value;
            
                if (nome.length > 2 || id.length > 0) {

                    var result = document.getElementById("resultado");
                    var xmlreq = CriarRequest();
                    xmlreq.open("GET", "../request/professor.findByName.php?nome=" + nome + "&idProfessor=" + id, true);

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
    }
    require 'includes/footer.php';
?>