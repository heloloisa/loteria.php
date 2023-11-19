<?php

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
            megaSena($jogoGanhador); 
            break;
        case 2:
            quina($jogoGanhador); 
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
    $numDezenas =  readline("Quantas dezenas para {$jogo}? ({$min} a {$max}): ");

        if ($numDezenas < $min || $numDezenas > $max)
        {
            echo "Número de dezenas inválido para {$jogo}.\n";
            return obterNumDezenas($jogo, $min, $max);
        }


    return $numDezenas;
    }

    function obterNumApostas()
    {
        return (int) readline("Quantas apostas deseja gerar? ");
    }

    function gerarDezenas($min, $max, $quantidade)
    {
        $dezenas = [];

        while (count($dezenas) < $quantidade)
        {
            $dezena = rand($min, $max);
            if (!in_array($dezena, $dezenas))
            {
                $dezenas[] = $dezena;
            }
        }

        sort($dezenas);

        return $dezenas;
    }


    function megaSena($jogoGanhador)
    {
        $numDezenas = obterNumDezenas("Mega Sena", 6, 20);
        $numApostas = obterNumApostas();

        for ($i = 1; $i <= $numApostas; $i++)
        {
            $dezenas = gerarDezenas(1, 60, $numDezenas);
            exibirAposta($i, $dezenas);
            compararJogos($dezenas, $jogoGanhador); 
        }



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

        echo $total_MS = $numApostas * $gasto_por_aposta_MS;
    }

    function quina($jogoGanhador)
    {
        $numDezenas = obterNumDezenas("Quina", 5, 15);
        $numApostas = obterNumApostas();

        for ($i = 1; $i <= $numApostas; $i++)
        {
            $dezenas = gerarDezenas(1, 60, $numDezenas);
            exibirAposta($i, $dezenas);
            compararJogos($dezenas, $jogoGanhador); 
        }

         // os valores da quina não estão corretos
        if($numDezenas == 6 ){
            $gasto_por_aposta_QUINA = 5;
        }
        if($numDezenas == 7 ){
            $gasto_por_aposta_QUINA = 35;
        }
        if($numDezenas == 8 ){
            $gasto_por_aposta_QUINA = 140;
        }
        if($numDezenas == 9 ){
            $gasto_por_aposta_QUINA = 420;
        }
        if($numDezenas == 10 ){
            $gasto_por_aposta_QUINA = 1050;
        }
        if($numDezenas == 11 ){
            $gasto_por_aposta_QUINA = 2310;
        }
        if($numDezenas == 12 ){
            $gasto_por_aposta_QUINA = 4620;
        }
        if($numDezenas == 13 ){
            $gasto_por_aposta_QUINA = 8580;
        }
        if($numDezenas ==14 ){
            $gasto_por_aposta_QUINA = 15015;
        }
        if($numDezenas == 15 ){
            $gasto_por_aposta_QUINA = 25025;
        }
        if($numDezenas == 16 ){
            $gasto_por_aposta_QUINA = 40040;
        }
        if($numDezenas == 17 ){
            $gasto_por_aposta_QUINA = 61880;
        }
        if($numDezenas == 18 ){
            $gasto_por_aposta_QUINA = 92820;
        }
        if($numDezenas == 19 ){
            $gasto_por_aposta_QUINA = 135660;
        }
        if($numDezenas == 20 ){
            $gasto_por_aposta_QUINA = 193800;
        }

        echo $total_QUINA = $numApostas * $gasto_por_aposta_QUINA;
    }

    function lotomania($jogoGanhador)
    {

        $numDezenas = obterNumDezenas("Lotomania", 50, 50);
        $numApostas = obterNumApostas();

        for ($i = 1; $i <= $numApostas; $i++)
        {
                $dezenas = gerarDezenas(1, 50, 20);
                exibirAposta($i, $dezenas);
                compararJogos($dezenas, $jogoGanhador);
        }
    
        $total_LOTOMANIA = $numApostas * 3;
        echo "Você gastou R$" . $total_LOTOMANIA;
        
    }


    function lotofacil($jogoGanhador)
    {
        $numDezenas = obterNumDezenas("Lotofácil", 15, 18);
        $numApostas = obterNumApostas();

        for ($i = 1; $i <= $numApostas; $i++)
        {
            $dezenas = gerarDezenas(1, 25, $numDezenas);
            exibirAposta($i, $dezenas);
            compararJogos($dezenas, $jogoGanhador);
        }

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

        echo "Número de acertos: $quantidadeAcertos\n";
    }


        //fazer o quanto a pessoa gastou
        //fazer o quanto ela ganhou
        //fazer a surpresinha q o jeff pediu

        function surpresinha()
        {
            

        }

    function TotalGasto()
    {

    }
?>
