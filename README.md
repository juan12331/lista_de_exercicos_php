# lista_de_exercicos_php


Instruções gerais
 Projeto base: utilize o mesmo projeto PHP usado nas aulas. Não crie um projeto separado para cada
exercício.
 Uma classe por exercício: cada exercício deve resultar em uma nova classe, seguindo a organização
já adotada no projeto base.
 Propriedades tipadas: declare tipos adequados para o estado dos objetos e utilize construtores para
iniciar instâncias válidas.
 Encapsulamento: o estado que não deve ser alterado livremente deve permanecer privado. As
mudanças devem acontecer por métodos que expressem ações do domínio.
 Visibilidade: use public para operações que o código externo pode executar e private para detalhes
internos da classe. Não é necessário utilizar protected nesta lista, pois herança ainda não faz parte do
conteúdo trabalhado.
 Validações: quando uma operação puder gerar um estado inválido, impeça a alteração e sinalize o
problema de forma apropriada, podendo utilizar exceções conforme visto em aula.
 Testes: todos os exercícios devem ser testados no arquivo index.php. Crie objetos, execute os métodos
e exiba resultados suficientes para demonstrar que as regras foram respeitadas.
 Sem antecipar conteúdo: não utilize herança, interfaces, traits, enums, property hooks ou outros
recursos ainda não trabalhados nesta etapa.
Cabeçalho obrigatório em index.php: adicione no início do arquivo um comentário contendo Nome
do aluno, RA, Turma e Disciplina: Programação Orientada a Objetos.
Entrega
 Revise a execução completa do projeto antes de compactar os arquivos.
 Compacte o projeto em um único arquivo .zip.
 Nome sugerido do arquivo: Nome_RA_POO_Unidade3.zip.
 Envie o arquivo .zip na atividade correspondente no Moodle dentro do prazo definido pelo professor.


01. Retângulo - geometria com estado protegido
Um sistema de desenho precisa representar retângulos como objetos. Em vez de espalhar largura, altura e
cálculos pelo programa, a própria classe deve concentrar o estado e as operações geométricas relevantes.
Implementação solicitada
 Crie a classe Retangulo com largura e altura privadas, do tipo float.
 O construtor deve receber largura e altura e impedir valores menores ou iguais a zero.
 Crie métodos públicos para calcular área e perímetro.
 Crie um método público ehQuadrado(): bool, que informe se largura e altura são iguais.
 Crie um método redimensionar(float $largura, float $altura): void que somente aceite novas dimensões
válidas.
 Não permita alteração direta de largura ou altura fora da classe.
Testes obrigatórios em index.php
 Crie pelo menos três instâncias com dimensões diferentes.
 Exiba área, perímetro e se cada objeto representa um quadrado.
 Redimensione uma das instâncias e mostre os resultados antes e depois.
 Tente realizar ao menos uma operação com dimensão inválida e demonstre que o objeto não aceita
esse estado


02. Conta Bancária - o saldo não é uma variável pública
Uma conta bancária precisa preservar a consistência do saldo. O código externo pode solicitar depósitos e
saques, mas não deve conseguir escrever qualquer valor diretamente no saldo.
Implementação solicitada
 Crie a classe ContaBancaria com titular e saldo privados.
 O construtor deve receber o nome do titular e um saldo inicial maior ou igual a zero.
 Implemente depositar(float $valor): void, aceitando somente valores positivos.
 Implemente sacar(float $valor): void, impedindo valores não positivos e saques maiores que o saldo
disponível.
 Implemente consultarSaldo(): float e um método resumo(): string para apresentar o estado atual da
conta.
 Não crie um método que permita definir o saldo diretamente.
Testes obrigatórios em index.php
 Crie pelo menos duas contas com saldos iniciais diferentes.
 Realize depósitos e saques válidos e exiba o saldo após cada operação.
 Teste depósito negativo e saque acima do saldo.
 Demonstre, pelos testes, que cada instância mantém seu próprio estado.


03. Aluno - notas sob responsabilidade do próprio objeto
Um sistema acadêmico precisa representar alunos e suas notas. A média e a situação final não devem ser
calculadas de forma desconectada do aluno, pois fazem parte do comportamento desse conceito.
Implementação solicitada
 Crie a classe Aluno com nome, RA e uma lista de notas como propriedades privadas.
 O construtor deve exigir nome e RA não vazios. A lista de notas deve iniciar vazia.
 Implemente adicionarNota(float $nota): void aceitando somente valores entre 0 e 10.
 Implemente calcularMedia(): float. Defina um comportamento adequado quando ainda não houver
notas.
 Implemente situacao(): string considerando: média maior ou igual a 7 = "Aprovado"; média maior ou
igual a 5 e menor que 7 = "Recuperação"; média menor que 5 = "Reprovado".
 Implemente resumo(): string com identificação do aluno, média e situação.
 O RA não deve possuir uma operação para alteração depois que o objeto for criado.
Testes obrigatórios em index.php
 Crie alunos com conjuntos de notas diferentes, cobrindo as três situações acadêmicas.
 Exiba o resumo de cada aluno.
 Tente inserir pelo menos uma nota inválida e confirme que ela não altera o estado do objeto.


