<?php

/**
* Calcula o numero de dias entre 2 datas.
* As datas passadas sempre serao validas e a primeira data sempre sera menor que a segunda data.
* @param string $dataInicial No formato YYYY-MM-DD
* @param string $dataFinal No formato YYYY-MM-DD
* @return int O numero de dias entre as datas
**/

function calculaDias($dataInicial, $dataFinal) {
	/*
		- Setembro, abril, junho e novembro tem 30 dias, todos os outros meses tem 31 exceto fevereiro que tem 28, exceto nos anos bissextos nos quais ele tem 29.
		- Os anos bissexto tem 366 dias e os demais 365.
		- Todo ano divisivel por 4 e um ano bissexto.
		- A regra acima não e valida para anos divisiveis por 100. Estes anos devem ser divisiveis por 400 para serem anos bissextos. Assim, o ano 1700, 1800, 1900 e 2100 nao sao bissextos, mas 2000 e bissexto.
		- Não e permitido o uso de classes e funcoes de data da linguagem (DateTime, mktime, strtotime, etc).
	*/

	// Decompõe a string $dataInicial e $dataFinal em valores inteiros para dia, mês e ano
	$anoInicial = (int) substr($dataInicial, 0, 4);
	$mesInicial = (int) substr($dataInicial, 5, 2);
	$diaInicial = (int) substr($dataInicial, 8, 2);
	$anoFinal = (int) substr($dataFinal, 0, 4);
	$mesFinal = (int) substr($dataFinal, 5, 2);
	$diaFinal = (int) substr($dataFinal, 8, 2);

	//  Verifica o número de dias partindo como referencia o ano 1 até a data especificada. (No calendário gregoriano não existe ano 0)
	$diasInicio = calculoDias($diaInicial, $mesInicial, $anoInicial);
	$diasFinal = calculoDias($diaFinal, $mesFinal, $anoFinal);

	// Calcula a diferença entre os dias da data inicial e final. O valor retornado é o número de dias entre essas dadas.
	return $diasFinal - $diasInicio;
}

/**
* Verifica se o ano informado é bissexto.
* @param int $ano Ano
* @return bool True para ano bissexto e False para ano não bissexto.
**/
function verificaAnoBissexto($ano) {

	// Todo ano bissexto é divisivel por 4, no entanto, o mesmo não é válido para anos divisíveis por 100. Nesses casos, deve-se ser divisível por 400.
	return ($ano % 400 == 0) || ($ano % 100 != 0 && $ano % 4 == 0) ? True : False;

}

/**
* Informa o número de dias de um mês. 
* Para o mês de Fevereiro, considera se o mês está em um ano bissexto.
* @param int $mes Mês no formato MM
* @param int $ano Ano no formato YYYY
* @return int O número de dias do mês informado.
**/
function calculoDiasMes($mes, $ano) {

	// Dicionario com a quatidade de dias em cada mês, exceto o mês 2 (Fevereiro)
    $diasMes = [
        1 => 31,
        3 => 31,
        4 => 30,
        5 => 31,
        6 => 30,
        7 => 31,
        8 => 31,
        9 => 30,
        10 => 31,
        11 => 30,
        12 => 31
    ];
    
	// Se o mês for igual a 2 (Feveiro)
	if ($mes == 2){
		return verificaAnoBissexto($ano) ? 29 : 28;
	}

    return $diasMes[$mes];
}

/**
* Calcula o número de dias passados partindo como referência o ano 1.
* @param int $dia Dia no formato DD
* @param int $mes Mês no formato MM
* @param int $ano Ano no formato YYYY
* @return int Retorna o número de dias
**/
function calculoDias($dia, $mes, $ano) {
    
	$dias = 0;
    // Adiciona o número de dias de todos os anos do ano 1 até o ano informado.
    for ($i = 1; $i < $ano; $i++) {
		// Se o ano for bissexto, é incrementado 366 dias em $dias ou 365 dias para anos não bissextos
        $dias += verificaAnoBissexto($i) ? 366 : 365;
    }
    
    // Adiciona os dias de todos os meses do ano informado.
    for ($i = 1; $i < $mes; $i++) {
        $dias += calculoDiasMes($i, $ano);
    }
    
    // Adiciona os dias restantes.
    $dias += $dia;
    
	// Retorna o número de dias
    return $dias;
} 


