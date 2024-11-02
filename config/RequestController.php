<?php

namespace config;

use Exception;

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

    public function View(string $pag, array $array)
    {

        try {

            if (!session_start()) {
                session_start();
            }

            if (!empty($array)) {
                $_SESSION['attribute'] = $array['value'];
            }

            $_SESSION['paginas'] = $pag . '.php';

            header('Location: view/template.php');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
