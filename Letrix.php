<?php

$palavras = [
    "abacates" => "Fruta tropical de polpa verde.",
    "montanha" => "Elevação natural.",
    "telefone" => "Usado para se comunicar à distância.",
    "cachorro" => "Animal considerado o melhor amigo do homem.",
    "girassol" => "Planta que segue a luz do sol.",
    "formigas" => "Inseto que vive em colônias.",
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
    "mandioca" => "Raiz muito usada na culinária brasileira.",
    "rocheado" => "Cheio de pedras.",
    "sorvetes" => "Sobremesas geladas.",
    "venenoso" => "Oferece perigo químico.",
    "banheira" => "Usada para tomar um banho relaxante."
];

$stats = [
    'partidas' => 0,
    'vitorias' => 0,
    'derrotas' => 0
];

$menu_STR = -1;
$inicio = false;

$numLetras = mb_strlen($palavra);    // número correto de letras
$letrix = array_fill(0, $numLetras, "_"); // traços corretos

function escolherPalavra($palavras){
    
    $indice = array_rand($palavras);

    $palavra = $indice;
    $dica = $palavras[$indice];

    return [$palavra, $dica];
}


function verificarInicio(&$letrix, $numLetras, $palavra, $dica)
{
    global $inicio, $stats;
    echo "Rodada Iniciando...\n";
    $inicio = true;
    $tentativas = 0;
    $venceu = false;

    //tentativas por palavra
    while ($tentativas < 9) {

        echo implode(" ", $letrix) . "\n";

        $chute = readline("Escreva o seu chute: ");

        verificarChute($chute, $numLetras);

        analisarChute($chute, $palavra, $numLetras, $letrix);
        if (mb_strtolower($chute, 'UTF-8') === mb_strtolower($palavra, 'UTF-8')) {
            echo "PARABÉNS! Você acertou a palavra!\n";
            $stats['vitorias']++;
            $venceu = true;
            break;
        }

        echo "Tentativas restantes: " . (8 - $tentativas) . "\n\n";

        if($tentativas == 6){
            echo"---- DICA----- \n";
            echo"$dica \n";
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
{
    for ($i = 0; $i < $numLetras; $i++) {

        if ($chute[$i] === $palavra[$i]) {
            // Verde
            $letrix[$i] = "\033[42m".$chute[$i]."\033[0m";

        } else if (strpos($palavra, $chute[$i]) !== false) {
            // Amarelo
            $letrix[$i] = "\033[43m".$chute[$i]."\033[0m";

        } else {
            // Vermelho
           $letrix[$i] = "\033[41m\033[97m".$chute[$i]."\033[0m";

        }
    }

    return implode(" ", $letrix);
}

function exibirMenu()
{
    echo "\n";
    echo "================================================\n";
    echo "              BEM-VINDO AO "
    . "\033[31mL\033[0m"
    . "\033[32mE\033[0m"
    . "\033[33mT\033[0m"
    . "\033[34mR\033[0m"
    . "\033[35mI\033[0m"
    . "\033[36mX\033[0m"
    . "\n";
    echo "================================================\n";
    echo "1 - Iniciar jogo\n";
    echo "2 - Regras\n";
    echo "3 - Pontuação (tentativas, acertos e erros)\n";
    echo "4 - Créditos\n";
    echo "0 - Sair\n";
    echo "================================================\n";
    echo "Escolha uma opção: ";
}

function regrasLetrix()
{
    echo "================================================\n";
    echo "                    REGRAS                      \n";
    echo "================================================\n";
    echo "1 - Você deve adivinhar a palavra oculta com 8 letras.\n";
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
    if (mb_strlen($chute) !== $numLetras) {
        echo "Seu palpite deve conter $numLetras letras!\n";
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
    echo "================================================\n";
    echo "                    CRÉDITOS                    \n";
    echo "================================================\n";
    echo "- Alanis\n";
    echo "- Carlos\n";
    echo "- Davi Loyola\n";
    echo "- Gabriel Pereira\n";
    echo "- Vínicius\n";
    echo "- Yasmin\n";
}

do {
    exibirMenu();
    $option = trim(readline("Digite uma opção: "));

    switch ($option) {

        case "1":
            list($palavra, $dica) = escolherPalavra($palavras);

    $numLetras = mb_strlen($palavra);
    $letrix = array_fill(0, $numLetras, "_");
            verificarInicio($letrix, $numLetras, $palavra,  $dica);

            break;

        case "2":
            regrasLetrix();
            break;

        case "3":
            estatisticas($stats);
            break;

        case "4":
            creditos();
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
