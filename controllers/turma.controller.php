<?php
    require_once '../dao/turma.dao.php';
    if ((isset($_POST['idAula'])) and (isset($_POST['matriculas']))){
        $idAula = $_POST['idAula'];
        $matriculas = $_POST['matriculas'];

        $message = updateList($idAula, $matriculas);
    };
    header('Location: ../views/aula.request.php?message='.$message);
?>