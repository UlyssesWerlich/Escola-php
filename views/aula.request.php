<!DOCTYPE html>
<html>
    <head>
        <?php require 'includes/header.php' ?>
    </head>
    <body>
        <div class='d-flex'>
        <?php require 'includes/menu.php' ?>

           <div class='container-fluid'>
                <h3 class='mt-3'>Consulta de Aula</h3>

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
                    <table class='table'>
                        <thead>
                            <tr>
                                <td>Matéria</td>
                                <td>Curso</td>
                                <td>Dia da Semana</td>
                                <td>Professor</td>
                                <td>Hora de Inicio</td>
                                <td>Hora Término</td>
                                <td>Ação</td>
                            </tr>
                        </thead>
                        <tbody id='resultado'></tbody>
                    </table>
<!----------------------------------AJAX--------------------------------------->                    
                    <script src='../request/request.js'></script>
                    <script>
                        function getDados(){
                            var materia = document.getElementById("materiaConsulta").value
                            var curso = document.getElementById("cursoConsulta").value;
                            var professor = document.getElementById("professorConsulta").value;
                            var diaSemana = document.getElementById("diaSemanaConsulta").value;
                            var turno = document.getElementById("turnoConsulta").value;

                            if (materia.length > 2 || curso.length > 2 || professor.length > 2 || diaSemana != "%" || turno != "%") {

                                var result = document.getElementById("resultado");
                                var xmlreq = CriarRequest();

                                xmlreq.open("GET", "../request/aula.find.php?" + 
                                                    "materia=" + materia + 
                                                    "&curso=" + curso + 
                                                    "&professorNome=" + professor +
                                                    "&diaSemana=" + diaSemana +
                                                    "&turno=" + turno, true);
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
<?php if (isset($message)){ ?>
        <script>alert("<?php echo $message; ?>");</script> 
<?php
    }
    require 'includes/footer.php';
?>
                
                
