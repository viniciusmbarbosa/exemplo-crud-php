<?php
/* Importando o script de conexão require_once garante que a importação é feita somente uma vez. */
require_once "conecta.php";

//Usanda em fabricantes/visualizar.php
function lerFabricantes(PDO $conexao){
    $sql = "SELECT * FROM fabricantes ORDER BY nome";

    try {
        /* Método prepare():
        Faz uma preparação/pré-config do comando SQL e guarda em memória (variável consulta)*/
        $consulta = $conexao->prepare($sql);
        
        /* Método execute():
        Executa o comando SQL no banco de dados */
        $consulta->execute();
        
        /* Método fetchAll()
        Biscar todos os dados da consulta como um array associativo. */
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro, burro detectado!".$erro->getMessage());
    }

    


    return $resultado;
}

// Teste
$dados = lerFabricantes($conexao);


//Fim lerFabricantes

//Usada em fabricantes/inserir.php
function inserirFabricante(PDO $conexao, string $nomeDoFabricante){
    
    /* :QualquerCoisa -> isso indica um "named parameter" (parÂmetro nomeado) */
    $sql = "INSERT INTO fabricantes(nome) VALUE(:nome)";

    try {
        $consulta = $conexao->prepare($sql);

        /* bindValue() -> pemirte vincular o valor existente no parâmetro nomeado (:nome) à consulta que será executada. é necessário indicar qual é o parâmetro (:nome), de onde vem o valor ($nomeDoFabricante) e de que tipo ele é (PDO::PARA_STR) */
        $consulta->bindValue(":nome", $nomeDoFabricante, pdo::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
    }
}

// usada em fabricantes/atualizar.php
function lerUmFabricante(PDO $conexao, int $idFabricante){
    $sql = "SELECT * FROM fabricantes  WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $idFabricante, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    } catch (Exception $erro) {
        die("Erro ai carregaar:".$erro->getMessage());
    }
    return $resultado;

} //fim lerUmFabricante

/* Exercício: IMPLEMENTE A FUNÇÃO ABAIXO */
function atualizarFabricante(PDO $conexao, string $nomeDoFabricante, int $idFabricante ){ 
    $sql = "UPDATE fabricantes SET nome = :fabricante WHERE id = :id "; 
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":fabricante", $nomeDoFabricante, PDO::PARAM_STR);
        $consulta->bindValue(":id", $idFabricante, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao iserir:" .$erro->getMessage());
    }
}

?>

<!-- parâmetros 2  -->
