<?php
    include('cabecalho.php');
?>
            <div class='col-sm-9 bloco'>
                <p>Consulta de Professor</p>
                <form method='POST' action='consultaProfessor.php'>
                    <div class="form-group">
                        <input type='text' class="form-control" size='40' id='nomeConsulta' name='nomeConsulta' placeholder='Escreva aqui o nome para consulta' />
                    </div>
                    <input type='submit' class="btn btn-default" name='botao' value='Consultar'/>
                </form>
                <div>
                    <table class='table'>
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
    </div>
</body>
</html>
