<?php

namespace teste;

use app\Controller\ControllerNumerosJogoLotoFacil;

class Exec
{

    public function exe()
    {
        $controllerLotoFacil = new ControllerNumerosJogoLotoFacil();
        $arrayNumeroLotoFacil = $controllerLotoFacil->retornaJogoExtraidoArquivoLotoFacil();

//        $arrayNumeroLotoFacil = $controllerLotoFacil->retornaNumerosPorQuantidadeMaisSaida($arrayNumeroLotoFacil, 10);

        $frequenciaNumeros = $controllerLotoFacil->retornaAFrequenciaDosNumeros($arrayNumeroLotoFacil);

        print_r($frequenciaNumeros);
    }
}
