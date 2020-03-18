                        <tr>
                            <td>Matrícula</td>
                            <td>Nome</td>
                            <td>Endereço</td>
                            <td>Telefone</td>
                            <td>Sexo</td>
                            <td>Data de Nascimento</td>
                        </tr>


<?php
    if (isset($_GET['nomeConsulta'])){
        try{
            $pdo=new PDO("mysql:host=localhost;dbname=escola","root","password");
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $nomeConsulta = $_GET['nomeConsulta'];
        $consultar=$pdo->prepare("SELECT idProfessor, nome, endereco, telefone, sexo, dataNascimento from professor where nome like '$nomeConsulta%';");
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