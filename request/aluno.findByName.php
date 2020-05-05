<?php
    if (!empty($_GET['nome'])){

        include '../models/aluno.model.php';
        $aluno = new Aluno($_GET);
        $resultado = $aluno->findByName();

        foreach ($resultado as $linha) {
?>
            <tr>
                <td><a href="javascript:adicionarAluno('<?php echo $linha['matricula'] ?>', '<?php echo $linha['nome'] ?>')">Adicionar Aluno</a></td>
                <td><?php echo $linha['matricula'] ?></td>
                <td><?php echo $linha['nome'] ?></td>
            </tr>
<?php
        }
    }
?>