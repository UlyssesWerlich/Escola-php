<?php
    $materiaConsulta = $_GET['materiaConsulta'];
    $cursoConsulta = $_GET['cursoConsulta'];
    $professorConsulta = $_GET['professorConsulta'];
    $diaSemana = $_GET['diaSemana'];
    $turno = $_GET['turno'];

    require_once '../dao/aula.dao.php';
    $result = toList($materiaConsulta, $cursoConsulta, $professorConsulta, $diaSemana, $turno);

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
?>