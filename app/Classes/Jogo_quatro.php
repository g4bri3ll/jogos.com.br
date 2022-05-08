<?php

namespace App\Classes;

use App\Models\LotofacilBD;
use App\Classes\NumerosSorteados;
use App\Models\JogoQuatroDB;

class Jogo_quatro
{

	public function retornaJogoPorCodigo($codigo)
    {
        $quatro = new JogoQuatroDB();
        $jogos = $quatro->listPeloCodigo($codigo);

        return $jogos;
    }

	
}

?>
