<?php

namespace App\Classes;

use App\Models\LotofacilBD;
use App\Classes\NumerosSorteados;
use App\Models\JogoTresDB;

class Jogo_tres
{

	private $id;
	private $idUser;
	private $status; 
	private $codigo; 
	private $numParUm;
	private $numParDois;
	private $numParTres;
	private $numParQuatro;
	private $numParCinco;
	private $numParSeis; 
	private $numImparUm;
	private $numImparDois;
	private $numImparTres;
	private $numImparQuatro;
	private $numImparCinco;
	private $numImparSeis;

	//Atribuir o set a todos os atributos
	public function __set($atrib, $value){
		$this->$atrib = $value;
	}
	
	//Atribuir o get a todos os atributos
	public function __get($atrib){
		return $this->$atrib;
	}

	public function validaJogo($arrayJogos)
	{

		//Pegar o ultimo jogo da lotofacil cadastro na base de dados
		$lotoBD = new LotofacilBD();
		$arrayUltimoJogo = $lotoBD->ultimoJogo();

		$valida = new NumerosSorteados();
		$arrayJogo = $valida->validaJogos($arrayJogos, $arrayUltimoJogo);

		return $arrayJogo;

	}

	public function retornaJogoPorCodigo($codigo)
    {
        $tres = new JogoTresDB();
        $jogos = $tres->listPeloCodigo($codigo);

        return $jogos;
    }

}

?>