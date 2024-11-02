<?php

$array = ['1, 2, 5, 7, 8, 9, 10, 12, 16, 19, 21, 22, 23, 24, 25',
    '2, 4, 5, 6, 7, 8, 10, 11, 13, 14, 15, 16, 17, 18, 24',
    '2, 3, 5, 8, 9, 11, 13, 14, 15, 17, 18, 19, 20, 22, 23',
    '1, 2, 4, 7, 9, 12, 13, 14, 16, 17, 18, 19, 20, 23, 25',
    '1, 3, 4, 6, 7, 8, 10, 12, 13, 14, 15, 16, 18, 22, 24',
    '2, 5, 6, 9, 12, 13, 14, 15, 17, 18, 19, 20, 21, 23, 25',
    '1, 3, 4, 6, 7, 9, 10, 13, 14, 15, 16, 17, 18, 20, 22',
    '2, 3, 7, 8, 10, 11, 13, 14, 15, 17, 19, 20, 22, 23, 24',
    '1, 2, 3, 6, 7, 8, 10, 11, 14, 15, 17, 19, 22, 23, 25',
    '1, 3, 4, 6, 7, 8, 9, 11, 13, 15, 17, 18, 20, 21, 25',
    '1, 2, 3, 4, 6, 7, 17, 18, 19, 20, 21, 22, 23, 24, 25',
    '1, 4, 6, 7, 8, 9, 12, 13, 15, 18, 20, 21, 23, 24, 25',
    '2, 4, 6, 8, 10, 12, 13, 14, 15, 17, 18, 19, 20, 22, 23',
    '1, 2, 3, 5, 9, 10, 11, 13, 17, 20, 21, 22, 23, 24, 25',
    '1, 3, 6, 7, 8, 9, 12, 13, 14, 15, 18, 19, 20, 21, 25',
    '2, 5, 6, 9, 10, 11, 12, 14, 15, 17, 19, 20, 22, 24, 25',
    '2, 3, 4, 5, 7, 10, 11, 13, 14, 15, 16, 22, 23, 24, 25',
    '2, 3, 4, 5, 6, 7, 8, 9, 12, 14, 17, 22, 23, 24, 25',
    '1, 2, 5, 8, 9, 10, 12, 13, 14, 15, 16, 20, 21, 22, 24',
    '1, 2, 4, 6, 7, 8, 14, 15, 16, 17, 18, 19, 22, 23, 25',
    '1, 2, 5, 8, 9, 10, 11, 13, 14, 16, 17, 18, 20, 21, 24',
    '2, 3, 4, 7, 12, 14, 15, 16, 18, 20, 21, 22, 23, 24, 25',
    '1, 4, 5, 6, 7, 9, 10, 13, 14, 16, 19, 21, 23, 24, 25',
    '3, 5, 6, 9, 10, 12, 13, 14, 16, 17, 18, 19, 20, 21, 24',
    '1, 3, 5, 9, 12, 13, 14, 15, 16, 17, 19, 20, 21, 22, 25',
    '1, 3, 5, 8, 9, 13, 14, 15, 16, 17, 21, 22, 23, 24, 25'];

class teste
{

