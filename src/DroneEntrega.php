<?php
namespace App;

use InvalidArgumentException;

class DroneEntrega {
    public function __construct(
        private string $identificador,
        private int $bateria = 100,
        private float $cargaAtualKg = 0,
        private float $cargaMaximaKg = 0,
        private string $status = 'disponivel'
    ) {
        if ($identificador == '' || $cargaMaximaKg <= 0) {
            throw new InvalidArgumentException("O identificador não pode estar vazio e a carga máxima deve ser positiva.");
        }
    }

    public function carregarPacote(float $peso): void {
        if ($this->status != 'disponivel') {
            throw new InvalidArgumentException("O drone não está disponível para carregar um pacote.");
        }

        if ($peso <= 0) {
            throw new InvalidArgumentException("O peso do pacote deve ser positivo.");
        }

        if ($peso > $this->cargaMaximaKg) {
            throw new InvalidArgumentException("O peso do pacote ultrapassa a capacidade máxima do drone.");
        }

        $this->cargaAtualKg = $peso;
    }

    private function consumoEstimado(float $distanciaKm): int {
        return (int) ceil($distanciaKm * 10);
    }

    public function decolar(float $distanciaKm): void {
        if ($this->cargaAtualKg <= 0) {
            throw new InvalidArgumentException("O drone não pode decolar sem pacote.");
        }

        if ($distanciaKm <= 0) {
            throw new InvalidArgumentException("A distância deve ser positiva.");
        }

        $consumo = $this->consumoEstimado($distanciaKm);

        if ($consumo > $this->bateria) {
            throw new InvalidArgumentException("Bateria insuficiente para realizar a entrega.");
        }

        $this->bateria -= $consumo;
        $this->status = 'em_voo';
    }

    public function finalizarEntrega(): void {
        if ($this->status != 'em_voo') {
            throw new InvalidArgumentException("O drone não está em voo.");
        }

        $this->cargaAtualKg = 0;
        $this->status = 'disponivel';
    }

    public function recarregar(): void {
        if ($this->status == 'em_voo') {
            throw new InvalidArgumentException("Não é possível recarregar o drone durante o voo.");
        }

        $this->bateria = 100;
    }

    public function status(): string {
        return "ID: {$this->identificador} | Bateria: {$this->bateria}% | Carga: {$this->cargaAtualKg}kg | Capacidade: {$this->cargaMaximaKg}kg | Status: {$this->status}";
    }
}