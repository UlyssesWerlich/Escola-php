<?php
    include('cabecalho.php');
?>
            <div class='col-sm-9 bloco'>
                <p>Cadastro de Aluno</p>
            
                <form name="form" method="POST" action="atualizarDadosAluno.php">

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='nome'>Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='endereco'>Endereço</label>
                            <input type="text" name="endereco" id="endereco" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='turma'>Turma</label>
                                <input type="text" name="turma" id="turma" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-4">
                            <label class="control-label" for='dataNascimento'>Data de nascimento</label>
                            <input type="date" name="dataNascimento" id="dataNascimento" class="form-control">
                        </div>
                        
                        <div class="checkbox col-sm-4">
                            <label>Selecione o turno do aluno</label>
                            <label><input class="optradio" name="turno" type="radio" value="M"/>Matutivo</label>
                            <label><input class='optradio' name='turno' type='radio' value='V'/>Vespertino</label>
                            <label><input class='optradio' name='turno' type='radio' value='N'>Noturno</label>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success" name="botao" value="Cadastrar"/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>