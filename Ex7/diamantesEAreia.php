<?php

/**
* João está trabalhando em uma mina, tentando retirar o máximo que consegue de diamantes "<>". Ele deve excluir todas as particulas de areia "." do processo e a cada retirada de diamante, novos diamantes poderão se formar. Se ele tem como uma entrada .<...<<..>>....>....>>>., três diamantes são formados. O primeiro é retirado de <..>, resultando  .<...<>....>....>>>. Em seguida o segundo diamante é retirado, restando .<.......>....>>>. O terceiro diamante é então retirado, restando no final .....>>>., sem possibilidade de extração de novo diamante.
* @param array Array de strings.
* @return array O novo array ordenado.
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

