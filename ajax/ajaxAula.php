                        <tr>
                            <td>Matéria</td>
                            <td>Curso</td>
                            <td>Dia da Semana</td>
                            <td>Professor</td>
                            <td>Hora de Inicio</td>
                            <td>Hora Término</td>
                            <td>Ação</td>
                        </tr>


<?php

        try{
            $pdo=new PDO("mysql:host=localhost;dbname=escola","root","password");
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        $materiaConsulta = $_GET['materiaConsulta'];
        $cursoConsulta = $_GET['cursoConsulta'];
        $professorConsulta = $_GET['professorConsulta'];
        $diaSemana = $_GET['diaSemana'];
        $turno = $_GET['turno'];

        $consultar=$pdo->prepare("SELECT idAula, materia, curso, diaSemana, p.nome as professor, horaInicio, horaTermino
                                        from aula a join professor p on a.idProfessor = p.idProfessor 
                                        where a.materia like '$materiaConsulta%' 
                                            AND a.curso like '$cursoConsulta%' 
                                            AND p.nome like '$professorConsulta%' 
                                            AND a.diaSemana like '$diaSemana' 
                                            AND a.turno like '$turno' limit 4;");

        $consultar->execute();
        $result = $consultar->fetchAll();

        foreach ($result as $row) {
            ?>
            <tr>
                <td><a href='alterarAula.php?idAula=<?php echo $row['idAula'] ?>' ><?php echo $row['materia'] ?></a></td>
                <td><?php echo $row['curso'] ?></td>
                <td><?php echo $row['diaSemana'] ?></td>
                <td><?php echo $row['professor'] ?></td>
                <td><?php echo $row['horaInicio'] ?></td>
                <td><?php echo $row['horaTermino'] ?></td>
                <td><a href='cadastroTurma.php?idAula=<?php echo $row['idAula'] ?>&materia=<?php echo $row['materia'] ?>&curso=<?php echo $row['curso'] ?>'>Lista de alunos</a></td>
            </tr>

            <?php
        } 
        $pdo = null;
    
?>