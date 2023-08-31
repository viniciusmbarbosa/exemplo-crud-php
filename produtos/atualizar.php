<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/funcoes-fabricantes.php";
$listadeFabricante = lerFabricantes($conexao);

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$produto = lerUmProduto($conexao, $id);

if(isset($_POST['atualizar'])){
  
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
        $fabricanteId = filter_input(INPUT_POST, "fabricante", FILTER_SANITIZE_NUMBER_INT);
    
        $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);
        
        atualizarProduto(
            $conexao, $id, $nome, $preco, $quantidade, $descricao, $fabricanteId
        );
        //Redireciona
        header("location:visualizar.php");
}
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
            <input type="text" value="<?=$produto['nome'
            ]?>" name="nome" id="nome" required>
        </p>
        <p>
            <label for="preco">Preço:</label>
            <input type="number" value="<?=$produto['preco']?>" min="10" max="1000" step="0.01" name="preco" id="preco" required>
        </p>

        <p>
            <label for="quantidade">Quantidade:</label>
            <input type="number" value="<?=$produto['quantidade']?>" name="quantidade" min="1" max="100" id="quantidade" required>
        </p>
        <p>
            <label for="fabricanteid">Fabricante:</label>

            <select name="fabricante" id="fabricante">
                <option value="fabricanteid"></option>

                <?php foreach( $listadeFabricante as $fabricante){
                    /* Lógica/ALgoritmo da seleção do fabricante
                    Se a chave estrangeira for idêntica à chave primária, ou seja, se o id o fabricante do produto (Couluna fabricante_id da tabela produto)
                    for igual ao id do fabricante (coluna id da tabela fabricantes) , então coloque o atributo "selected" no <option> */?>
                <option <?php 
                //chave estrangeira === chave primaria
                if($produto["fabricante_id"] === $fabricante["id"]) echo " selected ";  ?>
                 value="<?=$fabricante['id']?>">
            <?=$fabricante['nome']?>
            </option>
                <?php } ?>
            </select>
        </p>

        <p><label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" cols="30" rows="3"><?=$produto['descricao']?></textarea>
        </p>
        <button type="submit" name="atualizar">atualizar produto</button>
    </form>
    <hr>
    <p><a href="visualizar.php">Voltar</a></p>
</body>

</html>