    function retornaValorTotalPorPosicaoJogo(array $array, int $posicaoArray)
    {

        $arrayPorPosicao = [];

        //Diminui um valor para pegar a posição dentro do array
        $posicaoArray = $posicaoArray - 1;

        $um = 0;
        $dois = 0;
        $tres = 0;
        $quatro = 0;
        $cinco = 0;
        $seis = 0;
        $sete = 0;
        $oito = 0;
        $nove = 0;
        $dez = 0;
        $onze = 0;
        $doze = 0;
        $treze = 0;
        $quatroze = 0;
        $quinze = 0;
        $dezesseis = 0;
        $dezesete = 0;
        $dezoito = 0;
        $dezenove = 0;
        $vinte = 0;
        $vinte_um = 0;
        $vinte_dois = 0;
        $vinte_tres = 0;
        $vinte_quatro = 0;
        $vinte_cinco = 0;

        foreach ($array as $value) {

            $arrayDeNumeros = explode(", ", $value);

            $numero = $arrayDeNumeros[$posicaoArray];

            if ($numero == 1) {$um = $um + 1;}
            if ($numero == 2) {$dois = $dois + 1;}
            if ($numero == 3) {$tres = $tres + 1;}
            if ($numero == 4) {$quatro = $quatro + 1;}
            if ($numero == 5) {$cinco = $cinco + 1;}
            if ($numero == 6) {$seis = $seis + 1;}
            if ($numero == 7) {$sete = $sete + 1;}
            if ($numero == 8) {$oito = $oito + 1;}
            if ($numero == 9) {$nove = $nove + 1;}
            if ($numero == 10) {$dez = $dez + 1;}
            if ($numero == 11) {$onze = $onze + 1;}
            if ($numero == 12) {$doze = $doze + 1;}
            if ($numero == 13) {$treze = $treze + 1;}
            if ($numero == 14) {$quatroze = $quatroze + 1;}
            if ($numero == 15) {$quinze = $quinze + 1;}
            if ($numero == 16) {$dezesseis = $dezesseis + 1;}
            if ($numero == 17) {$dezesete = $dezesete + 1;}
            if ($numero == 18) {$dezoito = $dezoito + 1;}
            if ($numero == 19) {$dezenove = $dezenove + 1;}
            if ($numero == 20) {$vinte = $vinte + 1;}
            if ($numero == 21) {$vinte_um = $vinte_um + 1;}
            if ($numero == 22) {$vinte_dois = $vinte_dois + 1;}
            if ($numero == 23) {$vinte_tres = $vinte_tres + 1;}
            if ($numero == 24) {$vinte_quatro = $vinte_quatro + 1;}
            if ($numero == 25) {$vinte_cinco = $vinte_cinco + 1;}

        }

        $arrayPorPosicao["posicao_1"] = $um;
        $arrayPorPosicao["posicao_2"] = $dois;
        $arrayPorPosicao["posicao_3"] = $tres;
        $arrayPorPosicao["posicao_4"] = $quatro;
        $arrayPorPosicao["posicao_5"] = $cinco;
        $arrayPorPosicao["posicao_6"] = $seis;
        $arrayPorPosicao["posicao_7"] = $sete;
        $arrayPorPosicao["posicao_8"] = $oito;
        $arrayPorPosicao["posicao_9"] = $nove;
        $arrayPorPosicao["posicao_10"] = $dez;
        $arrayPorPosicao["posicao_11"] = $onze;
        $arrayPorPosicao["posicao_12"] = $doze;
        $arrayPorPosicao["posicao_13"] = $treze;
        $arrayPorPosicao["posicao_14"] = $quatroze;
        $arrayPorPosicao["posicao_15"] = $quinze;
        $arrayPorPosicao["posicao_16"] = $dezesseis;
        $arrayPorPosicao["posicao_17"] = $dezesete;
        $arrayPorPosicao["posicao_18"] = $dezoito;
        $arrayPorPosicao["posicao_19"] = $dezenove;
        $arrayPorPosicao["posicao_20"] = $vinte;
        $arrayPorPosicao["posicao_21"] = $vinte_um;
        $arrayPorPosicao["posicao_22"] = $vinte_dois;
        $arrayPorPosicao["posicao_23"] = $vinte_tres;
        $arrayPorPosicao["posicao_24"] = $vinte_quatro;
        $arrayPorPosicao["posicao_25"] = $vinte_cinco;

        return $arrayPorPosicao;

    }

}

$t = new teste();
$posicao = [];
for ($a = 1;$a < 16;$a++){
    $posicao[$a] = $t->retornaValorTotalPorPosicaoJogo($array, $a);
}

print_r($posicao);


?>
