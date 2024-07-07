<?php

namespace src\Service\LotoFacil;

use Uteis\Uteis;

class CalculaValorTotalPorJogo
{

    /**
     * @param array $resultadosLotoFacil
     * @return array
     */
    public function CalculaValorTotalPorJogo(array $resultadosLotoFacil)
    {
        $arrayJogosSomados = [];
        foreach ($resultadosLotoFacil as $item => $value){
            $array = explode(",", $value);

            $arrayJogosSomados[] = array_sum($array);

        }

        //Este retorno contem todos os jogos somando seus numeros
        return $arrayJogosSomados;
    }

    /**
     * Atenção!!!! A chave deste array e o valor somando de todos os numeros daquele jogo
     * O seu valor e a quantidade de vezes que ele saiu
     * @param array $arrayJogosSomados
     * @return array
     */
    public function retornaJogoSomandaSemRepetir(array $arrayJogosSomados)
    {
        $array = [];

        foreach ($arrayJogosSomados as $item){
            if (empty($array[$item])){
                $array[$item] = 1;
            } else {
                $array[$item] = $array[$item] + 1;
            }
        }

        return $array;
    }

}
