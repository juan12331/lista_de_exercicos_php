<?php
require_once __DIR__ . '/src/Retangulo.php';
require_once __DIR__ . '/src/ContaBancaria.php';
require_once __DIR__ . '/src/Aluno.php';
require_once __DIR__ . '/src/ProdutoEstoque.php';
require_once __DIR__ . '/src/TermostatoInteligente.php';
require_once __DIR__ . '/src/PersonagemRPG.php';
require_once __DIR__ . '/src/PetVirtual.php';
require_once __DIR__ . '/src/CarteiraDigital.php';
require_once __DIR__ . '/src/ConfiguracaoJogo.php';
require_once __DIR__ . '/src/DroneEntrega.php';
 
use App\Retangulo;
use App\ContaBancaria;
use App\Aluno;
use App\ProdutoEstoque;
use App\TermostatoInteligente;
use App\PersonagemRPG;
use App\PetVirtual;
use App\CarteiraDigital;
use App\ConfiguracaoJogo;
use App\DroneEntrega;
 

 
// 1
 
$r1 = new Retangulo(10, 5);
$r2 = new Retangulo(4, 4);
$r3 = new Retangulo(7.5, 2.5);
 
foreach ([$r1, $r2, $r3] as $i => $r) {
    $n = $i + 1;
    echo "Retângulo {$n} -> Área: {$r->calcularArea()} | Perímetro: {$r->calcularPerimetro()} | É quadrado? " . ($r->ehQuadrado() ? 'Sim' : 'Não') . "\n";
}
 
echo "Antes de redimensionar r1 -> Área: {$r1->calcularArea()}\n";
$r1->redimensionar(20, 10);
echo "Depois de redimensionar r1 -> Área: {$r1->calcularArea()}\n";
 
try {
    $r1->redimensionar(-5, 10);
} catch (InvalidArgumentException $e) {
    echo "Erro esperado ao redimensionar com valor inválido: {$e->getMessage()}\n";
}
 
// 2
 
$conta1 = new ContaBancaria("Ana", 1000);
$conta2 = new ContaBancaria("Bruno", 500);
 
$conta1->depositar(200);
echo "Conta1 após depósito: {$conta1->consultarSaldo()}\n";
$conta1->sacar(150);
echo "Conta1 após saque: {$conta1->consultarSaldo()}\n";
 
$conta2->depositar(50);
echo "Conta2 após depósito: {$conta2->consultarSaldo()}\n";
 
try {
    $conta1->depositar(-100);
} catch (InvalidArgumentException $e) {
    echo "Erro esperado (depósito negativo): {$e->getMessage()}\n";
}
 
try {
    $conta2->sacar(999999);
} catch (InvalidArgumentException $e) {
    echo "Erro esperado (saque acima do saldo): {$e->getMessage()}\n";
}
 
echo $conta1->resumo() . "\n";
echo $conta2->resumo() . " (estado independente da conta1)\n";
 
// 3
 
$alunoAprovado = new Aluno("Carla", "RA001");
$alunoAprovado->adicionarNota(8);
$alunoAprovado->adicionarNota(7.5);
 
$alunoRecuperacao = new Aluno("Diego", "RA002");
$alunoRecuperacao->adicionarNota(6);
$alunoRecuperacao->adicionarNota(5);
 
$alunoReprovado = new Aluno("Elisa", "RA003");
$alunoReprovado->adicionarNota(3);
$alunoReprovado->adicionarNota(4);
 
foreach ([$alunoAprovado, $alunoRecuperacao, $alunoReprovado] as $aluno) {
    echo $aluno->resumo() . "\n";
}
 
try {
    $alunoAprovado->adicionarNota(15);
} catch (InvalidArgumentException $e) {
    echo "Erro esperado (nota inválida): {$e->getMessage()}\n";
}
echo "Média de Carla permanece: {$alunoAprovado->calcularMedia()}\n";
 
// 4

 
$produto1 = new ProdutoEstoque("Teclado Mecânico", 300, 20);
$produto2 = new ProdutoEstoque("Mouse Gamer", 150, 10);
 
echo "Antes: {$produto1->resumo()}\n";
$produto1->aplicarDesconto(10);
$produto1->repor(5);
$produto1->reservar(3);
echo "Depois: {$produto1->resumo()}\n";
 
echo "Produto2: {$produto2->resumo()}\n";
 
try {
    $produto1->aplicarDesconto(80);
} catch (InvalidArgumentException $e) {
    echo "Erro esperado (desconto acima do limite): {$e->getMessage()}\n";
}
 
try {
    $produto2->reservar(9999);
} catch (InvalidArgumentException $e) {
    echo "Erro esperado (reserva maior que o estoque): {$e->getMessage()}\n";
}

// 5 
 
$termostato = new TermostatoInteligente(20, 22);
echo "Desligado -> ação: {$termostato->acaoNecessaria()}\n";
 
$termostato->ligar();
echo "Ligado, atual 20 < alvo 22 -> ação: {$termostato->acaoNecessaria()}\n";
 
