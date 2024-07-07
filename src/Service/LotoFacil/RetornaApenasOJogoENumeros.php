<?php

namespace src\Service\LotoFacil;

class RetornaApenasOJogoENumeros
{

    /**
     * @param array $resultadosLotoFacil
     * @return array
     */
    public function limpaArquivoLotoFacil(array $resultadosLotoFacil)
    {

        $result = [];

        foreach ($resultadosLotoFacil as $item){

            if (is_numeric($item[0])){
                $result[$item[0]] = $item[1];
            }

        }

        return $result;
    }
}
