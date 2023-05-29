<?php

interface InterfaceServiceAPI
{

    public function buscarTodosDados();

    public function buscarDadosPorConcurso(string $loteria, int $concurso);

    public function buscarDadosPorLoteria(string $loteria);

    public function retornaDadosMaisRecenteDaLoteriaEspecifica();
}
