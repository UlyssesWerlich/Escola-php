<?php
    $titulo = "Alterar informações de Aula";
    include('../partials/cabecalho.php');

    try {
        $pdo =new PDO("mysql:host=localhost;dbname=escola","root", "password");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $idAula = $_GET['idAula'];
    $consulta = $pdo->prepare("select * from aula where idAula like '$idAula'");
    $consulta->execute();
    $resultado = $consulta->fetchAll();

    foreach ($resultado as $row){

?>
                <form class="form-horizontal" name="form" method="POST" action="../controler/atualizarAula.php">
                    <input type='hidden' name='idAula' value='<?php echo $row['idAula'] ?>'/>

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='materia'>Matéria</label>
                            <input type="text" value='<?php echo $row['materia'] ?>' minlength="3" maxlength="50" name="materia" id="materia" class="form-control">
                        </div>
                    </div>
                
                    <div class='row'>

                        <div class="form-group col-sm-4">
                            <label class="control-label" for='curso'>Curso</label>
                            <input type="text" value='<?php echo $row['curso'] ?>' minlength="3" maxlength="30" name="curso" id="curso" class="form-control">
                        </div>

                        <div class="form-group col-sm-2">
                            <input type='hidden' id='hiddenTurno' value='<?php echo $row['turno'] ?>'/>
                            <label class="control-label" for='turno'>Turno</label>
                            <select id="turno" class="form-control" name="turno">
                                <option value="M">Matutino</option>
                                <option value="V">Vespertino</option>
                                <option value="N">Noturno</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-2">
                            <label class="control-label" for='cargaHoraria'>Carga horária</label>
                            <input type="text" value='<?php echo $row['cargaHoraria'] ?>' name="cargaHoraria" id="cargaHoraria" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-3">
                            <label class="control-label" for='idProfessor'>ID do Professor</label>
                            <input  type="text" value='<?php echo $row['idProfessor'] ?>' name="idProfessor" id="idProfessor" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="control-label" for='nomeProfessor'>Nome do Professor</label>
                            <input type="text" minlength="3" maxlength="80" name="nomeProfessor" id="nomeProfessor" class="form-control">
                        </div>

                        <div class="form-group col-sm-1">
                            <label class="control-label" for='consultarProfessor'>Nome</label>
                            <button class="btn btn-primary" id='consultarProfessor'>Consultar</button>
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-3">
                            <label class="control-label" for='dataInicio'>Data de Início</label>
                            <input type="date" value='<?php echo $row['dataInicio'] ?>' name="dataInicio" id="dataInicio" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="control-label" for='dataTermino'>Data de Termino</label>
                            <input type="date" value='<?php echo $row['dataTermino'] ?>' name="dataTermino" id="dataTermino" class="form-control">
                        </div>
                    </div>
                    <div class='row'>
                        <div class="form-group col-sm-2">
                            <input type='hidden' id='hiddenDiaSemana' value='<?php echo $row['diaSemana'] ?>'/>
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
                            <input  type="text" value='<?php echo $row['horaInicio'] ?>' name="horaInicio" id="horaInicio" class="form-control">
                        </div>

                        <div class="form-group col-sm-2">
                            <label class="control-label" for='horaTermino'>Hora de término</label>
                            <input type="text" value='<?php echo $row['horaTermino'] ?>' name="horaTermino" id="horaTermino" class="form-control">
                        </div>
                    </div>
                    
                    <input type="submit" class="btn btn-primary" name="botao" value="Alterar"/>
                    <input type="submit" class="btn btn-danger" name="botao" value="Excluir"/>
                </form>
        <script>
            var diaSemana = document.getElementById('hiddenDiaSemana').value;
            document.getElementById('diaSemana').value = diaSemana;

            var turno = document.getElementById('hiddenTurno').value;
            document.getElementById('turno').value = turno;
        </script>

<?php
    }
    include('../partials/rodape.php');
?>