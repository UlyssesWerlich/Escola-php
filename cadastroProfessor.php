<?php
    include('cabecalho.php');
?>
            <div class='col-sm-9 bloco'>
                <p>Cadastro de Professor</p>

                <form class="form-horizontal" name="form" method="POST" action="atualizarDadosProfessor.php">
                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='nome'>Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control">
                        </div>
                    </div>
                
                    <div class='row'>
                        <div class="form-group col-sm-4">
                            <label class="control-label" for='cpf'>CPF</label>
                                <input type="text" name="cpf" id="cpf" class="form-control">

                        </div>

                        <div class="form-group col-sm-4">
                            <label class="control-label" for='telefone'>Telefone</label>
                                <input type="text" name="telefone" id="telefone" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <label class="control-label" for='endereco'>Endereço</label>
                            <input type="text" name="endereco" id="endereco" class="form-control">
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-sm-4">
                            <label class="control-label" for='dataNascimento'>Data de nascimento</label>
                            <input type="date" name="dataNascimento" id="dataNascimento" class="form-control">
                        </div>

                        <div class="radio col-sm-4">
                            <label>Selecione o sexo do professor</label>
                            <label><input class="optradio" name="sexo" type="radio" value="M" checked>Masculino</label>
                            <label><input class="optradio" name="sexo" type="radio" value="F">Feminino</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for='formacao'>Formação</label>
                        <textarea placeholder="Escreva aqui a formação do professor e especialidades" name="formacao" id="formacao" rows='5' class="form-control"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success" name="botao" value="Cadastrar"/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>