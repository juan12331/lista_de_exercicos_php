<?php
namespace App;

use InvalidArgumentException;

class CarteiraDigital {
    public function __construct(
        private string $proprietario,
        private float $saldo,
        private float $limiteDiario,
        private float $gastoHoje = 0
    ) {
        if ($proprietario == '' || $saldo < 0 || $limiteDiario <= 0) {
            throw new InvalidArgumentException("Proprietário não pode estar vazio, saldo deve ser maior ou igual a zero e limite diário deve ser positivo.");
        }
    }

    public function receber(float $valor): void {
        if ($valor <= 0) {
            throw new InvalidArgumentException("O valor recebido deve ser positivo.");
        }

        $this->saldo += $valor;
    }

    private function validarPagamento(float $valor): void {
        if ($valor <= 0) {
            throw new InvalidArgumentException("O valor do pagamento deve ser positivo.");
        }

        if ($valor > $this->saldo) {
            throw new InvalidArgumentException("Saldo insuficiente.");
        }

        if ($this->gastoHoje + $valor > $this->limiteDiario) {
            throw new InvalidArgumentException("O pagamento ultrapassa o limite diário.");
        }
    }

    public function pagarPix(float $valor): void {
        $this->validarPagamento($valor);

        $this->saldo -= $valor;
        $this->gastoHoje += $valor;
    }

    public function iniciarNovoDia(): void {
        $this->gastoHoje = 0;
    }

    public function consultarSaldo(): float {
        return $this->saldo;
    }

    public function consultarLimiteDisponivel(): float {
        return $this->limiteDiario - $this->gastoHoje;
    }

    public function resumo(): string {
        return "Proprietário: {$this->proprietario} | Saldo: {$this->saldo} | Limite diário: {$this->limiteDiario} | Gasto hoje: {$this->gastoHoje}";
    }
}