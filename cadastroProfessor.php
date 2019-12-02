<?php
    include('cabecalho.php');
?>
    <div class='titulo'>
        <p>Cadastro de Professor</p>
    </div>
    <div class='bloco'>
        <div class="formulario">
            <form name="form2" method="POST" action="atualizarDadosProfessor.php">
                <p>Nome:<br/>
                    <input type="text" name="nome"></p>  
                <p>Endereço:<br/>
                    <input type="text" name="endereco"></p>  
                <p>CPF:<br/>
                    <input type="text" name="cpf"></p> 
                <p>Telefone:<br/>
                    <input type="text" name="telefone"></p>
                <p>Selecione o sexo do professor:<br/>
                    <input class="campo" name="sexo" type="radio" value="M" checked>Masculino
                    <input class="campo" name="sexo" type="radio" value="F">Feminino</p>   
                <p>Data de nascimento:<br/>
                    <input type="date" name="dataNascimento"> </p>
                </p>
                <p>Formação:</p>
                <textarea name="formacao" rows='10' cols='80' placeholder="Escreva aqui a formação do professor e especialidades" ></textarea>
                <p><input type="submit" name="botao" value="Cadastrar"></p>
            </form>
        </div>
    </div>
</body>
</html>