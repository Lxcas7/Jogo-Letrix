<?php

$palavras = [
    "abacates" => "Fruta tropical de polpa verde.",
    "montanha" => "Elevação natural.",
    "telefone" => "Usado para se comunicar à distância.",
    "cachorro" => "Animal considerado o melhor amigo do homem.",
    "girassol" => "Planta que segue a luz do sol.",
    "formigas" => "Inseto que vive em colônias.",
    "gramados" => "Áreas cobertas de grama.",
    "oceanico" => "Relacionado ao mar profundo.",
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
    "aerobico" => "Exercícios que usam oxigênio.",
    "voadores" => "Animais que conseguem voar.",
    "carnaval" => "Festa popular brasileira.",
    "lareiras" => "Usadas para aquecer ambientes.",
    "caldeira" => "Equipamento que produz vapor.",
    "espelhos" => "Refletem imagens.",
    "armarios" => "Usados para guardar itens.",
    "tapeteao" => "Peça grande usada no chão.",
    "diversao" => "Algo divertido de se fazer.",
    "mochilas" => "Usadas para carregar objetos.",
    "montagem" => "Processo de juntar peças.",
    "escritas" => "Palavras colocadas no papel.",
    "polvilho" => "Ingrediente usado em biscoitos.",
    "camiseta" => "Peça básica de roupa.",
    "cavalete" => "Suporte para objetos.",
    "cartazes" => "Folhas grandes para anúncios.",
    "serenata" => "Canção tocada para alguém.",
    "costelas" => "Parte do corpo ou alimento.",
    "xadrezao" => "Jogo de tabuleiro.",
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


function escolherPalavra($palavras){ //uso como o parâmetro o array de possíveis palavras
    
    $indice = array_rand($palavras); // sorteio as palavras pelo índice

    $palavra = $indice; //salvo nessa varíavel a palavra correspondente ao índice
    $dica = $palavras[$indice]; // guarda a dica correspondente a palavra

    return [$palavra, $dica]; //o método retorna a palavra e a dica correspondente
}

function verificarInicio(&$letrix, $numLetras, $palavra, $dica) //uso esse & para ele puxar a variável real
{
    global $inicio, $stats; //coloquei elas como global para ter acesso
    echo "\nRodada Iniciando...\n";
    $inicio = true;
    $tentativas = 0;
    $venceu = false;

    //o usuário tem 8 tentativas para tentar acertar
    while ($tentativas < 8) {

        echo implode(" ", $letrix) . "\n"; //imprime o _ _ _ _

        $chute = readline("Escreva o seu palpite: "); //pede o usuário o palpite dele

        if(!verificarChute($chute, $numLetras)){//chamo a função para verificar o palpite(chute)
            continue;//se ela nn for válida, pede para ele tentar dnv sem perder uma rodada
        }

        analisarChute($chute, $palavra, $numLetras, $letrix);//analisa o chute do usuário para  corresponder com a cor
        if (mb_strtolower($chute, 'UTF-8') === mb_strtolower($palavra, 'UTF-8')) {//se o chute for exatamente igual a palavra a ser descoberta, ele vence
            echo "PARABÉNS! Você acertou a palavra!\n";
            $stats['vitorias']++; //soma as partidas que o usuário ganhou
            $venceu = true;
            break;//para o jogo
        }

       
        $tentativas++;//mostra quantas tentativas resta para ele 
        echo "Tentativas restantes: " . (8 - $tentativas) . "\n\n";

        if($tentativas == 6){ //quando chega na rodada 7 exibe a dica na tela
            echo "================================================\n";
            echo "                  HORA DA DICA                  \n";
            echo "================================================\n";
            echo"$dica \n\n";
        }
        
        
    }


    if (!$venceu) {
        echo "Suas tentativas acabaram! A palavra era: $palavra"; //se ultrapassa de 8, o usurio perde
        $stats['derrotas']++; //soma nas drrotas
    }

    $stats['partidas']++;//soma ao número de partidas jogadas

}

function removerAcentos($str) { //esse método transforma todos as vogais com acento em letras normais
    return strtr($str, [
        'á'=>'a','à'=>'a','ã'=>'a','â'=>'a','ä'=>'a',
        'é'=>'e','è'=>'e','ê'=>'e','ë'=>'e',
        'í'=>'i','ì'=>'i','î'=>'i','ï'=>'i',
        'ó'=>'o','ò'=>'o','õ'=>'o','ô'=>'o','ö'=>'o',
        'ú'=>'u','ù'=>'u','û'=>'u','ü'=>'u',
        'ç'=>'c',
        'Á'=>'A','À'=>'A','Ã'=>'A','Â'=>'A','Ä'=>'A',
        'É'=>'E','È'=>'E','Ê'=>'E','Ë'=>'E',
        'Í'=>'I','Ì'=>'I','Î'=>'I','Ï'=>'I',
        'Ó'=>'O','Ò'=>'O','Õ'=>'O','Ô'=>'O','Ö'=>'O',
        'Ú'=>'U','Ù'=>'U','Û'=>'U','Ü'=>'U',
        'Ç'=>'C' //tira o cedilha do c tmb
    ]);
}

function verificarChute(&$chute, $numLetras)
{
    //tira os acentos
    $chute = removerAcentos($chute);

    //coloca tudo em minúcsulo
    $chute = mb_strtolower($chute, 'UTF-8');

    //confere se tem letras só de a-z
    if (!preg_match('/^[a-z]+$/', $chute)) {
        echo "Palavra inválida! Digite apenas letras.\n";
        return false;
    }

    // aqui verifica o tamanho do chute q o usuário quis
    if (strlen($chute) !== $numLetras) {
        echo "\nSeu palpite deve conter $numLetras letras!\n";
        return false;
    }

    return true;
}

// function analisarChute($chute, $palavra, $numLetras, &$letrix)//usei esse & para alterar no _ _ _ original
// {
//     for ($i = 0; $i < $numLetras; $i++) {//um for para percorrer as letras da palavra 

//         if ($chute[$i] === $palavra[$i]) {
//             // se a letra tiver  no lugar certo, adiciona ao fundo da letra a cor verde
//             $letrix[$i] = "\033[42m".$chute[$i]."\033[0m";

//         } else if (strpos($palavra, $chute[$i]) !== false) {
//             // se a letra tiver  no lugar errado mas existir na palavra, adiciona ao fundo da letra a cor amarela
//             $letrix[$i] = "\033[43m".$chute[$i]."\033[0m";

//         } else {
//             //se não tiver a letra na palavra, adiciona a cor vermelha
//            $letrix[$i] = "\033[41m\033[97m".$chute[$i]."\033[0m";

//         }
//     }

//     return implode(" ", $letrix); //retorna o _ _ _ _ colorido correspondente ao chute
// }

function analisarChute($chute, $palavra, $numLetras, &$letrix)
{
    // normalizar (assume chute já sem acento e em minúsculas; aqui normalizamos a palavra)
    $palavraNorm = removerAcentos(mb_strtolower($palavra, 'UTF-8'));
    $chuteNorm   = removerAcentos(mb_strtolower($chute, 'UTF-8'));

    // 1) criar array de contagem das letras da palavra
    $contagem = [];
    for ($i = 0; $i < $numLetras; $i++) {
        $letra = mb_substr($palavraNorm, $i, 1, 'UTF-8');
        if (!isset($contagem[$letra])) $contagem[$letra] = 0;
        $contagem[$letra]++;
    }

    // 2) marcar verdes primeiro e descontar da contagem
    $verdes = array_fill(0, $numLetras, false);
    for ($i = 0; $i < $numLetras; $i++) {
        $lChute = mb_substr($chuteNorm, $i, 1, 'UTF-8');
        $lPal   = mb_substr($palavraNorm, $i, 1, 'UTF-8');

        if ($lChute === $lPal) {
            // marca verde e desconta da contagem (se existir)
            $letrix[$i] = "\033[42m".$lChute."\033[0m";
            $verdes[$i] = true;
            if (isset($contagem[$lChute]) && $contagem[$lChute] > 0) {
                $contagem[$lChute]--;
            }
        }
    }

    // agora marcar amarelos ou vermelhos conforme sobra na contagem
    for ($i = 0; $i < $numLetras; $i++) {
        if ($verdes[$i]) continue; // já marcado

        $lChute = mb_substr($chuteNorm, $i, 1, 'UTF-8');

        if (isset($contagem[$lChute]) && $contagem[$lChute] > 0) {
            // ainda há essa letra sobrando na palavra -> amarelo
            $letrix[$i] = "\033[43m".$lChute."\033[0m";
            $contagem[$lChute]--;
        } else {
            // não há sobra -> vermelho
            $letrix[$i] = "\033[41m\033[97m".$lChute."\033[0m";
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
    echo "\033[31m1 -\033[0m Iniciar jogo\n";
    echo "\033[32m2 -\033[0m Regras\n";
    echo "\033[33m3 -\033[0m Pontuação (tentativas, acertos e erros)\n";
    echo "\033[34m4 -\033[0m Créditos\n";
    echo "\033[35m0 -\033[0m Sair\n";
    echo "================================================\n";
}

function regrasLetrix()
{
    echo "================================================\n";
    echo "                    "
    . "\033[31mR\033[0m"
    . "\033[32mE\033[0m"
    . "\033[33mG\033[0m"
    . "\033[34mR\033[0m"
    . "\033[35mA\033[0m"
    . "\033[36mS\033[0m"
    . "\n";
    echo "================================================\n";
    echo "\033[31m1 -\033[0m Você deve adivinhar a palavra oculta \ncom 8 letras.\n";
    echo "\033[32m2 -\033[0m Uma dica aparece a partir da 5ª tentativa.\n";
    echo "\033[33m3 -\033[0m O jogador perde se ultrapassar 8 tentativas.\n";
    echo "\033[34m4 -\033[0m Regra das cores: \n";
    echo "\033[32m- Letra VERDE:\033[0m Letra existe na palavra e está na posição correta.\n";
    echo "\033[33m- Letra AMARELA:\033[0m Letra existe na palavra mas está na posição errada.\n";
    echo "\033[31m- Letra VERMELHA:\033[0m Letra não existe na palavra.\n";
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
    echo "                    "
    . "\033[31mC\033[0m"
    . "\033[32mR\033[0m"
    . "\033[33mE\033[0m"
    . "\033[34mD\033[0m"
    . "\033[35mI\033[0m"
    . "\033[36mT\033[0m"
    . "\033[31mO\033[0m"
    . "\033[32mS\033[0m"
    . "\n";
    echo "================================================\n";
    
    //Créditos, com delay de 400ms
    usleep(400000);
    echo "\nProduzido por:\n";
    usleep(400000);
    echo "- \033[31mAlanis Cristine\033[0m\n";
    usleep(400000);
    echo "- \033[32mCarlos\033[0m\n";
    usleep(400000);
    echo "- \033[33mDavi Loyola\033[0m\n";
    usleep(400000);
    echo "- \033[34mGabriel Pereira\033[0m\n";
    usleep(400000);
    echo "- \033[35mVínicius\033[0m\n";
    usleep(400000);
    echo "- \033[36mYasmin\033[0m\n";
    usleep(400000);
    echo "\n\033[32mObrigado por jogar!\033[0m\n";
    usleep(400000);
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
