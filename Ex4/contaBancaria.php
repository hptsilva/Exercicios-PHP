<?php

class ContaBancaria {

    private $numeroConta;
    public $nomeTitulo;
    private $saldo;

    public function __construct(int $numeroConta, string $nomeTitulo, float $saldo)
    {

        $this->numeroConta = $numeroConta;
        $this->nomeTitulo = $nomeTitulo;
        $this->saldo = $saldo;

    }

    public function getNumeroConta()
    {
        return $this->numeroConta;
    }

    public function setNumeroConta($numeroConta)
    {
        $this->numeroConta = $numeroConta;
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }

    public function conta()
    {
        echo "\n---------------------------------------";
        echo "\nNúmero da Conta: $this->numeroConta";
        echo "\nNome do Titular: $this->nomeTitulo";
        echo "\nSaldo: $this->saldo";
        echo "\n---------------------------------------";
    }

    public function depositar(float $valor)
    {
        $saldoAtual = $this->getSaldo();
        $this->setSaldo($saldoAtual + $valor);
        echo "\nValor atual é de: $this->saldo";
    }

    public function sacar(float $valor)
    {
        $saldoRestante = $this->getSaldo() - $valor;
        if ($saldoRestante < 0) {
            echo "\nSaldo insuficiente";
        } else {
            $this->setSaldo($saldoRestante);
            echo "\nNovo Saldo: $this->saldo";
        }
    }
}

$conta = new ContaBancaria(1, "Humberto Pereira Teixeira Silva", 1000);

$conta->conta();
$conta->depositar(1200);
$conta->sacar(300);
$conta->conta();
$conta->sacar(2000);
