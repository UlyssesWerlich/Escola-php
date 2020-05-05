<?php
    if (isset($_GET['nome'])){
        include '../models/professor.model.php';
        $professor = new Professor($_GET);
        $resultado = $professor->toList();

        foreach ($resultado as $linha) {
            $dataArray = explode("-", $linha['dataNascimento']);
            $dataNascimento = $dataArray[2]."/".$dataArray[1]."/".$dataArray[0];
            
            echo "<tr>
                    <td><a href=?controller=Professor&method=edit&idProfessor=$linha[idProfessor]>$linha[idProfessor]</a></td>
                    <td>$linha[nome]</td>
                    <td>$linha[endereco]</td>
                    <td>$linha[telefone]</td>
                    <td>$linha[sexo]</td>
                    <td>$dataNascimento</td>
                </tr>";
        }
    }
?>