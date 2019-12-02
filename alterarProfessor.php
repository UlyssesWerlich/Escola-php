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
    <div class='bloco'>
        <div class='titulo'>
            <p>Alterar dados de Professor</p>
        </div>
        
<?php
    foreach ($resultado as $row){
        $sexo = $row['sexo'];
        $checkedM = ( $sexo == 'M')?('checked'):('');
        $checkedF = ( $sexo == 'F')?('checked'):('');
?>
        <div class='formulario'>
            <form name='form' method='POST' action='atualizarDadosProfessor.php'>
                <p>Id do aluno</p>
                    <input type='text' name='idProfessor' value='<?php echo "$row[idProfessor]"; ?>' readonly></p>
                <p>Nome<br/>
                    <input type='text' name='nome' value='<?php echo "$row[nome]"; ?>'></p>  
                <p>Endereço<br/>
                    <input type='text' name='endereco' value='<?php echo "$row[endereco]"; ?>'></p>  
                <p>CPF:<br/>
                    <input type='text' name='cpf' value='<?php echo "$row[cpf]"; ?>' ></p> 
                <p>Telefone:<br/>
                    <input type='text' name='telefone' value='<?php echo "$row[telefone]"; ?>'></p>
                <p>Selecione o sexo do professor:<br/>
                    <input class='campo' <?php echo "$checkedM"; ?> name='sexo' type='radio' value='M'>Masculino
                    <input class='campo' <?php echo "$checkedF"; ?> name='sexo' type='radio' value='F'>Feminino</p>    
                <p>Data de nascimento:<br>
                    <input type='date' name='dataNascimento' value='<?php echo "$row[dataNascimento]"; ?>'> </p>
                <p>Formação:</p>
                    <textarea name='formacao' rows='10' cols='80' placeholder='<?php echo "$row[formacao]"; }; ?>' ></textarea>
                
                <input type='submit' name='botao' value='Alterar'>
                <input type='submit' name='botao' value='Excluir'>
            </form>
        </div>
    </div>
</body>
</html>