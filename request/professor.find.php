<?php
    if (isset($_GET['nomeConsulta'])){
        require_once '../dao/professor.dao.php';
        $nomeConsulta = $_GET['nomeConsulta'];
        $result = toList($nomeConsulta);
        foreach ($result as $row) {
            $dataArray = explode("-", $row['dataNascimento']);
            $dataConvertida = $dataArray[2]."/".$dataArray[1]."/".$dataArray[0];
            
            echo "<tr>
                    <td><a href=professor.update.php?idProfessor=$row[idProfessor]>$row[idProfessor]</a></td>
                    <td>$row[nome]</td>
                    <td>$row[endereco]</td>
                    <td>$row[telefone]</td>
                    <td>$row[sexo]</td>
                    <td>$dataConvertida</td>
                </tr>";
        }
    }
?>