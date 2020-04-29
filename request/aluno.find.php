<?php
    if (isset($_GET['nomeConsulta']) || isset($_GET['turmaConsulta']) || isset($_GET['turnoConsulta'])){
        $nomeConsulta = $_GET['nomeConsulta'];
        $turmaConsulta = $_GET['turmaConsulta'];
        $turnoConsulta = $_GET['turnoConsulta'];

        require_once '../dao/aluno.dao.php';
        $result = toList($nomeConsulta, $turmaConsulta, $turnoConsulta);

        foreach ($result as $row) {
            $dataArray = explode("-", $row['dataNascimento']);
            $dataConvertida = $dataArray[2]."/".$dataArray[1]."/".$dataArray[0];

            $turno;
            switch ($row['turno']) {
                case 'M':
                    $turno = 'Matutino';
                    break;
                case 'V':
                    $turno = 'Vespertino';
                    break;
                case 'N':
                    $turno = 'Noturno';
                    break;
            }

            echo "<tr>
                    <td><a href=aluno.update.php?matricula=$row[matricula]>$row[matricula]</a></td>
                    <td>$row[nome]</td>
                    <td>$row[endereco]</td>
                    <td>$row[turma]</td>
                    <td>$turno</td>
                    <td>$dataConvertida</td>
                </tr>";
        } 
    }
?>