<?php
/*  Verificando se o formulário/botão foi acionado */
if( isset($_POST['insert'])){

    //Capturando o valor digitado do nome e sanitizando
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    
    // Pode ser assim também
    //$nome = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);

    echo $nome;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="">
        <h1>Fabricantes | INSERT</h1>
        <hr>
        <form action="" method="post" class="">
        <p class="col-3">
            <label for="nome" class="form-label">Nome:</label>
            <input required class="form-control" type="text" name="nome" id="nome">
        </p>
        <button type="submit" name="insert" class="bg-primary rounded">insert fabricante</button>
        </form>
    </div>
    
</body>
</html>