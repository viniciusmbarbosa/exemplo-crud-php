<?php
/* Importando as funções de fabricantes */
require_once "../src/funcoes-fabricantes.php";

/* Obtendo e sanitizando o valor vindo do parâmetro de URL 
(link dinâmico) */
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

/* Chamando a função e recuperando os dados de um
fabricante de acordo com o id passado. */
$fabricante = lerUmFabricante($conexao, $id);

/* Verificar se o formulário foi acionado */
if( isset($_POST['atualizar']) ){
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    atualizarFabricante($conexao, $nome, $id);
    
    header("location:visualizar.php?status=sucesso");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Atualização</title>
</head>
<body>
    <h1>Fabricantes | SELECT/UPDATE</h1>
    <hr>

    <form action="" method="post">
        <!-- Campo oculto usado apenas para registro no formulário
        do id do fabricante que está sendo visualizado. -->
        <input type="hidden" name="id" value="<?=$fabricante['id']?>">
        <p>
            <label for="nome">Nome:</label>
            <input value="<?=$fabricante['nome']?>" required type="text" name="nome" id="nome">
        </p>
        <button type="submit" name="atualizar">
            Atualizar fabricante</button>
    </form>

    <hr>
    <p><a href="visualizar.php">Voltar</a></p>

</body>
</html>