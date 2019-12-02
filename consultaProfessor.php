<?php
    include('cabecalho.php');
?>
    <div class='bloco'>
        <div class='titulo'>
            <p>Consulta de Professor</p>
        </div>
        <div class='formulario'>
            <form method='POST' action='consultaProfessor.php'>
                <p>Consulta por nome:</p>
                <input type='text' size='40' name='nomeConsulta' placeholder='Escreva aqui o nome para consulta' />
                <input type='submit' name='botao' value='Consultar'/>
            </form>
        </div>
        <div class='tabela'>
            <table border='1'>
                <caption>Professor</caption>
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Endereço</td>
                        <td>Telefone</td>
                        <td>Sexo</td>
                        <td>Data de Nascimento</td>
                    </tr>
<?php
    if (isset($_POST['nomeConsulta'])){
        try{
            $pdo=new PDO("mysql:host=localhost;dbname=escola","root","password");
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $nomeConsulta = $_POST['nomeConsulta'];
        $consultar=$pdo->prepare("select idProfessor, nome, endereco, telefone, sexo, dataNascimento from professor where nome like '$nomeConsulta%';");
        $consultar->execute();
    
        $result = $consultar->fetchAll();

        foreach ($result as $row) {
            $dataArray = explode("-", $row['dataNascimento']);
            $dataConvertida = $dataArray[2]."/".$dataArray[1]."/".$dataArray[0];
            
            echo "<tr>
                    <td><a href=alterarProfessor.php?idProfessor=$row[idProfessor]>$row[idProfessor]</a></td>
                    <td>$row[nome]</td>
                    <td>$row[endereco]</td>
                    <td>$row[telefone]</td>
                    <td>$row[sexo]</td>
                    <td>$dataConvertida</td>
                </tr>";
        } 
        $pdo = null;
    }
?>
            </table>
        </div>
    </div>
</body>
</html>
