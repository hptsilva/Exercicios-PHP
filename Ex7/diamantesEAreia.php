<?php

/**
* Mostrar quantos diamantes é possivel extrair de umaa mina.
* Um diamante é representado por <> e poeira é repesentando por .
* @param string Representação em strings de uma mina.
* @return int Quantidade de diamantes na mina
**/
function diamantesEAreia($mina) {

    $qtdDiamantes = 0;
    $pilha = [];

    for($i = 0; $i < strlen($mina); $i++) {

        if ($mina[$i] == "<") {
            array_push($pilha, "<");
        } else if($mina[$i] == ">" && !empty($pilha)) {
            array_pop($pilha);
            $qtdDiamantes++;  
        }

    }

    return $qtdDiamantes;

}

// Caso 1
$mina = ".<...<<..>>....>....>>>.";
$valorEsperado = 3;
$resultado = diamantesEAreia($mina);
casosDeTestes(1, $valorEsperado, $resultado);

// Caso 2
$mina = "<<<..<......<<<<....>";
$valorEsperado = 1;
$resultado = diamantesEAreia($mina);
casosDeTestes(2, $valorEsperado, $resultado);

// Caso 3
$mina = "<..><.<..>>";
$valorEsperado = 3;
$resultado = diamantesEAreia($mina);
casosDeTestes(3, $valorEsperado, $resultado);

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

