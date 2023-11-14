<?php
 
    start();
    function start()
    { echo"Escolha qual jogo deseja jogar:\n";

        $escolha = readline("Lotomania. lotofácil. quina. mega-sena.\n");

        if ($escolha == "Lotomania". "lotomania". "LOTOMANIA") {
            lotomania($minDezenas, $maxDezenas, $totalDezenas);
        }
        if ($escolha == "Lotofácil". "Lotofacil". "lotofacil". "lotofácil". "LOTOFACIL". "LOTOFÁCIL") {
            lotofacil();
        }
        if ($escolha == "quina" or $escolha == "Quina") {
            quina();
        }
        if ($escolha == "mega" or $escolha == "Mega" or $escolha == "Mega-Sena" or $escolha == "Mega-sena"or $escolha == "mega sena") {
            mega();
        }
    }

    function lotomania($minDezenas, $maxDezenas, $totalDezenas){
        
        
         if ($totalDezenas < $minDezenas || $totalDezenas > $maxDezenas) {
            echo "Número de dezenas fora do intervalo permitido.";
            return;
        }     

    }
 
    function lotofacil(){

    }

    function quina(){

    }

    function mega(){

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
        $maxDezenas = 20;
        $precoPorAposta = 4.5; // Substitua pelo preço do jogo escolhido
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

    }
