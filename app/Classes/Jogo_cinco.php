<?php

namespace App\Classes;

use App\Models\LotofacilBD;
use App\Classes\NumerosSorteados;
use App\Models\JogoCincoBD;

class Jogo_cinco
{

	public function retornaJogoPorCodigo($codigo)
    {
        $cinco = new JogoCincoBD();
        $jogos = $cinco->listPeloCodigo($codigo);

        return $jogos;
    }

}

?>