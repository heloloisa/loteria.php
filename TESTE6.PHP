

<?php

    // função q gera numeros aleatorios sem repetição

    function gerarDezenas($min, $max, $quantidade) {
        $dezenas = [];

        while (count($dezenas) < $quantidade) {
            $numero = rand($min, $max);

            if (!in_array($numero, $dezenas)) {
                $dezenas[] = $numero;
            }
        }

        sort($dezenas);
        return $dezenas;
    }

    // função para calcular o custo da aposta

    function calcularCusto($quantidadeApostas, $custoPorAposta) {
        return $quantidadeApostas * $custoPorAposta;
    }

    // função para validar as dezenas 

    function validarDezenas($min, $max, $dezenas) {
        foreach ($dezenas as $dezena) {
            if ($dezena < $min || $dezena > $max) {
                return false;
            }
        }
        return true;
    }

    // função para verificar acertos

    function verificarAcertos($dezenasSorteadas, $dezenasEscolhidas) {
        return count(array_intersect($dezenasSorteadas, $dezenasEscolhidas));
       
    }

    function surpresinha()
    {                           //     NÃO SEI OQ FAZERR AAAAARGHRGHRGHRGHGR
        echo("Deseja escolher suas apostas ou quer uma surpresinha?\n");
        echo("------ESCOLHER APOSTA------1\n");  
        echo("------  SURPRESINHA  ------2\n");

        $opcao = (int) readline("Escolha: ");

        $escolha = JogoEscolhido($opcao); 


        switch ($opcao)
        {
        case 1:
            
            break;
        case 2:
            
            ; 
            break;
        }
    }

    //***********************************************COMEÇO*************************************************************

    escolher_jogo();


    function escolher_jogo()
    {

        echo "1---  Mega Sena  ---1\n";
        echo "2---  Quina      ---2\n";
        echo "3---  Lotomania  ---3\n";
        echo "4---  Lotofácil  ---4\n";

        $opcao = (int) readline("Escolha: ");

        $jogoGanhador = JogoEscolhido($opcao); 


        switch ($opcao)
        {
        case 1:
            megaSena($jogoGanhador, $dezena); 
            break;
        case 2:
            jogarQuina($numero); 
            break;
        case 3:
            lotomania($jogoGanhador); 
            break;
        case 4:
            lotofacil($jogoGanhador); 
            break;
        default:
            echo "Jogo inválido. Escolha outro.\n";
            escolher_jogo();
            break;
        }
    }


    function obterNumDezenas($jogo, $min, $max)
    {
    $numDezenas = (int) readline("Quantas dezenas para {$jogo}? ({$min} a {$max}): ");

        if ($numDezenas < $min || $numDezenas > $max)
        {
            echo "Número de dezenas inválido para {$jogo}.\n";
            return obterNumDezenas($jogo, $min, $max);
        }

    return $numDezenas;
    }


    function obterNumApostas()
    {
        return (int) readline("Quantas apostas deseja gerar? \n");
        
    }




    function megaSena($jogoGanhador, &$dezena)
    {
        $numDezenas = obterNumDezenas("Mega Sena", 6, 20);
        $numApostas = obterNumApostas();

        for ($i = 1; $i <= $numApostas; $i++)
        {
            $dezenas = gerarDezenas(1, 60, $numDezenas);
            exibirAposta($i, $dezenas);
            compararJogos($dezenas, $jogoGanhador); 
        }
        echo $dezena;



        if($numDezenas == 6 ){
            $gasto_por_aposta_MS = 5;
        }
        if($numDezenas == 7 ){
            $gasto_por_aposta_MS = 35;
        }
        if($numDezenas == 8 ){
            $gasto_por_aposta_MS = 140;
        }
        if($numDezenas == 9 ){
            $gasto_por_aposta_MS = 420;
        }
        if($numDezenas == 10 ){
            $gasto_por_aposta_MS = 1050;
        }
        if($numDezenas == 11 ){
            $gasto_por_aposta_MS = 2310;
        }
        if($numDezenas == 12 ){
            $gasto_por_aposta_MS = 4620;
        }
        if($numDezenas == 13 ){
            $gasto_por_aposta_MS = 8580;
        }
        if($numDezenas ==14 ){
            $gasto_por_aposta_MS = 15015;
        }
        if($numDezenas == 15 ){
            $gasto_por_aposta_MS = 25025;
        }
        if($numDezenas == 16 ){
            $gasto_por_aposta_MS = 40040;
        }
        if($numDezenas == 17 ){
            $gasto_por_aposta_MS = 61880;
        }
        if($numDezenas == 18 ){
            $gasto_por_aposta_MS = 92820;
        }
        if($numDezenas == 19 ){
            $gasto_por_aposta_MS = 135660;
        }
        if($numDezenas == 20 ){
            $gasto_por_aposta_MS = 193800;
        }

        $total_MS = $numApostas * $gasto_por_aposta_MS;
        echo ("O valor gasto foi R$". $total_MS . ",00");
    }

    function jogarQuina(&$numero) 
    {
        echo "Bem-vindo ao jogo da Quina!\n";

        $minDezenas = 5;
        $maxDezenas = 15;
        $minJogo = 1;
        $maxJogo = 80;
        $custoPorAposta = 2.0;

        $quantidadeApostas = readline("Quantas apostas deseja gerar?( mínimo 1, máximo 80)\n ==>");
        $quantidadeDezenas = readline("Quantas dezenas por aposta?( mínimo 5, máximo 15) \n ==>");

        if ($quantidadeDezenas < $minDezenas || $quantidadeDezenas > $maxDezenas) {
            echo "Número de dezenas fora do intervalo permitido.\n";
            return;
        }

        //(chat gpt) Gere dezenas sorteadas (simulando o sorteio)

        $dezenasSorteadas = gerarDezenas($minJogo, $maxJogo, $quantidadeDezenas);

        for ($i = 1; $i <= $quantidadeApostas; $i++) {

            do 
            {
                $dezenasEscolhidas = gerarDezenas($minJogo, $maxJogo, $quantidadeDezenas);
            } 
                while (!validarDezenas($minJogo, $maxJogo, $dezenasEscolhidas));

            echo "Aposta $i: " . implode(', ', $dezenasEscolhidas) . "\n";

            $acertos = verificarAcertos($dezenasSorteadas, $dezenasEscolhidas);
            echo "Acertos na aposta $i: $acertos\n";
            echo $numero;
        }

        $totalCusto = calcularCusto($quantidadeApostas, $custoPorAposta);
        echo "Total gasto em reais: R$ $totalCusto\n";
    }



    function lotomania($jogoGanhador)
    {
        $numDezenas = obterNumDezenas("Lotomania", 50, 50);
        $numApostas = obterNumApostas();

        for ($i = 1; $i <= $numApostas; $i++)
        {
            $dezenas = gerarDezenas(1, 100, $numDezenas);
            exibirAposta($i, $dezenas);
            compararJogos($dezenas, $jogoGanhador);
        }

        $gasto_por_aposta_LOTOMANIA = 3;

        $total_LOTOMANIA = $numApostas * $gasto_por_aposta_LOTOMANIA;
        echo ("O valor gasto foi R$". $total_LOTOMANIA . ",00");
    }

    function lotofacil($jogoGanhador)
    {

        $numDezenas = obterNumDezenas("Lotofácil", 15, 20);
        $numApostas = obterNumApostas();

        for ($i = 1; $i <= $numApostas; $i++)
        {
            $dezenas = gerarDezenas(1, 25, $numDezenas);
            exibirAposta($i, $dezenas);
            compararJogos($dezenas, $jogoGanhador);
        }
        if($numDezenas == 15 ){
            $gasto_por_aposta_LOTOFACIL = 3;
        }
        if($numDezenas == 16 ){
            $gasto_por_aposta_LOTOFACIL = 48;
        }
        if($numDezenas == 17 ){
            $gasto_por_aposta_LOTOFACIL = 408;
        }
        if($numDezenas == 18 ){
            $gasto_por_aposta_LOTOFACIL = 2448;
        }
        if($numDezenas == 19 ){
            $gasto_por_aposta_LOTOFACIL = 11628;
        }
        if($numDezenas == 20 ){
            $gasto_por_aposta_LOTOFACIL = 46512;
        }

        $total_LOTOFACIL = $numApostas * $gasto_por_aposta_LOTOFACIL;
        echo ("O valor gasto foi R$". $total_LOTOFACIL . ",00");

    }


    function JogoEscolhido($opcao)
    {
        switch ($opcao)
        {
            case 1:
                return gerarDezenas(1, 60, 6);
            case 2:
                return gerarDezenas(1, 80, 5);
            case 3:
                return gerarDezenas(1, 100, 50);
            case 4:
                return gerarDezenas(1, 25, 15);
            default:
                return [];
        }
    }




    function exibirAposta($numAposta, $dezenas)
    {   
    echo "Aposta {$numAposta}: " . implode(', ', $dezenas) . "\n";
    }




    function compararJogos($jogoUsuario, $jogoGanhador)
    {
        $numerosAcertados = array_intersect($jogoUsuario, $jogoGanhador);
        $quantidadeAcertos = count($numerosAcertados);

        echo "Número de acertos: $quantidadeAcertos,  $numerosAcertados\n";
        
    }

?>
