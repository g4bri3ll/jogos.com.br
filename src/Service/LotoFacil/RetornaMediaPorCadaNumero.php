<?php

namespace src\Service\LotoFacil;

class RetornaMediaPorCadaNumero
{

    const SAIDA = "Saida_";

    const INTERVALO = "Intervalo_";

    public function mediaSaidaPorNumero(array $frequenciaNumeros)
    {

        $arrayMedia = [];

        foreach ($frequenciaNumeros as $value => $item){

            $saidaIntervalo = preg_replace('/[0-9]/', '', $value);
            $numeroSaida = preg_replace('/[A-z]/', '', $value);

            $valorTotalArray = array_sum($item);
            $qtdNumeros = count($item);

            if (self::SAIDA == $saidaIntervalo){
                $arrayMedia["Saida"][$numeroSaida] = $valorTotalArray / $qtdNumeros;
            }

            if (self::INTERVALO == $saidaIntervalo){
                $arrayMedia["Intervalo"][$numeroSaida] = $valorTotalArray / $qtdNumeros;
            }

        }

        return $arrayMedia;
    }
}
