<?php
require_once "../src/funcoes-fabricantes.php";

/* Obtendo e sanitizando o valor vindo do parâmetro de URL (link dinâmico) */
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


/* Chamando a função e recuperando os dados de um fabricante de acordo com o id passado. */
$fabricante = lerUmFabricante($conexao, $id);
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Fabricante - atualização</title>
</head>
<body>
    <div class="">
        <h1>Fabricantes | SELECT/UPDATE</h1>
        <hr>
        <form action="" method="post" class="">
        
        <!-- Campo oculto usado apenas para restro no formulário do id do fabricante que está sendo visualizado. -->
        <input type="hidden" name="id" value="<?=$fabricante['id']?>">
        
        <p class="col-3">
            <label for="nome" class="form-label">Nome:</label>
            <input value="<?=$fabricante['nome']?>" required class="form-control" type="text" name="nome" id="nome">
        </p>
        <button type="submit" name="atualizar" class="bg-primary rounded">Atualizar fabricante</button>
        </form>

        <hr>
        <p><a href="visualizar.php">Voltar</a></p>
    </div>
    
</body>
</html>