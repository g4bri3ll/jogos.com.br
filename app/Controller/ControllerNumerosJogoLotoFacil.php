<?php

namespace app\Controller;

use config\ConfiguracaoInterface;
use src\Model\LotoFacil;

class ControllerNumerosJogoLotoFacil extends LotoFacil implements ConfiguracaoInterface
{

    public function retornaJogoExtraidoArquivoLotoFacil()
    {
        $diretorio = "c:\\Users\\teste\\Downloads\\loto_facil_asloterias_ate_concurso_3147_sorteio.xlsx";

        $handle = fopen($diretorio, "r");

        $data = fgets($handle, 12);

//        $contents = fread($handle, filesize($diretorio));

        print_r($data);

        fclose($data);

        exit();

        $resultLotofacil = array();
        while (($line = fgets($arquivoLotofacil)) !== false) {
            $resultLotofacil[] = explode(" - ", $line);
        }
        fclose($arquivoLotofacil);

        return $resultLotofacil;

    }

    /**
     * @param array $resultadosLotoFacil
     * @param int $qtdNumerosMaisSaidos
     * @return array
     */
    public function retornaNumerosPorQuantidadeMaisSaida(array $resultadosLotoFacil, int $qtdNumerosMaisSaidos)
    {

        foreach ($resultadosLotoFacil as $item){

            if (is_numeric($item[0])){

                $numeros = $item[1];

                $numerosJogos = explode(",", $numeros);

                self::contaQtdNumeroMaisSaidos($numerosJogos);

            }

        }

        /**
         * Função que server somente para ordernar o array do maior para o menor
         */
        self::ordernaPorOrdemDescrecente();

        $arrayQtdNumerosMaisSaidos = self::retornaNumerosMaisSaido($qtdNumerosMaisSaidos);

        return $arrayQtdNumerosMaisSaidos;

    }

}
