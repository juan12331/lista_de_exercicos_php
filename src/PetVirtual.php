<?php
namespace App;

use InvalidArgumentException;

class PetVirtual {
    public function __construct(
        private string $nome, 
        private float $fome,
        private float $energia,
        private float $felicidade
    ) {
        $this->validarAluno($this->nome, $this->fome, $this->energia, $this->felicidade);
    }

    private function validarAluno(string $nome, float $fome, float $energia, float $felicidade): void {
        if ($nome == '' || $fome > 100 || $fome < 0 || $energia > 100 || $energia < 0 || $felicidade > 100 || $felicidade < 0) {
            throw new InvalidArgumentException("valores de fome, energia, e felicidade devem estar em uma escala de 0 a 100 e o nome não pode estar vazio");
        }
    }

    private function limitar(int $valor): int {
        return max(0, min(100, $valor));
    }
    
    public function alimentar(): void {
        $this->fome = $this->limitar(100);
        $this->felicidade = $this->limitar($this->felicidade + 10);
    }

    public function brincar(): void {
        if ($this->energia - 10 < 0 || $this->fome - 10 < 0) {
            echo "impossível brincar, muito cansado/faminto";
            return;
        }

        $this->energia = $this->limitar($this->energia - 10);
        $this->fome = $this->limitar($this->fome - 10);
        $this->felicidade = $this->limitar($this->felicidade + 10);
    }

    public function dormir(): void {
        if ($this->fome < 10) {
            echo "impossível dormir, muito faminto";
            return;
        }

        $this->fome = $this->limitar($this->fome - 10);
        $this->felicidade = $this->limitar(50);
        $this->energia = $this->limitar(100);
    }

    public function status(): string {
        return "Pet: {$this->nome} | Fome: {$this->fome} | Energia: {$this->energia} | Felicidade: {$this->felicidade}";
    }
}
```

Só uma observação: mantive **`validarAluno()`** porque estava no seu código, embora o nome provavelmente devesse ser `validarPet()` ou `validarDados()`. Não precisa mudar se o professor não exigiu o nome.
