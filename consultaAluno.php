<?php
    $titulo = "Consulta de Aluno";
    include('cabecalho.php');
?>
                <form method='POST' action='consultaAluno.php'>
                    <div class='row'>
                        <div class="form-group col-sm-8">
                            <input type='text' class="form-control" size='40' id='nomeConsulta' name='nomeConsulta' placeholder='Escreva aqui o nome para consulta' />
                        </div>
                        <div class='form-group col-sm-2'>
                            <input type='submit' class="btn btn-default" name='botao' value='Consultar'/>
                        </div>
                    </div>
                </form>
                <div>
                    <table class='table'>
                        <tr>
                            <td>Matrícula</td>
                            <td>Nome</td>
                            <td>Endereço</td>
                            <td>Turma</td>
                            <td>Turno</td>
                            <td>Data de Nascimento</td>
                        </tr>
<?php

    if (isset($_POST['nomeConsulta'])){
        try{
            $pdo=new PDO("mysql:host=localhost;dbname=escola","root","password");
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $nomeConsulta = $_POST['nomeConsulta'];
        $consultar=$pdo->prepare("select * from aluno where nome like '$nomeConsulta%';");
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
        echo "</table>";
        $pdo = null;
    }
    include('rodape.php');
?>
                
                
