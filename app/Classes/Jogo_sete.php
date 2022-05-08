<?php

namespace App\Classes;

use App\Models\LotofacilBD;
use App\Classes\NumerosSorteados;
use App\Models\JogoSeteBD;

class Jogo_sete
{

	public function retornaJogoPorCodigo($codigo)
    {
        $sete = new JogoSeteBD();
        $jogos = $sete->listPeloCodigo($codigo);

        return $jogos;
    }

}

?>