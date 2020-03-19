<?php

    if (!empty($_GET['valorConsulta'])){
        try{
            $pdo=new PDO("mysql:host=localhost;dbname=escola","root","password");
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $valorConsulta = $_GET['valorConsulta'];

        $consultar=$pdo->prepare("SELECT * from aluno where (matricula like '$valorConsulta') OR ( nome LIKE '$valorConsulta%') limit 1;");
        $consultar->execute();
    
        $result = $consultar->fetchAll();

        foreach ($result as $row) {
            ?>
            <tr>

                <td><a href="javascript:adicionarAluno('<?php echo $row['matricula'] ?>', '<?php echo $row['nome'] ?>')">Adicionar Aluno</a></td>
                <td><?php echo $row['matricula'] ?></td>
                <td><?php echo $row['nome'] ?></td>
            </tr>

            <?php
        } 
        $pdo = null;
    }
?>