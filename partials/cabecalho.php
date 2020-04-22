<html>
    <head>
        <meta charset="utf-8" />
        <title>Escola - Sistema de cadastro</title>
        <link rel="stylesheet" href="../style/css/bootstrap.min.css"/>
        <link rel='stylesheet' href='../style/css/simple-sidebar.css'/>
    </head>

    <body>
        <div class='d-flex'>
            <div class='bg-light border-right' id='sidebar-wrapper'>
                <div class='sidebar-heading'>Escola</div>
                <div class='list-group list-group-flush'>
                    <a href="../views/paginaInicial.php" class='list-group-item list-group-item-action bg-light'>Página inicial</a>
                    <a href="../views/cadastroAluno.php" class='list-group-item list-group-item-action bg-light'>Cadastro de Aluno</a>
                    <a href="../views/consultaAluno.php" class='list-group-item list-group-item-action bg-light'>Consulta de Aluno</a>
                    <a href="../views/cadastroProfessor.php" class='list-group-item list-group-item-action bg-light'>Cadastro de Professor</a>
                    <a href="../views/consultaProfessor.php" class='list-group-item list-group-item-action bg-light'>Consulta de Professor</a>
                    <a href="../views/cadastroAula.php" class='list-group-item list-group-item-action bg-light'>Cadastro de Aula</a>
                    <a href="../views/consultaAula.php" class='list-group-item list-group-item-action bg-light'>Consulta de Aula</a>
                </div>
            </div>

            <div class='container-fluid'>
                <h3 class='mt-3'><?php echo "$titulo"; ?></h3>
        
