<?php
$palavras = [
    "abacate" => "Fruta tropical de polpa verde.",
    "montanha" => "Elevação natural muito alta.",
    "telefone" => "Usado para se comunicar à distância.",
    "cachorro" => "Animal considerado o melhor amigo do homem.",
    "girassol" => "Planta que segue a luz do sol.",
    "naviozão" => "Um veículo marítimo de grande porte.",
    "formigue" => "Inseto pequeno que vive em colônia.",
    "gramados" => "Áreas cobertas de grama.",
    "oceânico" => "Relacionado ao mar profundo.",
    "esmaltes" => "Produtos usados para pintar unhas.",
    "carreata" => "Várias pessoas seguindo em veículos.",
    "alicate" => "Ferramenta usada para cortar ou apertar.",
    "abacaxis" => "Fruta de polpa amarela e sabor ácido.",
    "pandeiro" => "Instrumento musical de percussão.",
    "ventania" => "Vento forte.",
    "algodão" => "Fibra branca usada em tecidos.",
    "parqueio" => "Local para estacionar veículos.",
    "chapéus" => "Acessórios usados na cabeça.",
    "brigade" => "Doce típico de festas brasileiras.",
    "compasso" => "Instrumento usado para medir círculos.",
    "caminhar" => "Ato de andar de forma leve.",
    "floresta" => "Grande área com muitas árvores.",
    "lençóis" => "Usados para cobrir colchões.",
    "tartarug" => "Animal de casco duro.",
    "bússola" => "Ajuda a encontrar direção.",
    "folheado" => "Algo recoberto por camadas finas.",
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
    "geladeira" => "Eletrodoméstico que refrigera alimentos.",
    "batomzin" => "Cosmético para colorir os lábios.",
    "canavial" => "Plantação de cana-de-açúcar.",
    "esfregar" => "Ato de limpar friccionando.",
    "cobertor" => "Aquece durante o frio.",
    "colherão" => "Utensílio de cozinha grande.",
    "quadrado" => "Forma geométrica com 4 lados iguais.",
    "cimento" => "Material usado na construção.",
    "pinturas" => "Obras feitas com tinta.",
    "editoras" => "Empresas que publicam livros.",
    "garrafas" => "Recipientes cilíndricos para líquidos.",
    "cafézinho" => "Bebida amada por brasileiros.",
    "morangos" => "Frutas vermelhas pequenas.",
    "peneiras" => "Usadas para separar partículas.",
    "aeróbico" => "Exercícios que usam oxigênio.",
    "voadores" => "Animais que conseguem voar.",
    "maracujá" => "Fruta de sabor azedo.",
    "carnaval" => "Festa popular brasileira.",
    "lareiras" => "Usadas para aquecer ambientes.",
    "caldeira" => "Equipamento que produz vapor.",
    "patinses" => "Usados para deslizar no chão.",
    "pintinho" => "Filhote de galinha.",
    "espelhos" => "Refletem imagens.",
    "armários" => "Usados para guardar itens.",
    "tapeteão" => "Peça grande usada no chão.",
    "diversão" => "Algo divertido de se fazer.",
    "mochilas" => "Usadas para carregar objetos.",
    "montagem" => "Processo de juntar peças.",
    "escritas" => "Palavras colocadas no papel.",
    "polvilho" => "Ingrediente usado em biscoitos.",
    "camiseta" => "Peça básica de roupa.",
    "pipocona" => "Milho estourado em panela.",
    "bonecos" => "Brinquedos em formato humano.",
    "cavalete" => "Suporte para objetos.",
    "globinho" => "Miniatura de planeta.",
    "cartazes" => "Folhas grandes para anúncios.",
    "serenata" => "Canção tocada para alguém.",
    "costelas" => "Parte do corpo ou alimento.",
    "xadrezão" => "Jogo de tabuleiro.",
    "lapiseira" => "Instrumento de escrita.",
    "cobrinhas" => "Serpentes pequenas.",
    "bandeira" => "Símbolo de um país.",
    "maletona" => "Mala grande.",
    "salgados" => "Comidas de festa.",
    "palmeira" => "Árvore alta.",
    "canetões" => "Canetas grossas.",
    "computar" => "Realizar cálculos.",
    "magnetar" => "Estrela com forte campo magnético.",
    "janelasas" => "Aberturas em paredes.",
    "livraria" => "Loja de livros.",
    "cordeiro" => "Filhote de carneiro.",
    "aromatic" => "Tem cheiro forte.",
    "estrelas" => "Corpos brilhantes no céu.",
    "teclados" => "Dispositivos de digitação.",
    "mandioca" => "Raiz muito usada na culinária.",
    "rocheado" => "Cheio de pedras.",
    "milhozin" => "Grãos amarelos.",
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
  'jogos' => 0,
  'vitorias' => 0,
  'derrotas' => 0
];

function verificarInicio($letrix, $numLetras){
    global $inicio; 
    echo "Rodada Iniciando...\n";
    $inicio = true;
    
    echo implode(" ", $letrix) . "\n";
    $chute = readline("Escreva o seu chute: \n");

    verificarChute($chute, $numLetras);
    
}

function exibirMenu() {
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

function regrasLetrix(){
    echo "---------- REGRAS DO LETRIX ----------\n";
    echo "1 - A dica aparece somente a partir da 5ª tentativa.\n";
    echo "2 - O jogador perde se ultrapassar 8 tentativas.\n";
    echo "3 - Cada jogador pode jogar no máximo 3 palavras por dia.\n";
    echo "4 - Regras das cores: \n";
    echo "Letra verde: Letra existe na palavra e está na posição correta. \n";
    echo "Letra amarela: Letra existe na palavra mas está na posição errada. \n";
    echo "Letra vermelha: Letra não existe na palavra. \n";
}

//Função opção Pontuações
function estatisticas($stats){
    echo "================================================\n";
    echo "                   PONTUAÇÕES                   \n";
    echo "================================================\n";

    if($stats['jogos'] == 0){
        echo "Nenhuma Partida Registrada\n";
        return ;
    }

    $aproveitamento = ($stats['vitorias'] / $stats['jogos']) * 100;

    echo "Jogos: {$stats['jogos']}\n";
    echo "Vitorias: {$stats['vitorias']}\n";
    echo "Derrotas: {$stats['derrotas']}\n";
    echo "Aproveitamento: " . number_format($aproveitamento, 1) . "%\n\n";
}

function verificarChute($chute, $numLetras){
    
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


function sair($menu){

    if ($menu == 0){
        
        echo "Você escolheu sair do programa.\n";
        echo "Encerrando...\n";
        exit;
        
    }
    
}

function creditos(){
    echo "================\n";
    echo "    CRÉDITOS    \n";
    echo "================\n";
    echo ".Alanis\n";
    echo ".Carlos\n";
    echo ".Davi Arifa\n";
    echo ".Gabriel\n";
    echo ".Vínicius\n";
    echo ".Yasmin\n";
}







do {
    exibirMenu();
    $option = trim(readline("Digite uma opção: "));

    switch($option) {

        case "1":
            verificarInicio($letrix, $numLetras); 
            
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






?>