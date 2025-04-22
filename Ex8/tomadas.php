<?php

/**
 * Finalmente, o time da Universidade conseguiu a classificação para a Final Nacional da Maratona de Programação da SBC. Os três membros do time e o técnico estão ansiosos para bem representar a Universidade, e além de treinar muito, preparam com todos os detalhes a sua viagem a São Paulo, onde será realizada a Final Nacional. Eles planejam levar na viagem todos os seus vários equipamentos eletrônicos: celular, tablet, notebook, ponto de acesso wifi, câmeras, etc, e sabem que necessitarão de várias tomadas de energia para conectar todos esses equipamentos. Eles foram informados de que ficarão os quatro no mesmo quarto de hotel, mas já foram alertados de que em cada quarto há apenas uma tomada de energia disponível. Precavidos, os três membros do time e o técnico compraram cada um uma régua de tomadas, permitindo assim ligar vários aparelhos na única tomada do quarto de hotel; eles também podem ligar uma régua em outra para aumentar ainda mais o número de tomadas disponíveis. No entanto, como as réguas têm muitas tomadas, eles pediram para você escrever um programa que, dado o número de tomadas em cada régua, determine o número máximo de aparelhos que podem ser conectados à energia num mesmo instante.
 * Entrada: A entrada consiste de uma linha com quatro números inteiros T1, T2, T3, T4, indicando o número de tomadas de cada uma das quatro réguas (2 ≤ Ti ≤ 6).
 * Saída: Seu programa deve produzir uma única linha contendo um único número inteiro, indicando o número máximo de aparelhos que podem ser conectados à energia num mesmo instante.
 * @param int $r1 Número de tomadas da régua 1.
 * @param int $r2 Número de tomadas da régua 2.
 * @param int $r3 Número de tomadas da régua 3.
 * @param int $r4 Número de tomadas da régua 4.
 */
function tomadas($r1, $r2, $r3, $r4) {

    $qtdTomadas = 0;
    $qtdTomadas = ($r1 - 1) + ($r2 - 1) + ($r3 - 1) + ($r4);

    return $qtdTomadas;

}

// Caso 1
$r1 = 2;
$r2 = 4;
$r3 = 2;
$r4 = 3;
$valorEsperado = 8;
$resultado = tomadas($r1, $r2, $r3, $r4);
casosDeTestes(1, $valorEsperado, $resultado);

// Caso 2
$r1 = 2;
$r2 = 4;
$r3 = 3;
$r4 = 2;
$valorEsperado = 8;
$resultado = tomadas($r1, $r2, $r3, $r4);
casosDeTestes(2, $valorEsperado, $resultado);

// Caso 3
$r1 = 2;
$r2 = 2;
$r3 = 2;
$r4 = 2;
$valorEsperado = 5;
$resultado = tomadas($r1, $r2, $r3, $r4);
casosDeTestes(3, $valorEsperado, $resultado);

// Caso 4
$r1 = 6;
$r2 = 6;
$r3 = 6;
$r4 = 6;
$valorEsperado = 21;
$resultado = tomadas($r1, $r2, $r3, $r4);
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
