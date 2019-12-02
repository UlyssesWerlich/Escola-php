<?php
    include('cabecalho.php');
?>
    <div class='titulo'>
        <p>Cadastro de Aluno</p>
    </div>
    <div class='bloco'>
        <div class="formulario">
            <form name="form2" method="POST" action="atualizarDadosAluno.php">
                <p>Nome:<br/>
                    <input type="text" name="nome"></p>  
                <p>Endereço:<br/>
                    <input type="text" name="endereco"></p>  
                <p>Turma:<br/>
                    <input type="text" name="turma"></p> 
                <p>Selecione o Turno:<br>
                    <input class="campo" name="turno" type="radio" id="turno" value="manha">Manhã
                    <input class="campo" name="turno" type="radio" id="turno" value="tarde">Tarde
                    <input class="campo" name="turno" type="radio" id="turno" value="noite">Noite</p>   
                <p>Data de nascimento:<br>
                    <input type="date" name="dataNascimento"> </p>
                </p>
                <input type="submit" name="botao" value="Cadastrar">
            </form>
        </div>
    </div>
</body>
</html>