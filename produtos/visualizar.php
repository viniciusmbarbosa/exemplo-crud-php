<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/funcaoes-utilitarias.php";

$listaDeProdutos = lerProdutos($conexao);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Visualização</title>

    <style>
        * { box-sizing: border-box; }

        .produtos {
            font-family: 'Segoe UI';
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            width: 80%;
            margin: auto;
        }

        .produto {
            background-color: #FFF5EE;
            padding: 1rem;
            width: 49%;
            box-shadow: rgba(0,0,0,0.3) 0 0 3px 1px;
        }
    </style>

</head>
<body>
    <div class="container">
        <h1>Produtos | SELECT - <a href="../index.php">Home</a> </h1>
        <hr>
        <h2>Lendo e carregando todos os produtos.</h2>
        <p><a href="inserir.php">
            Inserir novo produto</a></p>
        <div class="produtos">
            
            <?php foreach($listaDeProdutos as $produto) {  ?>
            <article class="produto">
                <h3><?=$produto['nome']?></h3>
                <p><b>Preço:</b><?=formaTarpreco($produto["preco"])?> </p>
                <p><b>Quantidade:</b><?=$produto["quantidade"]?></p>
            </article>
            <?php } ?>
        </div>
    </div>

</body>
</html>