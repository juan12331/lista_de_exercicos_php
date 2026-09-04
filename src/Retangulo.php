<?php

namespace App;
use InvalidArgumentException;

class Retangulo {
    public function __construct(
        private float $altura, 
        private float $largura
    ) {
        $this->validarDimensoes($this->altura, $this->largura);
    }
         
    private function validarDimensoes(float $altura, float $largura): void {
        if ($altura <= 0 || $largura <= 0) {
            throw new InvalidArgumentException("A altura e a largura devem ser maiores que zero.");
        }
    }

    public function ehQuadrado(): bool {
        return $this->altura == $this->largura;
    }

    public function calcularPerimetro(): float {
        return (2 * $this->altura) + (2 * $this->largura);
    }

    public function calcularArea(): float {
        return $this->altura * $this->largura;
    }

    public function redimensionar(float $altura, float $largura): void {   
        $this->validarDimensoes($altura, $largura);     
        $this->altura = $altura;
        $this->largura = $largura;
    }
}