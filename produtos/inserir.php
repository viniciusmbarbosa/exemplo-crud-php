<?php
require_once "../src/funcoes-fabricantes.php";
require_once "../src/funcoes-produtos.php";

$listadeFabricante = lerFabricantes($conexao);

if (isset($_POST['inserir'])) {
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = filter_input(
        INPUT_POST,
        "preco",
        FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_FRACTION
    );

    $quantidade = filter_input(
        INPUT_POST,
        "quantidade",
        FILTER_SANITIZE_NUMBER_INT
    );

    //Pegaremos o value, ou seja, o valor do id do fabricante
    $fabricanteid = filter_input(INPUT_POST, "fabricanteid", FILTER_SANITIZE_SPECIAL_CHARS);

    $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);

    inserirProdutos($conexao, $nome, $preco, $quantidade, $fabricanteid, $descricao);

    header("location:visualizar.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserção</title>
</head>

<body>
    <h1>Produtos | INSERT</h1>
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

                <?php foreach ($listadeFabricante as $fabricante) {  ?>
                    <option value="<?= $fabricante['id'] ?>"><?= $fabricante['nome'] ?></option>
                <?php } ?>
            </select>
        </p>

        <p><label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" cols="30" rows="3"></textarea>
        </p>
        <button type="submit" name="inserir">Inserir produto</button>
    </form>
    <hr>
    <p><a href="visualizar.php">Voltar</a></p>
</body>

</html>