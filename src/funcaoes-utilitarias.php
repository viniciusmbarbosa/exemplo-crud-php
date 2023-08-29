<?php 
function formaTarPreco( float $preco):string {
    $precoFormatado = number_format($preco,2, ',', '.');
    $precoFormatado = "R$" . $precoFormatado;

    return $precoFormatado;
}


?>