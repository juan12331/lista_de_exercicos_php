<?php
namespace App;

use InvalidArgumentException;

class ConfiguracaoJogo {
    public function __construct(
        private int $volume,
        private string $dificuldade,
        private bool $telaCheia
    ) {
        if ($volume < 0 || $volume > 100) {
            throw new InvalidArgumentException("O volume deve estar entre 0 e 100.");
        }

        if ($dificuldade != 'facil' && $dificuldade != 'normal' && $dificuldade != 'dificil') {
            throw new InvalidArgumentException("A dificuldade deve ser facil, normal ou dificil.");
        }
    }

    public function alterarVolume(int $volume): void {
        if ($volume < 0 || $volume > 100) {
            throw new InvalidArgumentException("O volume deve estar entre 0 e 100.");
        }

        $this->volume = $volume;
    }

    public function alterarDificuldade(string $dificuldade): void {
        if ($dificuldade != 'facil' && $dificuldade != 'normal' && $dificuldade != 'dificil') {
            throw new InvalidArgumentException("A dificuldade deve ser facil, normal ou dificil.");
        }

        $this->dificuldade = $dificuldade;
    }

    public function alternarTelaCheia(): void {
        $this->telaCheia = !$this->telaCheia;
    }

    public function resumo(): string {
        $tela = $this->telaCheia ? "Ativada" : "Desativada";

        return "Volume: {$this->volume} | Dificuldade: {$this->dificuldade} | Tela cheia: {$tela}";
    }
}