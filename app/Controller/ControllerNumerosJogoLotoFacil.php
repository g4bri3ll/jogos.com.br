<?php

namespace app\Controller;

use config\ConfiguracaoInterface;
use src\Model\LotoFacil;
use src\Service\LotoFacil\CalculaValorTotalPorJogo;

class ControllerNumerosJogoLotoFacil extends LotoFacil implements ConfiguracaoInterface
{

    /**
     * @param array $resultadosLotoFacil
     * @param int $qtdNumerosMaisSaidos
     * @return array
     */
    public function retornaNumerosPorQuantidadeMaisSaida(array $resultadosLotoFacil, int $qtdNumerosMaisSaidos)
    {

        foreach ($resultadosLotoFacil as $item){
            $numerosJogos = explode(",", $item);

            self::contaQtdNumeroMaisSaidos($numerosJogos);
        }

        /**
         * Função que server somente para ordernar o array do maior para o menor
         */
        self::ordernaPorOrdemDescrecente();

        $arrayQtdNumerosMaisSaidos = self::retornaNumerosMaisSaido($qtdNumerosMaisSaidos);

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

        if ($isRepetido){
            return $todosJogosSomados;
        }

        return $calculaValorTotalPorJogo->retornaJogoSomandaSemRepetir($todosJogosSomados);
    }

}
