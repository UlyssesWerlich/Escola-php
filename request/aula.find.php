<?php

    if (isset($_GET['materia']) || isset($_GET['curso']) 
    || isset($_GET['turno']) || isset($_GET['turno']) || isset($_GET['turno'])){

        include '../models/aula.model.php';
        $aula = new Aula($_GET);
        $professorNome = $_GET['professorNome'];
        $resultado = $aula->toList($professorNome);
    
        foreach ($resultado as $linha) {
?>
            <tr>
                <td><a href='?controller=Aula&method=edit&idAula=<?php echo $linha['idAula'] ?>' ><?php echo $linha['materia'] ?></a></td>
                <td><?php echo $linha['curso'] ?></td>
                <td><?php echo $linha['diaSemana'] ?></td>
                <td><?php echo $linha['professor'] ?></td>
                <td><?php echo $linha['horaInicio'] ?></td>
                <td><?php echo $linha['horaTermino'] ?></td>
                <td><a href='?controller=Turma&method=edit&idAula=<?php echo $linha['idAula'] ?>&materia=<?php echo $linha['materia'] ?>&curso=<?php echo $linha['curso'] ?>'>Lista de alunos</a></td>
            </tr>
<?php   }   
    }
?>

    