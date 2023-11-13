<?php

function gerarAposta($minDezenas, $maxDezenas, $totalDezenas)
{
    $aposta = [];

    // Verifica se o total de dezenas está dentro do intervalo permitido
    if ($totalDezenas < $minDezenas || $totalDezenas > $maxDezenas) {
        echo "Número de dezenas fora do intervalo permitido.";
        return;
    }

    // Gera as dezenas aleatórias sem repetição
    while (count($aposta) < $totalDezenas) {
        $dezena = rand(1, 60); // Intervalo padrão para a Mega-Sena
        if (!in_array($dezena, $aposta)) {
            $aposta[] = $dezena;
        }
    }

    // Ordena as dezenas em ordem crescente
    sort($aposta);

    // Exibe as dezenas
    echo implode(', ', $aposta) . PHP_EOL;
}

function calcularTotalGasto($totalApostas, $precoPorAposta)
{
    return $totalApostas * $precoPorAposta;
}

// Exemplo de uso:
$jogoSelecionado = "Mega-Sena"; // Substitua pelo jogo escolhido
$totalApostas = 5; // Substitua pelo número desejado de apostas
$totalDezenas = 6; // Substitua pelo número desejado de dezenas por aposta

switch ($jogoSelecionado) {
    case "Mega-Sena":
        $minDezenas = 6;
        $maxDezenas = 15;
        $precoPorAposta = 3; // Substitua pelo preço do jogo escolhido
        break;
    // Adicione casos para outros jogos, como Quina, Lotomania e Lotofácil, com seus respectivos parâmetros.

    default:
        echo "Jogo não reconhecido.";
        exit();
}

echo "Apostas geradas para $jogoSelecionado:" . PHP_EOL;

for ($i = 0; $i < $totalApostas; $i++) {
    gerarAposta($minDezenas, $maxDezenas, $totalDezenas);
}

$totalGasto = calcularTotalGasto($totalApostas, $precoPorAposta);
echo "Total gasto: R$ " . number_format($totalGasto, 2, ',', '.') . PHP_EOL;
