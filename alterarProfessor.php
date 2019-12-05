<?php
    include('cabecalho.php');
    $idProfessor = $_GET['idProfessor'];

    try {
        $pdo =new PDO("mysql:host=localhost;dbname=escola","root", "password");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $consulta = $pdo->prepare("select * from professor where idProfessor like '$idProfessor'");
    $consulta->execute();
    $resultado = $consulta->fetchAll();
?>
            <div class='col-sm-9 bloco'>
                <p>Alterar dados de Professor</p>
        
<?php
    foreach ($resultado as $row){
        $sexo = $row['sexo'];
        $checkedM = ( $sexo == 'M')?('checked'):('');
        $checkedF = ( $sexo == 'F')?('checked'):('');
?>
                <form class="form-horizontal" name="form" method="POST" action="atualizarDadosProfessor.php">
                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='nome'>Nome</label>
                                <input value='<?php echo "$row[nome]"; ?>' type="text" name="nome" id="nome" class="form-control">
                        </div>
                        <div class="form-group col-sm-3">
                            <label class="control-label" for='idProfessor'>Id do Professor</label>
                                <input value='<?php echo "$row[idProfessor]"; ?>' type="text" name="idProfessor" id="idProfessor" class="form-control" readonly>
                        </div>
                    </div>
                
                    <div class='row'>
                        <div class="form-group col-sm-4">
                            <label class="control-label" for='cpf'>CPF</label>
                                <input value='<?php echo "$row[cpf]"; ?>' type="text" name="cpf" id="cpf" class="form-control">

                        </div>

                        <div class="form-group col-sm-4">
                            <label class="control-label" for='telefone'>Telefone</label>
                                <input value='<?php echo "$row[telefone]"; ?>' type="text" name="telefone" id="telefone" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='endereco'>Endereço</label>
                            <input value='<?php echo "$row[endereco]"; ?>' type="text" name="endereco" id="endereco" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-4">
                            <label class="control-label" for='dataNascimento'>Data de nascimento</label>
                            <input value='<?php echo "$row[dataNascimento]"; ?>' type="date" name="dataNascimento" id="dataNascimento" class="form-control">
                        </div>

                        <div class="radio col-sm-4">
                            <label>Selecione o sexo do professor</label>
                            <label><input <?php echo "$checkedM"; ?> class="optradio" name="sexo" type="radio" value="M" checked>Masculino</label>
                            <label><input <?php echo "$checkedF"; ?> class="optradio" name="sexo" type="radio" value="F">Feminino</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for='formacao'>Formação</label>
                        <textarea  placeholder='<?php echo "$row[formacao]";}; ?>' name="formacao" id="formacao" rows='5' cols='60' class="form-control"></textarea>
                    </div>
                    <input type='submit' name='botao' class="btn btn-primary" value='Alterar'>
                    <input type='submit' name='botao' class="btn btn-danger" value='Excluir'>
                </form>
            </div>
        </div>
    </div>
</body>
</html>