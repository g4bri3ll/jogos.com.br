<?php

namespace src\Service\LotoFacil;

class CalculaPorcetagemSaidaPorPosicao
{

    //retorna o número mais saído por posição. Posição 1 retorna o maior número, posição 2 retorna o maior número, até achar todos
    public function calculaPorcetagemSaidaPorPosicao(array $arrayPosicaoPorPosicao)
    {

        $arrayQuinzeNumeros = [];

        foreach ($arrayPosicaoPorPosicao as $key => $array){

            //Zerando as variáveis
            $valor = 0;
            $numero = 0;

            $valor = max($array);

            //Pegar a chave que contém o maior valor. Ex [1 = 1000, 2 = 500, 3 = 200]. Na posição 1, e pra retorna o valor de 1.000 e a chave 1
            //Na posição 1 do jogo o número 1 foi o maior que saiu nessa posição, então eu retorno ele.
            foreach ($array as $key => $value){
                if ($valor == $value){
                    $numero = $key;
                }
            }

            $arrayQuinzeNumeros[$numero] = $valor;

        }

        return $arrayQuinzeNumeros;

    }
}
