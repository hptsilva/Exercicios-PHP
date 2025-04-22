<?php

/**
 * Leia um valor inteiro. A seguir, calcule o menor número de notas possíveis (cédulas) no qual o valor pode ser decomposto. As notas consideradas são de 200, 100, 50, 20, 10, 5, 2 e 1. A seguir mostre o valor lido e a relação de notas necessárias.
 * Entrada: O arquivo de entrada contém um valor inteiro N (0 < N < 1000000).
 * Saída: Imprima o valor lido e, em seguida, a quantidade mínima de notas de cada tipo necessárias, conforme o exemplo fornecido. Não esqueça de imprimir o fim de linha após cada linha, caso contrário seu programa apresentará a mensagem: “Presentation Error”.
 * @param int $r1 Número de tomadas da régua 1.
 */
function cedulas($valor) {

    $cedulas = [200, 100, 50, 20, 10, 5, 2, 1];
    foreach ($cedulas as $cedula) {

        $divisao = $valor / $cedula;

        if ($divisao >= 0){
            $qtdNotas = intval($divisao);
            echo "$qtdNotas notas(s) de R$$cedula,00\n";
            $valor -= $qtdNotas*$cedula;
        }

    }
    echo "----------------------------------\n";


}

// Caso 1
cedulas(576);
// Caso 2
cedulas(11257);
// Caso 3
cedulas(503);




