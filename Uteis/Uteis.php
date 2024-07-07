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
}
