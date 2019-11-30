<?php
    $tituloCabecalho = "Consulta de aluno";
    include('cabecalho.php');
?>

        <div class='formulario'>
            <form method='POST' action='consultaAluno.php'>
                <p>Consulta por nome:</p>
                <input type='text' size='40' name='nomeConsulta' placeholder='Escreva aqui o nome para consulta' />
                <input type='submit' name='botao'/>
            </form>
        </div>

<?php

    if (isset($_POST['nomeConsulta'])){

        try{
            $pdo=new PDO("mysql:host=localhost;dbname=escola","root","password");
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $nomeConsulta = $_POST['nomeConsulta'];
        $consultar=$pdo->prepare("select * from alunos where nome like '$nomeConsulta%';");
        $consultar->execute();
    
        $result = $consultar->fetchAll();
        echo "<table border='1'>
                <caption>Alunos</caption>
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Endereço</td>
                        <td>Turma</td>
                        <td>Turno</td>
                        <td>Data de Nascimento</td>
                    </tr>";
        foreach ($result as $row) {
            $dataArray = explode("-", $row['dataNascimento']);
            $dataConvertida = $dataArray[2]."/".$dataArray[1]."/".$dataArray[0];
            
            echo "<tr>
                    <td><a href=editarAluno.php?id_alunos=$row[id_alunos]>$row[id_alunos]</a></td>
                    <td>$row[nome]</td>
                    <td>$row[endereco]</td>
                    <td>$row[turma]</td>
                    <td>$row[turno]</td>
                    <td>$dataConvertida</td>
                </tr>";
        }
        echo "</table>";
    
        $pdo = null;

    }
?>
</body>
</html>
