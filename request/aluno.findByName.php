<?php
    if (!empty($_GET['valorConsulta'])){
        $valorConsulta = $_GET['valorConsulta'];

        require_once '../dao/aluno.dao.php';
        $result = findByName($valorConsulta);

        foreach ($result as $row) {
?>
            <tr>
                <td><a href="javascript:adicionarAluno('<?php echo $row['matricula'] ?>', '<?php echo $row['nome'] ?>')">Adicionar Aluno</a></td>
                <td><?php echo $row['matricula'] ?></td>
                <td><?php echo $row['nome'] ?></td>
            </tr>
<?php
        }
    }
?>