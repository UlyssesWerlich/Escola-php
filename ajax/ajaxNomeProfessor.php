<?php
    if (!empty($_GET['nomeConsulta']) || !empty($_GET['idConsulta'])){
        try{
            $pdo=new PDO("mysql:host=localhost;dbname=escola","root","password");
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $nomeConsulta = ((!empty($_GET['nomeConsulta']))?(" or nome like '$_GET[nomeConsulta]%' "):(""));
        $idConsulta = $_GET['idConsulta'];

        $consultar=$pdo->prepare("SELECT idProfessor, nome from professor 
                                        where idProfessor = '$idConsulta' $nomeConsulta limit 1;");
        $consultar->execute();
    
        $result = $consultar->fetchAll();

        foreach ($result as $row) {
            echo "$row[idProfessor]<td>$row[nome]";
        } 
        $pdo = null;
    }
?>