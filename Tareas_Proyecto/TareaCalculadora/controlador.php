<?php

require("CalculadoraService.php");

$primerValor = $_GET['primerValor'];
$segundoValor =  $_GET['segundoValor'];
$operacion = $_GET['operacion'];

$calculadora = new CalculadoraService();

if ($operacion == $calculadora::SUMA) {
    $resultado = $calculadora->sumar($primerValor, $segundoValor);
    $oracion =  $resultado;
} elseif($operacion == $calculadora::RESTA) {
    $resultado = $calculadora->restar($primerValor, $segundoValor);
    $oracion =  $resultado;

} elseif($operacion == $calculadora::MULTIPLICA) {
    $resultado = $calculadora->multiplicar($primerValor, $segundoValor);
    $oracion = $resultado;

} elseif($operacion == $calculadora::DIVIDE) {
    $resultado = $calculadora->dividir($primerValor, $segundoValor);
    $oracion = $resultado;

}else {
    $oracion = 'error';
}

// Enviamos el resultado
echo($oracion);
