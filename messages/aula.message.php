<?php
    $messages = array(
        "Aula cadastrada com sucesso", 
        "Dados alterados com sucesso", 
        "Aula excluída com sucesso", 
        "Turma atualizada com sucesso", 
        5);
?> 
<script>alert("<?php echo $messages[$message]; ?>");</script> 