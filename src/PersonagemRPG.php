<?php
namespace App;

use InvalidArgumentException;

class PersonagemRPG {
    public function __construct(
        private string $nome, 
        private float $vidaMaxima,
        private float $vidaAtual,
        private float $energia
    ) {
        $this->verificarPersonagem($this->vidaMaxima, $this->vidaAtual);
    }
    private function verificarPersonagem($vidaMax, $vidaAtual): void {
        if ( $vidaMax <= 0 || $vidaMax != $vidaAtual){
            throw new InvalidArgumentException("vida atual ou vida maxima invalida, a vida atual deve ser igual a máxima");
        }
        $this->energia = 100;
    }
    public function sofrerDano(int $dano): void {
        if ($dano < 0) {
            throw new InvalidArgumentException("não é possível dar dano negativo");
        }
        if ($this->vidaAtual < $dano) {
            $this->vidaAtual = 0;
            return;
        }
        $this->vidaAtual = $this->vidaAtual - $dano
    }
    public function curar(int $pontos): void {
        if ($pontos < 0){
            throw new InvalidArgumentException("não é possível dar cura negativa");
        }
         if ($this->vidaAtual + $pontos > $this->vidaMaxima) {
            $this->vidaAtual = $this->vidaMaxima;
            return;
        }
        $this->vidaAtual = $this->vidaAtual + $pontos
    }
    public function executarAtaque(int $custoEnergia, int $danoBase): int {
        if ($this->vidaAtual <= 0  || $this->energia < $custoEnergia) {
            echo "impossível dar dano, personagem nocauteado/morto ou cansado";
            return 0;
        }
        $this->energia = $this->energia - $custoEnergia;
        return $danoBase;
    }
    public function descansar(): void{
        $this->energia = 100;
    }
    public function estaVivo(): bool{
        return $this->vidaAtual > 0;
    }
    public function status(): string{
        return "vida: ". $this->vidaAtual . "\n energia: ". $this->energia
    }
}