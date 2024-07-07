<?php

namespace src\Service\LotoFacil;

class RetornaFrequenciaSaidaNumeros
{

    private $arrayNumerosFrequencia;

    public function retornaFrequenciaNumeros(
        array $arrayNumeroLotoFacil,
        int $numero,
        int   $qtdNumero = 0,
        array $arrayNumero = [],
        int   $cont = 0,
        array $arrayNumeroIntervalo = [],
        int   $qtdNumeroZero = 0,
        int   $contNumeroZero = 0
    )
    {

        foreach ($arrayNumeroLotoFacil as $num){

            $arrayNumeros = explode(",", $num);

            if (empty($arrayNumeros)){
                echo "Houve um erro no processamento da frequencia dos números";
                exit();
            }

            if (in_array($numero, $arrayNumeros)){
                $qtdNumero = $qtdNumero + 1;
            } else {

                if (!empty($qtdNumeroZero) and $qtdNumero > 0){
                    $arrayNumeroIntervalo[$contNumeroZero] = $qtdNumeroZero;
                    $contNumeroZero = $contNumeroZero + 1;
                    $qtdNumeroZero = 0;
                }

                if (!empty($qtdNumero)){
                    $arrayNumero[$cont] = $qtdNumero;
                    $cont = $cont + 1;
                    $qtdNumero = 0;
                }

                $qtdNumeroZero = $qtdNumeroZero + 1;
            }

        }

        $this->arrayNumerosFrequencia["Saida_" . $numero] = $arrayNumero;
        $this->arrayNumerosFrequencia["Intervalo_" . $numero] = $arrayNumeroIntervalo;

    }

    /**
     * @return mixed
     */
    public function getArrayNumerosFrequencia()
    {
        return $this->arrayNumerosFrequencia;
    }

    /**
     * @param mixed $arrayNumerosFrequencia
     */
    public function setArrayNumerosFrequencia($arrayNumerosFrequencia)
    {
        $this->arrayNumerosFrequencia = $arrayNumerosFrequencia;
    }

}
