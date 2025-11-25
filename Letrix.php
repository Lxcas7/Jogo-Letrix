<?php


$palavras = [
    "abacates" => "Fruta tropical de polpa verde.",
    "montanha" => "Elevação natural muito alta.",
    "telefone" => "Usado para se comunicar à distância.",
    "cachorro" => "Animal considerado o melhor amigo do homem.",
    "girassol" => "Planta que segue a luz do sol.",
    "formigas" => "Inseto pequeno que vive em colônia.",
    "gramados" => "Áreas cobertas de grama.",
    "oceânico" => "Relacionado ao mar profundo.",
    "esmaltes" => "Produtos usados para pintar unhas.",
    "carreata" => "Várias pessoas seguindo em veículos.",
    "abacaxis" => "Fruta de polpa amarela e sabor ácido.",
    "pandeiro" => "Instrumento musical de percussão.",
    "ventania" => "Vento forte.",
    "parqueio" => "Local para estacionar veículos.",
    "compasso" => "Instrumento usado para medir círculos.",
    "caminhar" => "Ato de andar de forma leve.",
    "floresta" => "Grande área com muitas árvores.",
    "notebook" => "Computador portátil.",
    "aviadora" => "Pessoa que pilota aeronaves.",
    "vassoura" => "Objeto para varrer o chão.",
    "castelos" => "Construções antigas de reis.",
    "abstrato" => "Algo não concreto.",
    "misturar" => "Juntar diferentes elementos.",
    "planetas" => "Corpos celestes que orbitam estrelas.",
    "diamante" => "Pedra preciosa muito valiosa.",
    "carrinho" => "Veículo usado por crianças.",
    "elefante" => "Maior animal terrestre.",
    "canavial" => "Plantação de cana-de-açúcar.",
    "esfregar" => "Ato de limpar friccionando.",
    "cobertor" => "Aquece durante o frio.",
    "quadrado" => "Forma geométrica com 4 lados iguais.",
    "cimentos" => "Material usado na construção(plural).",
    "pinturas" => "Obras feitas com tinta.",
    "editoras" => "Empresas que publicam livros.",
    "garrafas" => "Recipientes cilíndricos para líquidos.",
    "morangos" => "Frutas vermelhas pequenas.",
    "peneiras" => "Usadas para separar partículas.",
    "aeróbico" => "Exercícios que usam oxigênio.",
    "voadores" => "Animais que conseguem voar.",
    "carnaval" => "Festa popular brasileira.",
    "lareiras" => "Usadas para aquecer ambientes.",
    "caldeira" => "Equipamento que produz vapor.",
    "espelhos" => "Refletem imagens.",
    "armários" => "Usados para guardar itens.",
    "tapeteão" => "Peça grande usada no chão.",
    "diversão" => "Algo divertido de se fazer.",
    "mochilas" => "Usadas para carregar objetos.",
    "montagem" => "Processo de juntar peças.",
    "escritas" => "Palavras colocadas no papel.",
    "polvilho" => "Ingrediente usado em biscoitos.",
    "camiseta" => "Peça básica de roupa.",
    "cavalete" => "Suporte para objetos.",
    "cartazes" => "Folhas grandes para anúncios.",
    "serenata" => "Canção tocada para alguém.",
    "costelas" => "Parte do corpo ou alimento.",
    "xadrezão" => "Jogo de tabuleiro.",
    "bandeira" => "Símbolo de um país.",
    "maletona" => "Mala grande.",
    "salgados" => "Comidas de festa.",
    "palmeira" => "Árvore alta.",
    "computar" => "Realizar cálculos.",
    "magnetar" => "Estrela de Nêutrons.",
    "livraria" => "Loja de livros.",
    "cordeiro" => "Filhote de carneiro.",
    "estrelas" => "Corpos brilhantes no céu.",
    "teclados" => "Dispositivos de digitação.",
    "mandioca" => "Raiz muito usada na culinária.",
    "rocheado" => "Cheio de pedras.",
    "sorvetes" => "Sobremesas geladas.",
    "venenoso" => "Oferece perigo químico.",
    "banheira" => "Usada para tomar banho relaxante."
];

$indice = array_rand($palavras); // pega a chave aleatória
$palavra = $indice;               // é a palavra correta
$dica = $palavras[$palavra];      // dica correspondente

$numLetras = strlen($palavra);    // número correto de letras
$letrix = array_fill(0, $numLetras, "_"); // traços corretos

$menu_STR = -1;
$inicio = false;

$stats = [
    'partidas' => 0,
    'vitorias' => 0,
    'derrotas' => 0
];

