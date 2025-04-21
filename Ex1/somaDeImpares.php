<?php

/**
* Soma os valores ímpares dentro do intervalo fornecido. Ignora os valores inicial e final.
* @param int $numeroInicial Valor inicial do intervalo.
* @param int $numeroFinal Valor final do intervalo.
* @return int A soma dos ímpares do intervalo.
**/
function somarImpares($numeroInicial, $numeroFinal) {

    $resultado = 0;

    for ($i = $numeroInicial + 1; $i < $numeroFinal; $i++) {

        $resto = $i % 2;
        if ($resto != 0) {
            $resultado = $resultado + $i;
        }

    }

    return $resultado;

}

// Caso 1
$numeroInicial = 2;
$numeroFinal = 10;
$valorEsperado = 24;
$resultado = somarImpares($numeroInicial, $numeroFinal);
casosDeTestes(1, $valorEsperado, $resultado);

// Caso 2
$numeroInicial = 3;
$numeroFinal = 3;
$valorEsperado = 0;
$resultado = somarImpares($numeroInicial, $numeroFinal);
casosDeTestes(2, $valorEsperado, $resultado);

// Caso 3
$numeroInicial = 3;
$numeroFinal = 4;
$valorEsperado = 0;
$resultado = somarImpares($numeroInicial, $numeroFinal);
casosDeTestes(3, $valorEsperado, $resultado);

// Caso 4
$numeroInicial = 3;
$numeroFinal = 6;
$valorEsperado = 5;
$resultado = somarImpares($numeroInicial, $numeroFinal);
casosDeTestes(4, $valorEsperado, $resultado);

function casosDeTestes($caso, $valorEsperado, $valorObtido) {

    if ($valorEsperado != $valorObtido) {

        echo "\nCaso $caso não passou.";
        echo "\nValor Esperado: $valorEsperado";
        echo "\nValor Obtido: $valorObtido";
        echo "\n----------------------------------";

    } else {
        
        echo "\nCaso $caso passou.";
        echo "\n----------------------------------";

    }

}

