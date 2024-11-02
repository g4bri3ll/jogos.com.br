<?php

namespace config;

abstract class RequestController
{

    public function exec()
    {

        $request = explode('/', $_SERVER['REQUEST_URI']);

        if (array_sum($request) <= 0) {
            $request = 'retornanumerosporquantidademaissaida';
        }

        if (!empty($request)) {
            if (is_array($request)) {
                $request = max($request);
            }
        }

        if (empty($request)) {
            echo 'A requisição não foi encontrada, atualize a tela e tente novamente!';
        }

        return $request;
    }
}
