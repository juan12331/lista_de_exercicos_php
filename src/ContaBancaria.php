<?php
namespace App;

use InvalidArgumentException;

class ContaBancaria {
    public function __construct(
        private string $nome, 
        private float $saldo
    ) {
        $this->validarSaldo($this->saldo);
    }
         
    private function validarDimensoes(float $saldo): void {
        if ($saldo < 0) {
            throw new InvalidArgumentException("saldo inicial deverá ser maior ou igual a zero");
        }
    }

    public function depositar(float $valor): void {
        if ($valor > 0) {
            $this->saldo = $this->saldo + $valor
            return;
        }
        echo "impossível depositar valores negativos";
    }

    public function sacar(float $valor): void {
        if ($valor > 0 || $valor > $this->saldo) {
        }
    }

    public function consultarSaldo(): float {
        return $this->saldo;
    }

    public function resumo(): string {
        return "nome do titular: " . $this->nome. " \n Saldo: " . $this->saldo;
    }
}