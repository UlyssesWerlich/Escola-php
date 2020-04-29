<?php
    if (!empty($_GET['nomeConsulta']) || !empty($_GET['idConsulta'])){
        require_once '../dao/professor.dao.php';
        $nomeConsulta = $_GET['nomeConsulta'];
        $idConsulta = $_GET['idConsulta'];    
        $result = findByName($nomeConsulta, $idConsulta );

        foreach ($result as $row) {
            echo "$row[idProfessor]<td>$row[nome]";
        } 
    }
?>