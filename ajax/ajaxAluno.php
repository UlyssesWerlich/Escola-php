
                        <tr>
                            <td>Matrícula</td>
                            <td>Nome</td>
                            <td>Endereço</td>
                            <td>Turma</td>
                            <td>Turno</td>
                            <td>Data de Nascimento</td>
                        </tr>

<?php

    if (isset($_GET['nomeConsulta']) || isset($_GET['turmaConsulta']) || isset($_GET['turnoConsulta'])){
        try{
            $pdo=new PDO("mysql:host=localhost;dbname=escola","root","password");
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $nomeConsulta = $_GET['nomeConsulta'];
        $turmaConsulta = $_GET['turmaConsulta'];
        $turnoConsulta = $_GET['turnoConsulta'];

        $consultar=$pdo->prepare("SELECT * from aluno 
                                        where nome like '$nomeConsulta%' 
                                            AND turma LIKE '$turmaConsulta%' 
                                            AND turno LIKE '$turnoConsulta' ;");
        $consultar->execute();
    
        $result = $consultar->fetchAll();

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
                    <td><a href=alterarAluno.php?matricula=$row[matricula]>$row[matricula]</a></td>
                    <td>$row[nome]</td>
                    <td>$row[endereco]</td>
                    <td>$row[turma]</td>
                    <td>$turno</td>
                    <td>$dataConvertida</td>
                </tr>";
        } 
        $pdo = null;
    }
?>