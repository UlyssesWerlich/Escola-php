<?php
    include('cabecalho.php');
    $matricula = $_GET['matricula'];

    try {
        $pdo =new PDO("mysql:host=localhost;dbname=escola","root", "password");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $consulta = $pdo->prepare("select * from aluno where matricula like '$matricula'");
    $consulta->execute();
    $resultado = $consulta->fetchAll();
?>
            <div class='col-sm-9 bloco'>
                <p>Alterar dados de Aluno</p>

<?php
    foreach ($resultado as $row){
    $checkedM = ($row['turno'] == 'M')?('checked'):('');
    $checkedV = ($row['turno'] == 'V')?('checked'):('');
    $checkedN = ($row['turno'] == 'N')?('checked'):('');

?>
                <form name="form" method="POST" action="atualizarDadosAluno.php">
                    <div class='row'>
                        <div class="form-group col-sm-4">
                            <label class="control-label" for='matricula'>Matrícula</label>
                                <input value='<?php echo "$row[matricula]"; ?>' type="text" name='matricula' id="matricula" class="form-control" readonly>
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='nome'>Nome</label>
                                <input value='<?php echo "$row[nome]"; ?>' type="text" name="nome" id="nome" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='endereco'>Endereço</label>
                            <input value='<?php echo "$row[endereco]"; ?>' type="text" name="endereco" id="endereco" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='turma'>Turma</label>
                                <input value='<?php echo "$row[turma]"; ?>' type="text" name="turma" id="turma" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-4">
                            <label class="control-label" for='dataNascimento'>Data de nascimento</label>
                            <input type="date" value='<?php echo "$row[dataNascimento]";?>' name="dataNascimento" id="dataNascimento" class="form-control">
                        </div>
                        
                        <div class="checkbox col-sm-4">
                            <label>Selecione o turno do aluno</label>
                            <label><input <?php echo "$checkedM"; ?> class="optradio" name="turno" type="radio" value="M"/>Matutivo</label>
                            <label><input <?php echo "$checkedV"; ?> class='optradio' name='turno' type='radio' value='V'/>Vespertino</label>
                            <label><input <?php echo "$checkedN";}; ?> class='optradio' name='turno' type='radio' value='N'>Noturno</label>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" name="botao" value="Alterar"/>
                    <input type="submit" class="btn btn-danger" name="botao" value="Excluir"/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>