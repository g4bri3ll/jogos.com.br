<?php

namespace app\controller;

use config\RequestController;
use Illuminate\Support\Facades\View;
use src\Model\LotoFacil;
use src\Service\LotoFacil\CalculaValorTotalPorJogo;

class ControllerNumerosJogoLotoFacil extends RequestController
{

    public function taksView()
    {

        $request = strtolower($this->exec());

        switch ($request) {
            case 'retornanumerosporquantidademaissaida':
                self::retornaNumerosPorQuantidadeMaisSaida();
                $this->View('paginaInicial', []);
                break;
            case 'retornasomaporjogo':
                self::retornaSomaPorJogo([], 1);
                break;
            case 'redirecionarlistamedianumerosmaissaidos':
                echo "i equals 2";
                break;
            case 'redirecionarposicaosaidas':
                echo "i equals 2";
                break;
            case 'redirecionarquinzenúmerosmaissaidos':
                echo "i equals 2";
                break;
            default:
                self::retornaNumerosPorQuantidadeMaisSaida();
        }
    }

    /**
     * @return array
     */
    public function retornaNumerosPorQuantidadeMaisSaida()
    {

        $qtdNumerosMaisSaidos = 10;

        $lotoFacil = new LotoFacil();
        $resultadosLotoFacil = $lotoFacil->listaNumerosSaidosConcursos();

        foreach ($resultadosLotoFacil as $item) {
            $numerosJogos = explode(",", $item);

            $lotoFacil->contaQtdNumeroMaisSaidos($numerosJogos);
        }

        /**
         * Função que server somente para ordernar o array do maior para o menor
         */
        $lotoFacil->ordernaPorOrdemDescrecente();

        $arrayQtdNumerosMaisSaidos = $lotoFacil->retornaNumerosMaisSaido($qtdNumerosMaisSaidos);

        return $arrayQtdNumerosMaisSaidos;
    }

    /**
     * @param array $resultadosLotoFacil
     * @param int $isRepetido
     * @return array|null
     */
    public function retornaSomaPorJogo(array $resultadosLotoFacil, int $isRepetido)
    {
        $calculaValorTotalPorJogo = new CalculaValorTotalPorJogo();
        $todosJogosSomados = $calculaValorTotalPorJogo->CalculaValorTotalPorJogo($resultadosLotoFacil);

        if ($isRepetido) {
            return $todosJogosSomados;
        }

        return $calculaValorTotalPorJogo->retornaJogoSomandaSemRepetir($todosJogosSomados);
    }
}
