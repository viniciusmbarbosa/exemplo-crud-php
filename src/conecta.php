<?php
// Conecta.php

/* Esse será o nosso script de conexão do servidor de Banco de Dados */


// Parâmetros
$servidor = "localhost";
$usuario = "root"; 
$senha = "";
$banco = "vendas";

/* Configurações para conexão (API/Driver de conexão: PDO (PHP Data Object))*/

try{
    // Instância/Objeto PDO para conexão
    $conexao = new PDO(
        "mysql:hot=$servidor;dbname=$banco;charset=utf8", 
        $usuario, $senha
    );
    
    // Habilitar a verificação e sinalização de erros (exceções)
    $conexao->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
        
}catch(Exception $erro){

    /* Exception é uma classe/tipo de dados voltado para tratamento de exceções (erros) */
    die("Deu ruim!".$erro->getCode());
}

?>