04. Produto de E-commerce - estoque e preço com regras
Em uma loja virtual, preço e estoque são dados sensíveis. Permitir que qualquer parte do sistema faça
$produto->estoque = -10 ou $produto->preco = 0 torna o objeto capaz de representar situações impossíveis.
Implementação solicitada
 Crie a classe ProdutoEstoque com nome, preço e estoque privados.
 O construtor deve exigir nome não vazio, preço maior que zero e estoque inicial maior ou igual a zero.
 Implemente aplicarDesconto(float $percentual): void. Aceite descontos maiores que 0 e no máximo
50%.
 Implemente repor(int $quantidade): void aceitando somente quantidades positivas.
 Implemente reservar(int $quantidade): void impedindo quantidades inválidas e reservas acima do
estoque disponível.
 Crie métodos públicos para consultar preço, estoque e uma descrição resumida do produto.
 Toda alteração de preço ou estoque deve passar pelos métodos da própria classe.
Testes obrigatórios em index.php
 Crie pelo menos dois produtos.
 Aplique desconto em um produto e realize reposição e reserva de estoque.
 Teste desconto acima do limite e reserva maior que o estoque.
 Mostre o estado antes e depois das operações válidas.

05. Termostato Inteligente - um objeto que decide o que fazer
Um termostato residencial não serve apenas para armazenar temperaturas: ele precisa decidir se deve
aquecer, resfriar ou manter o ambiente. Modele somente as informações necessárias para essa
responsabilidade.
Implementação solicitada
 Crie a classe TermostatoInteligente com temperaturaAtual, temperaturaAlvo e ligado como
propriedades privadas.
 O construtor deve receber a temperatura atual e a temperatura alvo. A temperatura alvo deve ficar
entre 16°C e 30°C.
 Implemente ligar(): void e desligar(): void.
 Implemente definirTemperaturaAlvo(float $temperatura): void respeitando o intervalo permitido.
 Implemente atualizarTemperaturaAtual(float $temperatura): void para simular a leitura de um
sensor.
 Implemente acaoNecessaria(): string retornando "desligado", "aquecer", "resfriar" ou "manter",
conforme o estado atual.
 As propriedades não devem ser alteradas diretamente pela index.php.
Testes obrigatórios em index.php
 Teste o termostato desligado e ligado.
 Simule situações em que a temperatura atual está abaixo, acima e igual à temperatura alvo.
 Tente definir uma temperatura alvo fora do intervalo permitido

06. Personagem de RPG - vida, energia e ações válidas
Em um jogo de RPG, um personagem possui estado que muda durante a partida. A classe deve impedir
ações incoerentes, como atacar sem energia, curar além da vida máxima ou continuar agindo depois de
derrotado.
Implementação solicitada
 Crie a classe PersonagemRPG com nome, vidaMaxima, vidaAtual e energia como propriedades
privadas.
 O construtor deve receber nome e vida máxima positiva; o personagem deve iniciar com vidaAtual
igual à vidaMaxima e energia igual a 100.
 Implemente sofrerDano(int $dano): void sem permitir dano negativo e sem deixar a vida abaixo de
zero.
 Implemente curar(int $pontos): void sem permitir valores inválidos e sem ultrapassar a vida máxima.
 Implemente executarAtaque(int $custoEnergia, int $danoBase): int. O método deve impedir ataques se
o personagem estiver derrotado ou sem energia suficiente; quando válido, reduza a energia e retorne
o dano do ataque.
 Implemente descansar(): void para recuperar energia sem ultrapassar 100.
 Implemente estaVivo(): bool e status(): string.
Testes obrigatórios em index.php
 Crie pelo menos dois personagens com valores diferentes de vida máxima.
 Simule dano, cura, ataque e descanso.
 Teste uma tentativa de ataque sem energia suficiente e uma tentativa de cura acima da vida máxima.
 Leve um personagem a zero de vida e demonstre que o objeto bloqueia ações incompatíveis com esse
estado.


07. Pet Virtual - comportamento público, cálculo interno
privado
Um pet virtual possui fome, energia e felicidade. O usuário deve interagir com ele por ações como
alimentar, brincar e dormir, sem manipular diretamente os indicadores internos.
Implementação solicitada
 Crie a classe PetVirtual com nome, fome, energia e felicidade como propriedades privadas.
 Use uma escala de 0 a 100 para fome, energia e felicidade. Defina valores iniciais coerentes no
construtor.
 Implemente alimentar(): void, brincar(): void e dormir(): void. Cada ação deve alterar mais de um
indicador de maneira coerente.
 Nenhum indicador pode ficar abaixo de 0 ou acima de 100.
 Crie um método privado limitar(int $valor): int, ou equivalente, para centralizar a regra que mantém
os indicadores entre 0 e 100.
 Implemente status(): string para apresentar o estado atual do pet.
 A index.php não deve conseguir chamar diretamente o método privado usado internamente.
