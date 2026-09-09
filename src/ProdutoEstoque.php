<?php
namespace App;

use InvalidArgumentException;

class ProdutoEstoque {
    public function __construct(
        private string $nome, 
        private float $preco,
        private int $estoque
    ) {
        $this->validarProdutoEstoque($this->nome, $this->preco, $this->estoque);
    }

    private function validarProdutoEstoque(string $nome, float $preco, int $estoque): void {
        if ($preco <= 0 || $nome == '' || $estoque <0) {
            throw new InvalidArgumentException("verifique se o preço está maior que zero, se o nome não está vazio ou se o estoque esta maior ou igual a 0");
        }
    }

    public function aplicarDesconto(float $percentual): void {
        if ($percentual <= 0 || 50 < $percentual) {
            echo "percentual do desconto tem que ser maior que zero ou maior que 50%";
            return;
        }
        $this->preco = $this->preco - ($this->preco*$percentual/100);
    }

    public function repor(int $quantidade): void {
        if ($quantidade <= 0 ) {
            throw new InvalidArgumentException("quantidade precisa ser um inteiro positivo");
        }
        $this->estoque = $this->estoque + $quantidade;
    }

    public function reservar(int $quantidade): void {
        if ($quantidade > $this->estoque || $quantidae >= 0){
            throw new InvalidArgumentException("quantidade invalida ou maior igual ");
        }
        $this->estoque -= $quantidade;
    }

    // Crie métodos públicos para consultar preço, estoque e uma descrição resumida do produto

    public function resumo(): string {
        return "Nome: ". $this->nome. "preço: ". $this->preco. "\n estoque:". $this->estoque
    }
}