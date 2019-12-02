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
    <div class='bloco'>
        <div class='titulo'>
            <p>Alterar dados de Aluno</p>
        </div>
        

<?php
    foreach ($resultado as $row){

        echo "<div class='formulario'>
                <form name='form' method='POST' action='atualizarDadosAluno.php'>";
        echo "<p>Id do aluno</p>
                <input type='text' name='matricula' value='$row[matricula]' readonly></p>";
        echo "<p>Nome<br/>
                <input type='text' name='nome' value='$row[nome]'></p>  
            <p>Endereço<br/>
                <input type='text' name='endereco' value='$row[endereco]'></p>  
            <p>Turma<br/>
                <input type='text' name='turma' value='$row[turma]'></p> 
            <p>Selecione o Turno:<br>
                <input class='campo' name='turno' type='radio' id='turno' value='manha'>Manhã
                <input class='campo' name='turno' type='radio' id='turno' value='tarde'>Tarde
                <input class='campo' name='turno' type='radio' id='turno' value='noite'>Noite</p>  
            <p>Data de nascimento:<br>
                <input type='date' name='dataNascimento' value='$row[dataNascimento]'> </p>
            </p>     
            <input type='submit' name='botao' value='Alterar'>
            <input type='submit' name='botao' value='Excluir'>
        </form>
    </div>";

    }

?>
    </div>
</body>
</html>