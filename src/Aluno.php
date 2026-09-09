<?php
namespace App;

use InvalidArgumentException;

class Aluno {
    public function __construct(
        private string $Nome, 
        private int $RA,
        private array $Notas
    ) {
        $this->validarAluno($this->Nome, $this->RA, $this->Notas);
    }

    private function validarAluno(string $Nome, int $RA, array $Notas): void {
        if ($Nome == '' || $RA == '' || $Notas != []) {
            throw new InvalidArgumentException("Nome não pode ser vazio, RA não pode ser vazio e não deve conter nenhuma nota");
        }
    }
    public function adicionarNota(float $nota): void {
        array_push($this->Notas, $nota);
    }
    public function calcularMedia(): float {
        if ($this->Notas == []) {
            echo "Não tem nenhuma nota para ser tirada média";
            return 0;
        }
        int $resultado;
        foreach ($this->Notas as $Nota ) {
            $resultado += $Nota;
        }
        return $resultado;
    }
    public function situacao(): string {
        float $media = calcularMedia();
        if ($media >= 7){
            return "Aprovado";
        }
        if ($media >= 5){
            return "Recuperação";
        }
        return "Reprovado";
    }

    public function resumo(): string {
        return "Nome:". $this->Nome . "média: " calcularMedia(). "situação: ". situacao();
    }
}