<?php
require_once "../src/funcoes-fabricantes.php";

/* Guardando o retorno/resultado da função lerFabricantes */
$listaDeFabricantes = lerFabricantes($conexao);

/* Contando quantos fabricantes temos na matriz $listaDoFabricante */
$quantidade = count($listaDeFabricantes);
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Fabricantes - Visualização</title>
</head>
<body>
    <header>
        <nav style="text-align:center">
        <a href="/fabricantes/visualizar.php">Home</a>
    </nav>
    </header>
    <div class="text-center">
        <h1>Fabricantes | SELECT </h1>
        <hr>
        <h2>Lendo e carregando todos os fabricantes.</h2>
        <p><a href="inserir.php">Inserir novo fabricante</a>
    </div></p>

    <div class="col-4 container">
        <table class="table table-bordered table-striped table-hover">
            <tr >
                <th>ID</th>
                <th>Nome</th>
                <th>Operações</th>
            </tr>
            <tbody>
                <caption>Lista de fabricantes: <b><?=$quantidade?></b></caption>
            <?php
            foreach ($listaDeFabricantes as $listaDeFabricante){
            ?>
            
                <tr>
        
                    <td><?=$listaDeFabricante['id']?></td>
                    <td><?=$listaDeFabricante['nome']?></td>
                    <td>
                        <a href="#">Editar</a>
                        <a href="#">Excluir</a>
                    </td>
                    <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>
    
</body>
</html>