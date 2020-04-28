<?php
    $messages = array(
        "Aluno adicionado com sucesso", 
        "Dados alterados com sucesso", 
        "Aluno excluído com sucesso", 
        4, 
        5);
?> 
<script>alert("<?php echo $messages[$message]; ?>");</script>   