/***** Teste 01 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2018-01-02";
$resultadoEsperado = 1;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("01", $resultadoEsperado, $resultado);

/***** Teste 02 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2018-02-01";
$resultadoEsperado = 31;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("02", $resultadoEsperado, $resultado);

/***** Teste 03 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2018-02-02";
$resultadoEsperado = 32;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("03", $resultadoEsperado, $resultado);

/***** Teste 04 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2018-02-28";
$resultadoEsperado = 58;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("04", $resultadoEsperado, $resultado);

/***** Teste 05 *****/
$dataInicial = "2018-01-15";
$dataFinal = "2018-03-15";
$resultadoEsperado = 59;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("05", $resultadoEsperado, $resultado);

/***** Teste 06 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2019-01-01";
$resultadoEsperado = 365;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("06", $resultadoEsperado, $resultado);

/***** Teste 07 *****/
$dataInicial = "2018-01-01";
$dataFinal = "2020-01-01";
$resultadoEsperado = 730;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("07", $resultadoEsperado, $resultado);

/***** Teste 08 *****/
$dataInicial = "2018-12-31";
$dataFinal = "2019-01-01";
$resultadoEsperado = 1;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("08", $resultadoEsperado, $resultado);

/***** Teste 09 *****/
$dataInicial = "2018-05-31";
$dataFinal = "2018-06-01";
$resultadoEsperado = 1;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("09", $resultadoEsperado, $resultado);

/***** Teste 10 *****/
$dataInicial = "2018-05-31";
$dataFinal = "2019-06-01";
$resultadoEsperado = 366;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("10", $resultadoEsperado, $resultado);

/***** Teste 11 *****/
$dataInicial = "2016-02-01";
$dataFinal = "2016-03-01";
$resultadoEsperado = 29;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("11", $resultadoEsperado, $resultado);

/***** Teste 12 *****/
$dataInicial = "2016-01-01";
$dataFinal = "2016-03-01";
$resultadoEsperado = 60;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("12", $resultadoEsperado, $resultado);

/***** Teste 13 *****/
$dataInicial = "1981-09-21";
$dataFinal = "2009-02-12";
$resultadoEsperado = 10006;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("13", $resultadoEsperado, $resultado);

/***** Teste 14 *****/
$dataInicial = "1981-07-31";
$dataFinal = "2009-02-12";
$resultadoEsperado = 10058;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("14", $resultadoEsperado, $resultado);

/***** Teste 15 *****/
$dataInicial = "2004-03-01";
$dataFinal = "2009-02-12";
$resultadoEsperado = 1809;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("15", $resultadoEsperado, $resultado);

/***** Teste 16 *****/
$dataInicial = "2004-03-01";
$dataFinal = "2009-02-12";
$resultadoEsperado = 1809;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("16", $resultadoEsperado, $resultado);

/***** Teste 17 *****/
$dataInicial = "1900-02-01";
$dataFinal = "1900-03-01";
$resultadoEsperado = 28;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("17", $resultadoEsperado, $resultado);

/***** Teste 18 *****/
$dataInicial = "1899-01-01";
$dataFinal = "1901-01-01";
$resultadoEsperado = 730;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("18", $resultadoEsperado, $resultado);

/***** Teste 19 *****/
$dataInicial = "2000-02-01";
$dataFinal = "2000-03-01";
$resultadoEsperado = 29;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("19", $resultadoEsperado, $resultado);

/***** Teste 20 *****/
$dataInicial = "1999-01-01";
$dataFinal = "2001-01-01";
$resultadoEsperado = 731;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("20", $resultadoEsperado, $resultado);

/***** Teste 21 *****/
$dataInicial = "0001-01-01";
$dataFinal = "0001-01-31";
$resultadoEsperado = 30;
$resultado = calculaDias($dataInicial, $dataFinal);
verificaResultado("21", $resultadoEsperado, $resultado);


function verificaResultado($nTeste, $resultadoEsperado, $resultado) {
	if(intval($resultadoEsperado) == intval($resultado)) {
		echo "Teste $nTeste passou.\n";
	} else {
		echo "Teste $nTeste NAO passou (Resultado esperado = $resultadoEsperado, Resultado obtido = $resultado).\n";
	}
}

?>