function verificarInicio(&$letrix, $numLetras, $palavra)
{
    global $inicio, $stats;
    echo "Rodada Iniciando...\n";
    $inicio = true;
    $tentativas = 0;
    $venceu = false;

    //tentativas por palavra
    while ($tentativas < 8) {

        echo implode(" ", $letrix) . "\n";

        $chute = readline("Escreva o seu chute: ");

        verificarChute($chute, $numLetras);

        analisarChute($chute, $palavra, $numLetras, $letrix);

        if ($chute === $palavra) {
            echo "PARABÉNS! Você acertou a palavra!";
            $stats['vitorias']++;
            $venceu = true;
            break;
        }

        echo "Tentativas restantes: " . (8 - $tentativas) . "\n\n";

        if($tentativas == 7){
            echo"$dica"
        }
        
        $tentativas++;
    }


    if (!$venceu) {
        echo "Suas tentativas acabaram! A palavra era: $palavra";
        $stats['derrotas']++;
    }

    $stats['partidas']++;

}

function analisarChute($chute, $palavra, $numLetras, &$letrix)
{ //esse & altera o array verdadeiro

    for ($i = 0; $i < $numLetras; $i++) {

        if ($chute[$i] === $palavra[$i]) { //se o chute estiver no lugar certo a letra fica verde
            $letrix[$i] = "\033[42m " . $chute[$i] . " \033[0m";
        } else if (strpos($palavra, $chute[$i]) !== false) { //se o chute estiver na palavra mas no lugar errado, a letra fica amarela
            $letrix[$i] = "\033[43m " . $chute[$i] . " \033[0m";
        } else { //se não a letra fica vermelha
            $letrix[$i] = "\033[31m " . $chute[$i] . " \033[0m \n";
        }
    }
    return implode(" ", $letrix);
}

function exibirMenu()
{
    echo "\n";
    echo "================================================\n";
    echo "                     MENU                       \n";
    echo "================================================\n";
    echo "1 - Iniciar jogo\n";
    echo "2 - Regras\n";
    echo "3 - Créditos\n";
    echo "4 - Pontuação (tentativas, acertos e erros)\n";
    echo "0 - Sair\n";
    echo "================================================\n";
    echo "Escolha uma opção: ";
}

function regrasLetrix()
{
    echo "---------- REGRAS DO LETRIX ----------\n";
    echo "1 - Você deve adivinhar a palavra oculta com 8 letras.";
    echo "2 - Uma dica aparece a partir da 5ª tentativa.\n";
    echo "3 - O jogador perde se ultrapassar 8 tentativas.\n";
    echo "4 - Regra das cores: \n";
    echo "\033[32mLetra verde: Letra existe na palavra e está na posição correta.\033[0m\n";
    echo "\033[33mLetra amarela: Letra existe na palavra mas está na posição errada.\033[0m\n";
    echo "\033[31mLetra vermelha: Letra não existe na palavra.\033[0m\n";
}

//Função opção Pontuações
function estatisticas($stats)
{
    echo "================================================\n";
    echo "                   PONTUAÇÕES                   \n";
    echo "================================================\n";

    if ($stats['partidas'] == 0) {
        echo "Nenhuma Partida Registrada\n";
        return;
    }

    $aproveitamento = ($stats['vitorias'] / $stats['partidas']) * 100;

    echo "Partidas: {$stats['partidas']}\n";
    echo "Vitorias: {$stats['vitorias']}\n";
    echo "Derrotas: {$stats['derrotas']}\n";
    echo "Aproveitamento: " . number_format($aproveitamento, 1) . "%\n\n";
}

function verificarChute($chute, $numLetras)
{

    // Verifica se só tem letras (com acento permitido)
    if (!preg_match('/^\p{L}+$/u', $chute)) {
        echo "Palavra inválida! Digite apenas letras.\n";
        return false;
    }

    // Verifica o tamanho do chute
    if (strlen($chute) !== $numLetras) {
        echo "Seu chute deve ter $numLetras letras!\n";
        return false;
    }

    return true;
}


function sair($menu)
{

    if ($menu == 0) {

        echo "Você escolheu sair do programa.\n";
        echo "Encerrando...\n";

        exit;
    }
}

function creditos()
{
    echo "================\n";
    echo "    CRÉDITOS    \n";
    echo "================\n";
    echo ".Alanis\n";
    echo ".Carlos\n";
    echo ".Davi Loyola\n";
    echo ".Gabriel Pereira\n";
    echo ".Vínicius\n";
    echo ".Yasmin\n";
}

do {
    exibirMenu();
    $option = trim(readline("Digite uma opção: "));

    switch ($option) {

        case "1":
            verificarInicio($letrix, $numLetras, $palavra);

            break;

        case "2":
            regrasLetrix();
            break;

        case "3":
            creditos();
            break;

        case "4":
            estatisticas($stats);
            break;

        case "0":
            sair($option);
            break;
        default:
            echo "Opção invalida. ";
            break;
    }


    if ($option != "0") {

        readline("\nPressione Enter para continuar...");
    }
} while ($option != "0");
