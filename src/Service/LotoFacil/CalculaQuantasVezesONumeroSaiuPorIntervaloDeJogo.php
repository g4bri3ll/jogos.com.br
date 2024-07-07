<?php

namespace src\Service\LotoFacil;

use src\Model\LotoFacil;

class CalculaQuantasVezesONumeroSaiuPorIntervaloDeJogo
{

    public function retornaQuantidadePorJogo(array $arrayNumeroLotoFacil)
    {
        $lotoFacil = new LotoFacil();
        $frequencia = new RetornaFrequenciaSaidaNumeros();

        foreach ($lotoFacil->getArrayNumeroLotoFacil() as $num){
            $frequencia->retornaFrequenciaNumeros($arrayNumeroLotoFacil, $num);
        }

        return $frequencia->getArrayNumerosFrequencia();
    }

}