$termostato->atualizarTemperaturaAtual(25);
echo "Atual 25 > alvo 22 -> ação: {$termostato->acaoNecessaria()}\n";
 
$termostato->atualizarTemperaturaAtual(22);
echo "Atual 22 == alvo 22 -> ação: {$termostato->acaoNecessaria()}\n";
 
try {
    $termostato->definirTemperaturaAlvo(50);
} catch (InvalidArgumentException $e) {
    echo "Erro esperado (temperatura alvo fora do intervalo): {$e->getMessage()}\n";
}
 
// 6
 
$heroi = new PersonagemRPG("Guerreiro", 100);
$mago = new PersonagemRPG("Mago", 60);
 
$heroi->sofrerDano(30);
echo "Guerreiro após dano: {$heroi->status()}\n";
 
$heroi->curar(10);
echo "Guerreiro após cura: {$heroi->status()}\n";
 
$dano = $heroi->executarAtaque(20, 15);
echo "Guerreiro atacou causando {$dano} de dano. {$heroi->status()}\n";
 
$heroi->descansar();
echo "Guerreiro após descansar: {$heroi->status()}\n";
 
for ($i = 0; $i < 6; $i++) {
    $mago->executarAtaque(20, 10);
}
echo "Mago após vários ataques (deve ficar sem energia): {$mago->status()}\n";
 
$mago->curar(9999);
echo "Mago após tentar curar além da vida máxima (deve permanecer no limite): {$mago->status()}\n";
 
$mago->sofrerDano(9999);
echo "Mago derrotado: {$mago->status()}\n";
$mago->executarAtaque(10, 10);
echo "Tentativa de ataque com personagem derrotado é bloqueada.\n";
 
//7 
 
$pet = new PetVirtual("Rex");
echo "Estado inicial: {$pet->status()}\n";
 
$pet->alimentar();
echo "Após alimentar: {$pet->status()}\n";
$pet->brincar();
echo "Após brincar: {$pet->status()}\n";
$pet->dormir();
echo "Após dormir: {$pet->status()}\n";
$pet->brincar();
echo "Após brincar novamente: {$pet->status()}\n";
$pet->alimentar();
echo "Após alimentar novamente: {$pet->status()}\n";
$pet->dormir();
echo "Após dormir novamente: {$pet->status()}\n";
 
// $pet->limitar(10);
 
// 8 aqu
 
$carteira = new CarteiraDigital("Fernanda", 500, 300);
 
$carteira->receber(200);
echo "Após receber: {$carteira->resumo()}\n";
 
$carteira->pagarPix(100);
echo "Após pagar: {$carteira->resumo()}\n";
 
try {
    $carteira->pagarPix(99999);
} catch (InvalidArgumentException $e) {
    echo "Erro esperado (saldo insuficiente): {$e->getMessage()}\n";
}
 
try {
    $carteira->pagarPix(250);
} catch (InvalidArgumentException $e) {
    echo "Erro esperado (limite diário ultrapassado): {$e->getMessage()}\n";
}
 
$carteira->iniciarNovoDia();
echo "Após iniciar novo dia -> {$carteira->resumo()}\n";
 
// 9 aqu


 
$original = new ConfiguracaoJogo(50, "normal", false);
 
$atalho = $original;
$atalho->alterarVolume(80);
 
echo "original: {$original->resumo()}\n";
echo "atalho:   {$atalho->resumo()}\n";
echo "original === atalho? " . ($original === $atalho ? 'true (mesma instância, por isso ambos mudaram)' : 'false') . "\n";
 
$copia = clone $original;
$copia->alterarDificuldade("dificil");
 
echo "original: {$original->resumo()}\n";
echo "copia:    {$copia->resumo()}\n";
echo "original === copia? " . ($original === $copia ? 'true' : 'false (instâncias diferentes, só a cópia mudou)') . "\n";
 

// 10 aqui
 
$drone1 = new DroneEntrega("DR-001", 10);
$drone2 = new DroneEntrega("DR-002", 25);
 
$drone1->carregarPacote(5);
$drone1->decolar(3);
echo "Drone1 em voo: {$drone1->status()}\n";
$drone1->finalizarEntrega();
echo "Drone1 após finalizar entrega: {$drone1->status()}\n";
 
try {
    $drone1->carregarPacote(999);
} catch (InvalidArgumentException $e) {
    echo "Erro esperado (carga acima da capacidade): {$e->getMessage()}\n";
}
 
try {
    $drone1->decolar(5);
} catch (InvalidArgumentException $e) {
    echo "Erro esperado (decolar sem pacote): {$e->getMessage()}\n";
}
 
$drone1->carregarPacote(2);
try {
    $drone1->decolar(500);
} catch (InvalidArgumentException $e) {
    echo "Erro esperado (bateria insuficiente para a distância): {$e->getMessage()}\n";
}
 
$drone1->recarregar();
echo "Drone1 após recarregar: {$drone1->status()}\n";
 
echo "Drone2 (capacidade diferente): {$drone2->status()}\n";
 