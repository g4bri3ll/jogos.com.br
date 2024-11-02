<?php

namespace app\controller;

use app\Configuracao;

abstract class ControllerNumerosJogador extends Controller
{

    public function retornaNumeroJogador()
    {

        $arquivo = fopen( $_SERVER['DOCUMENT_ROOT'] . "numeroJogador.txt", "r");
        $result = array();
        while(!feof($arquivo)){
            $result = explode("-" ,fgets($arquivo));
        }

        fclose($arquivo);

        if (count($result) != Configuracao::QTD_NUMERO_PERMITIDO){
            echo "Quantidade de númnero inválido!";
            exit;
        }

        return $result;

    }
}
