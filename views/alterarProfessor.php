<?php
    $titulo = 'Alterar dados de Professor';
    include('../partials/cabecalho.php');

    try {
        $pdo =new PDO("mysql:host=localhost;dbname=escola","root", "password");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $idProfessor = $_GET['idProfessor'];
    $consulta = $pdo->prepare("select * from professor where idProfessor like '$idProfessor'");
    $consulta->execute();
    $resultado = $consulta->fetchAll();

    foreach ($resultado as $row){
        $sexo = $row['sexo'];
        $checkedM = ( $sexo == 'M')?('checked'):('');
        $checkedF = ( $sexo == 'F')?('checked'):('');
?>
                <form class="form-horizontal" name="form" method="POST" action="../controler/atualizarDadosProfessor.php">
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
                            <label><input <?php echo "$checkedM"; ?> class="optradio" name="sexo" type="radio" value="M" checked>Masculino</label>
                            <label><input <?php echo "$checkedF"; ?> class="optradio" name="sexo" type="radio" value="F">Feminino</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for='formacao'>Formação</label>
                        <textarea  placeholder='<?php echo "$row[formacao]";}; ?>' maxlength="400" name="formacao" id="formacao" rows='5' cols='60' class="form-control"></textarea>
                    </div>
                    <input type='submit' name='botao' class="btn btn-primary" value='Alterar'>
                    <input type='submit' name='botao' class="btn btn-danger" value='Excluir'>
                </form>
<?php
    include('../partials/rodape.php');
?>