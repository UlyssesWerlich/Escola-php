<!DOCTYPE html>
<html>
    <head>
        <?php include('../includes/header.php') ?>
    </head>
    <body>
        <div class='d-flex'>
        <?php include('../includes/menu.php') ?>

           <div class='container-fluid'>
                <h3 class='mt-3'>Alterar informações do Aluno</h3>

<?php
    require_once '../dao/aluno.dao.php';
    $matricula = $_GET['matricula'];
    $resultado = find($matricula);
    foreach ($resultado as $row){
?>
                <form name="form" method="POST" action="../controllers/aluno.controller.php">
                    <div class='row'>
                        <div class="form-group col-sm-4">
                            <label class="control-label" for='matricula'>Matrícula</label>
                                <input value='<?php echo "$row[matricula]"; ?>' type="text" name='matricula' id="matricula" class="form-control" readonly>
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='nome'>Nome</label>
                                <input value='<?php echo "$row[nome]"; ?>' minlength="3" maxlength="45" type="text" name="nome" id="nome" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='endereco'>Endereço</label>
                            <input value='<?php echo "$row[endereco]"; ?>' minlength="3" maxlength="80" type="text" name="endereco" id="endereco" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='turma'>Turma</label>
                                <input value='<?php echo "$row[turma]"; ?>' minlength="3" maxlength="20" type="text" name="turma" id="turma" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-4">
                            <label class="control-label" for='dataNascimento'>Data de nascimento</label>
                            <input type="date" value='<?php echo "$row[dataNascimento]";?>' name="dataNascimento" id="dataNascimento" class="form-control">
                        </div>
                        
                        <div class="checkbox col-sm-3">
                            <label>Selecione o turno do aluno</label>
                            <label><input <?php echo ($row['turno'] == 'M')?('checked'):(''); ?> class="optradio" name="turno" type="radio" value="M"/>Matutivo</label>
                            <label><input <?php echo ($row['turno'] == 'V')?('checked'):(''); ?> class='optradio' name='turno' type='radio' value='V'/>Vespertino</label>
                            <label><input <?php echo ($row['turno'] == 'N')?('checked'):('');} ?> class='optradio' name='turno' type='radio' value='N'>Noturno</label>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" name="botao" value="Alterar"/>
                    <input type="submit" class="btn btn-danger" name="botao" value="Excluir"/>
                </form>
<?php 
    include('../includes/footer.php');
?>