Testes obrigatórios em index.php
 Crie um pet e execute uma sequência de pelo menos seis ações.
 Exiba o status após cada ação para acompanhar a mudança de estado.
 Repita ações suficientes para provar que nenhum indicador ultrapassa os limites de 0 e 100.
Atenção à visibilidade: o método privado existe para apoiar o funcionamento interno do objeto. O
código externo deve conhecer as ações do pet, não a mecânica usada para limitar seus indicadores.


08. Carteira Digital - pagamentos com limites e invariantes
Uma carteira digital precisa controlar saldo e limite diário. O usuário pode pedir uma transferência, mas a
própria carteira deve decidir se a operação é válida antes de alterar o estado.
Implementação solicitada
 Crie a classe CarteiraDigital com proprietario, saldo, limiteDiario e gastoHoje como propriedades
privadas.
 O construtor deve exigir proprietário não vazio, saldo inicial maior ou igual a zero e limite diário
positivo. gastoHoje deve iniciar em zero.
 Implemente receber(float $valor): void aceitando apenas valores positivos.
 Implemente pagarPix(float $valor): void impedindo valor inválido, saldo insuficiente ou estouro do
limite diário.
 Crie um método privado validarPagamento(float $valor): void, ou equivalente, para concentrar as
regras de validação do pagamento.
 Implemente iniciarNovoDia(): void para zerar somente o gasto diário.
 Implemente consultarSaldo(): float, consultarLimiteDisponivel(): float e resumo(): string.
Testes obrigatórios em index.php
 Realize recebimentos e pagamentos válidos.
 Teste pagamento acima do saldo e pagamento que ultrapasse o limite diário.
 Inicie um novo dia e demonstre que o saldo permanece, mas o limite diário volta a ficar disponível.


09. Configuração de Jogo - identidade, referência e clone
Em um jogo, configurações podem ser compartilhadas por referência ou copiadas para criar um novo
perfil. O objetivo é observar que duas variáveis podem apontar para a mesma instância, enquanto clone
cria um novo objeto.
Implementação solicitada
 Crie a classe ConfiguracaoJogo com volume, dificuldade e telaCheia como propriedades privadas.
 O volume deve permanecer entre 0 e 100. A dificuldade deve aceitar somente "facil", "normal" ou
"dificil".
 Implemente métodos públicos para alterar volume, alterar dificuldade e alternar o modo de tela cheia.
 Implemente resumo(): string para exibir as configurações atuais.
 Mantenha todas as validações dentro da própria classe.
Testes obrigatórios em index.php
 Crie $original como uma nova instância da classe.
 Faça $atalho = $original, altere o objeto por $atalho e exiba também $original para verificar o efeito.
 Compare $original === $atalho e exiba o resultado.
 Crie $copia = clone $original, altere somente $copia e exiba os dois objetos.
 Compare $original === $copia e exiba o resultado.
 Inclua comentários curtos na index.php registrando o que cada comparação demonstra sobre
identidade de objetos.


10. Drone de Entrega - abstração de uma operação moderna
Uma plataforma de entregas autônomas utiliza drones. Quem solicita a entrega não deve manipular
diretamente bateria, carga ou estado de voo: deve apenas pedir operações válidas e deixar o objeto
proteger suas próprias regras.
Implementação solicitada
 Crie a classe DroneEntrega com identificador, bateria, cargaAtualKg, cargaMaximaKg e status como
propriedades privadas.
 O construtor deve receber identificador não vazio e carga máxima positiva. O drone deve iniciar com
bateria em 100, cargaAtualKg em 0 e status "disponivel".
 Implemente carregarPacote(float $peso): void. O peso deve ser positivo, não pode ultrapassar a
capacidade máxima e só pode ser carregado quando o drone estiver disponível.
 Implemente decolar(float $distanciaKm): void. O drone só pode decolar com pacote carregado e
bateria suficiente.
 Defina uma regra simples de consumo de bateria por distância e implemente esse cálculo em um
método privado consumoEstimado(float $distanciaKm): int.
 Ao decolar, desconte a bateria necessária e altere o status para "em_voo".
 Implemente finalizarEntrega(): void para encerrar o voo, zerar a carga e voltar o status para
"disponivel".
 Implemente recarregar(): void para restaurar a bateria para 100, somente quando o drone não estiver
em voo.
 Implemente status(): string para apresentar o estado atual sem expor escrita direta das propriedades.
Testes obrigatórios em index.php
 Execute um ciclo completo: carregar pacote, decolar e finalizar entrega.
 Teste carga acima da capacidade, decolagem sem pacote e uma entrega cuja distância exija mais
bateria do que o disponível.
 Recarregue o drone e demonstre que ele pode voltar a operar.
 Crie uma segunda instância com capacidade diferente para evidenciar que objetos da mesma classe
podem possuir estados distintos.
Critério central: a index.php deve interagir com o drone por suas ações públicas. As decisões de
consumo, capacidade e mudança de estado pertencem à classe.
Entrega final: um único projeto contendo as 10 classes, todos os testes na index.php, comentário de
identificação no início do arquivo e projeto compactado em .zip para envio no Moodle.
