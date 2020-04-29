<!DOCTYPE html>
<html>
    <head>
        <?php include('../includes/header.php') ?>
    </head>
    <body>
        <div class='d-flex'>
        <?php include('../includes/menu.php') ?>

           <div class='container-fluid'>
                <h3 class='mt-3'>Cadastro de Aluno</h3>
   
                <form name="form" method="POST" action="../controllers/aluno.controller.php">

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='nome'>Nome</label>
                                <input type="text" minlength="3" maxlength="45" name="nome" id="nome" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='endereco'>Endereço</label>
                            <input type="text" minlength="3" maxlength="80" name="endereco" id="endereco" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='turma'>Turma</label>
                                <input minlength="3" maxlength="20" type="text" name="turma" id="turma" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-4">
                            <label class="control-label" for='dataNascimento'>Data de nascimento</label>
                            <input type="date" name="dataNascimento" id="dataNascimento" class="form-control">
                        </div>
                        
                        <div class="checkbox col-sm-3">
                            <label>Selecione o turno do aluno</label>
                            <label><input checked class="optradio" name="turno" type="radio" value="M"/>Matutivo</label>
                            <label><input class='optradio' name='turno' type='radio' value='V'/>Vespertino</label>
                            <label><input class='optradio' name='turno' type='radio' value='N'>Noturno</label>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success" name="botao" value="Cadastrar"/>
                </form>

<?php
    if (isset($_GET['message'])){ 
        $message = $_GET['message'];
        include('../messages/aluno.message.php');
    }
    
    include('../includes/footer.php');
?>