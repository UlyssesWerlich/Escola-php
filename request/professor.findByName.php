<?php
    if (!empty($_GET['nome']) || !empty($_GET['idProfessor'])){
        include '../models/professor.model.php';
        $professor = new Professor($_GET);
        $resultado = $professor->findByName();

        foreach ($resultado as $linha) {
            echo "$linha[idProfessor]<td>$linha[nome]";
        } 
    }
?>