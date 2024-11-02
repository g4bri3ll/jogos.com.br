<?php

namespace Uteis;

class Uteis
{

    /**
     * @param array $array
     * @return array
     */
    public function ordernaValorMaiorParaMenor(array $array)
    {
        natsort($array);
        return$array;
    }

    /**
     * @return string
     */
    public function gerandoCor()
    {
        $hex = array_merge(range(0, 9), range('A', 'F'));

        $cor = '#';
        while(strlen($cor) < 7){
            $num = rand(0, 15);
            $cor .= $hex[$num];
        }

        return $cor;
    }
}
