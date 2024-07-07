<?php

namespace teste;

use app\Controller\ControllerNumerosJogoLotoFacil;
use Uteis\Uteis;

class Exec
{

    public function exe()
    {
        $controllerLotoFacil = new ControllerNumerosJogoLotoFacil();
        $resultadosLotoFacil = $controllerLotoFacil->listaNumerosSaidosConcursos();
//        $arrayNumeroMaisSaidosLotoFacil = $controllerLotoFacil->retornaNumerosPorQuantidadeMaisSaida($resultadosLotoFacil, 10);

//        $frequenciaNumeros = $controllerLotoFacil->retornaAFrequenciaDosNumeros($resultadosLotoFacil);

        $jogo = $controllerLotoFacil->retornaSomaPorJogo($resultadosLotoFacil, 0);

        $jogo = (new Uteis())->ordernaValorMaiorParaMenor($jogo);

        print_r($jogo);
        exit();
    }
}
