<?php

namespace App\Services;

class ServiceAPI implements \InterfaceServiceAPI
{

    public function buscarTodosDados()
    {
        return 'https://loteriascaixa-api.herokuapp.com/api';
    }

    public function buscarDadosPorConcurso(string $loteria, int $concurso)
    {
        // TODO: Implement buscarDadosPorConcurso() method.
    }

    public function buscarDadosPorLoteria(string $loteria)
    {
        // TODO: Implement buscarDadosPorLoteria() method.
    }

    public function retornaDadosMaisRecenteDaLoteriaEspecifica()
    {
        // TODO: Implement retornaDadosMaisRecenteDaLoteriaEspecifica() method.
    }
}
