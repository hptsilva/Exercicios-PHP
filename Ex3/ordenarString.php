<?php

/**
* Ordena em ordem crescente um array de acordo com o número de strings. Se duas strings forem de tamanhos iguais, mantenha na possição original.
* @param array Array de strings.
* @return array O novo array ordenado.
**/
function ordenarStrings($arrayStrings) {

    for ($i = 0; $i < count($arrayStrings); $i++) {

        for ($j = 0; $j < count($arrayStrings); $j++) {

            if (strlen($arrayStrings[$i]) < strlen($arrayStrings[$j])) {

                $stringAtual =  $arrayStrings[$i];
                $stringComparada = $arrayStrings[$j];

                $arrayStrings[$i] = $stringComparada;
                $arrayStrings[$j] = $stringAtual;

            }

        }

    }

    return $arrayStrings;

}

// Caso 1
$strings = ['abcd', 'ab', 'bcc', 'a'];
$valorEsperado = ['a', 'ab', 'bcc', 'abcd'];
$resultado = ordenarStrings($strings);
casosDeTestes(1, $valorEsperado, $resultado);

// Caso 2
$strings = ['a', 'ab', 'abcd', 'aaa'];
$valorEsperado = ['a', 'ab', 'aaa', 'abcd'];
$resultado = ordenarStrings($strings);
casosDeTestes(2, $valorEsperado, $resultado);

// Caso 3
$strings = ['a', 'ab', 'aaa', 'aaaa'];
$valorEsperado = ['a', 'ab', 'aaa', 'aaaa'];
$resultado = ordenarStrings($strings);
casosDeTestes(3, $valorEsperado, $resultado);

// Caso 4
$strings = ['aaa', 'a', 'ab', 'bc', 'ab'];
$valorEsperado = ['a', 'ab', 'bc', 'ab', 'aaa'];
$resultado = ordenarStrings($strings);
casosDeTestes(4, $valorEsperado, $resultado);

function casosDeTestes($caso, $valorEsperado, $valorObtido) {

    if ($valorEsperado != $valorObtido) {

        echo "\nCaso $caso não passou.";
        echo "\nValor Esperado: " ;
        print_r($valorEsperado);
        echo "\nValor Obtido: ";
        print_r($valorObtido);
        echo "\n----------------------------------";

    } else {

        echo "\nCaso $caso passou.";
        echo "\n----------------------------------";

    }

}

