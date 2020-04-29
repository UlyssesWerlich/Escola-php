<!DOCTYPE html>
<html>
    <head>
        <?php include('../includes/header.php') ?>
    </head>
    <body>
        <div class='d-flex'>
        <?php include('../includes/menu.php') ?>

           <div class='container-fluid'>
                <h3 class='mt-3'>Alterar informações do Professor</h3>
<?php
    $idProfessor = $_GET['idProfessor'];
    require_once '../dao/professor.dao.php';
    $resultado = find($idProfessor);

    foreach ($resultado as $row){
?>
                <form class="form-horizontal" name="form" method="POST" action="../controllers/professor.controller.php">
                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='nome'>Nome</label>
                                <input value='<?php echo "$row[nome]"; ?>' minlength="3" maxlength="45" type="text" name="nome" id="nome" class="form-control">
                        </div>
                        <div class="form-group col-sm-3">
                            <label class="control-label" for='idProfessor'>Id do Professor</label>
                                <input value='<?php echo "$row[idProfessor]"; ?>' type="text" name="idProfessor" id="idProfessor" class="form-control" readonly>
                        </div>
                    </div>
                
                    <div class='row'>
                        <div class="form-group col-sm-4">
                            <label class="control-label" for='cpf'>CPF</label>
                                <input value='<?php echo "$row[cpf]"; ?>' minlength="14" maxlength="14" type="text" name="cpf" id="cpf" class="form-control">

                        </div>

                        <div class="form-group col-sm-4">
                            <label class="control-label" for='telefone'>Telefone</label>
                                <input value='<?php echo "$row[telefone]"; ?>' minlength="3" maxlength="13" type="text" name="telefone" id="telefone" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='endereco'>Endereço</label>
                            <input value='<?php echo "$row[endereco]"; ?>' minlength="3" maxlength="80" type="text" name="endereco" id="endereco" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-4">
                            <label class="control-label" for='dataNascimento'>Data de nascimento</label>
                            <input value='<?php echo "$row[dataNascimento]"; ?>' type="date" name="dataNascimento" id="dataNascimento" class="form-control">
                        </div>

                        <div class="radio col-sm-3">
                            <label>Selecione o sexo do professor</label>
                            <label><input <?php echo ( $row['sexo'] == 'M')?('checked'):(''); ?> class="optradio" name="sexo" type="radio" value="M" checked>Masculino</label>
                            <label><input <?php echo ( $row['sexo'] == 'F')?('checked'):(''); ?> class="optradio" name="sexo" type="radio" value="F">Feminino</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for='formacao'>Formação</label>
                        <textarea  placeholder='<?php echo "$row[formacao]"; ?>' maxlength="400" name="formacao" id="formacao" rows='5' cols='60' class="form-control"></textarea>
                    </div>
                    <input type='submit' name='botao' class="btn btn-primary" value='Alterar'>
                    <input type='submit' name='botao' class="btn btn-danger" value='Excluir'>
                </form>
<?php
    }; include('../includes/footer.php');
?>