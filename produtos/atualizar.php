<?php
require_once "../src/funcoes-produtos.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$produto 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos atualização - </title>
</head>

<body>
    <h1>Produtos | SELECT UPDATE</h1>
    <hr>

    <form action="" method="post">
        <p>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required>
        </p>
        <p>
            <label for="preco">Preço:</label>
            <input type="number" min="10" max="1000" step="0.01" name="preco" id="preco" required>
        </p>

        <p>
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" min="1" max="100" id="quantidade" required>
        </p>
        <p>
            <label for="fabricanteid">Fabricante:</label>

            <select name="fabricanteid" id="fabricanteid">
                <option value="fabricanteid"></option>

            </select>
        </p>

        <p><label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" cols="30" rows="3"></textarea>
        </p>
        <button type="submit" name="atualizar">atualizar produto</button>
    </form>
    <hr>
    <p><a href="visualizar.php">Voltar</a></p>
</body>

</html>