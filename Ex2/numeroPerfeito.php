<?php

/**
* Verifica se um número é considerado perfeito.
* @param int $numero Número para verificar se é perfeito.
* @return bool True para número perfeito e False para número imperfeito.
**/
function numeroPerfeito($numero) {

    $soma = 0;

    for ($i = 1; $i < $numero; $i++) {

        ($numero % $i) == 0 ? $soma+= $i : '';

    }

    return ($soma == $numero) ? True : False;

}

// Caso 1
$numero = 28;
$valorEsperado = True;
$resultado = numeroPerfeito($numero);
casosDeTestes(1, $valorEsperado, $resultado);

// Caso 2
$numero = 6;
$valorEsperado = True;
$resultado = numeroPerfeito($numero);
casosDeTestes(2, $valorEsperado, $resultado);

// Caso 3
$numero = 5;
$valorEsperado = False;
$resultado = numeroPerfeito($numero);
casosDeTestes(3, $valorEsperado, $resultado);

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

