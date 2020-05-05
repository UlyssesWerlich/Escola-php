<?php
    if (isset($_GET['nome']) || isset($_GET['turma']) || isset($_GET['turno'])){

        include '../models/aluno.model.php';
        $aluno = new Aluno($_GET);

        $resultado = $aluno->toList();

        foreach ($resultado as $linha) {
            $dataArray = explode("-", $linha['dataNascimento']);
            $dataNascimento = $dataArray[2]."/".$dataArray[1]."/".$dataArray[0];

            $turno;
            switch ($linha['turno']) {
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
                    <td><a href=?controller=Aluno&method=edit&matricula=$linha[matricula]>$linha[matricula]</a></td>
                    <td>$linha[nome]</td>
                    <td>$linha[endereco]</td>
                    <td>$linha[turma]</td>
                    <td>$turno</td>
                    <td>$dataNascimento</td>
                </tr>";
        } 
    }
?>