<?php
    require_once '../database/connection.php';

	$titulo = 'Atualização de Turma';
    include('../partials/cabecalho.php');

    if ((isset($_POST['idAula'])) and (isset($_POST['matriculas']))){
        $idAula = $_POST['idAula'];
        $matriculas = $_POST['matriculas'];

        $excluir = $pdo->prepare("DELETE from turma where idAula = '$idAula'");
        $excluir->execute() or die ("Erro ao deletar lista antiga");

        foreach ($matriculas as $matricula){
            $inserir = $pdo->prepare("INSERT INTO turma(idAula, matricula) values('$idAula', '$matricula')");
            $inserir->execute() or die ("Erro ao atualizar nova lista");
        }
        $pdo = null;
        echo "<p>Turma atualizada com sucesso</p>";
    };
?>
    <p><a href='../views/consultaAula.php'>Consultar Aula</a></p>

<?php
    include('../partials/rodape.php');
?>