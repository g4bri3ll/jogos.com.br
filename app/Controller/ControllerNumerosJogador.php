<?php

namespace app\Controller;

use app\Configuracao;

class ControllerNumerosJogador extends Configuracao
{

    public function retornaNumeroJogador()
    {

        $arquivo = fopen( $_SERVER['DOCUMENT_ROOT'] . "numeroJogador.txt", "r");
        $result = array();
        while(!feof($arquivo)){
            $result = explode("-" ,fgets($arquivo));
        }

        fclose($arquivo);

        if (count($result) != self::QTD_NUMERO_PERMITIDO){
            echo "Quantidade de númnero inválido!";
            exit;
        }

        return $result;

    }
}
