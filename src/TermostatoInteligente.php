<?php
namespace App;

use InvalidArgumentException;

class TermostatoInteligente {
    public function __construct(
        private float $temperaturaAtual, 
        private float $temperaturaAlvo,
        private bool $ligado
    ) {
        $this->validarTermostato($this->temperaturaAlvo);
    }

    private function validarTermostato($temperaturaAlvo): void {
        if ($temperaturaAlvo > 30 || $temperaturaAlvo < 16){
            throw new InvalidArgumentException("A temperatura alvo deve ficar entre 16°C e 30°C.");
        }
    }

    public function ligar(): void {
        $this->ligado = True;
    }

    public function desligar(): void {
        $this->ligado = False;
    }

    public function definirTemperaturaAlvo(float $temperatura): void {
        if ($this->temperaturaAlvo > 30 || $this->temperaturaAlvo < 16){
            throw new InvalidArgumentException("A temperatura alvo deve ficar entre 16°C e 30°C.");
            return;
        }
        $this->temperaturaAlvo = $temperatura;
    }
    public function atualizarTemperaturaAtual(float $temperatura): void {
        $this->temperaturaAtual = $temperatura;
    }
    public function acaoNecessaria(): string{
        if ($this->ligado){
            if($this->temperaturaAlvo > $this->temperaturaAtual){
                return "aquecer";
            }
            if($this->temperaturaAlvo < $this->temperaturaAtual){
                return "resfriar";
            }
            return "manter";
        }
        return "desligado";
    }
}
