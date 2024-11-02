<?php

namespace src\Service\LotoFacil;

class RetornaValorTotalPorPosicaoJogo
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

            $arrayDeNumeros = explode(",", $value);

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

        $arrayPorPosicao[1]  = $um;
        $arrayPorPosicao[2]  = $dois;
        $arrayPorPosicao[3]  = $tres;
        $arrayPorPosicao[4]  = $quatro;
        $arrayPorPosicao[5]  = $cinco;
        $arrayPorPosicao[6]  = $seis;
        $arrayPorPosicao[7]  = $sete;
        $arrayPorPosicao[8]  = $oito;
        $arrayPorPosicao[9]  = $nove;
        $arrayPorPosicao[10] = $dez;
        $arrayPorPosicao[11] = $onze;
        $arrayPorPosicao[12] = $doze;
        $arrayPorPosicao[13] = $treze;
        $arrayPorPosicao[14] = $quatroze;
        $arrayPorPosicao[15] = $quinze;
        $arrayPorPosicao[16] = $dezesseis;
        $arrayPorPosicao[17] = $dezesete;
        $arrayPorPosicao[18] = $dezoito;
        $arrayPorPosicao[19] = $dezenove;
        $arrayPorPosicao[20] = $vinte;
        $arrayPorPosicao[21] = $vinte_um;
        $arrayPorPosicao[22] = $vinte_dois;
        $arrayPorPosicao[23] = $vinte_tres;
        $arrayPorPosicao[24] = $vinte_quatro;
        $arrayPorPosicao[25] = $vinte_cinco;

        return $arrayPorPosicao;

    }

}
