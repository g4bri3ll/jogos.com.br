<?php

namespace App\Classes;

use App\Models\JogoTresBD;
use App\Models\JogoQuatroDB;
use App\Models\JogoSeteBD;
use App\Models\LotofacilBD;
use Auth;
use App\Models\JogoCincoBD;
use App\Classes\Numeros;

class Lotofacil
{

	//Pegar os quinze numeros
	private $um;
	private $dois;
	private $tres;
	private $quatro;
	private $cinco;
	private $seis;
	private $sete;
	private $oito;
	private $nove;
	private $dez;
	private $onze;
	private $doze;
	private $treze;
	private $quartoze;
	private $quinze;
	private $dezesseis;
	private $dezessete;
	private $dezoito;
	private $dezenove;
	private $vinte;
	private $vinteUm;
	private $vinteDois;
	private $vinteTres;
	private $vinteQuatro;
	private $vinteCinco;

	public function validaJogo($arrayJogos, $idConcurso)
	{

		$arrayUltimoJogo = 0;
		
		if(is_null($idConcurso)){ 
			//Pegar o ultimo jogo da lotofacil cadastro na 	base de dados
			$lotoBD = new LotofacilBD();
			$arrayUltimoJogo = $lotoBD->ultimoJogo();
		} else {
			//Pegar o ultimo jogo da lotofacil cadastro na base de dados
			$lotoBD = new LotofacilBD();
			$arrayUltimoJogo = $lotoBD->listaPorIdConcurso($idConcurso);
		}

		$valida = new NumerosSorteados();
		$arrayJogo = $valida->validaJogos($arrayJogos, $arrayUltimoJogo);

		return $arrayJogo;

	}
	
	//Gera os trezes jogos para a tela index
	public function GerarJogos($codigo)
	{

		//Pegar o id do usuário na session
		$idUser = Auth::user()->id;
		$salvar = 0;

		//Pegar os 25 numeros da lotofacil
		$numerosTotais = new Numeros();
		$arrayNumeros = $numerosTotais->Numeros();

		//Pegar os numeros escolhidos de par e impar. Os dozes numeros
		$jogos = new JogoTresBD();
		$arrayJogos = $jogos->resgataJogo($codigo);

		//Monstando o array com os numeros faltando que não foram jogados
		$numerosFaltante = array();
		$cont = 0;
		
		foreach ($arrayJogos as $value) {

			for ($i = 0;$i < count($arrayNumeros);$i++) {
				
				//Tem que iniciar toda vez que o numero estiver no banco de dados para não pegar o numero
				$verificar = false;

				if ($arrayNumeros[$i] == $value->num_par_um) {
					$this->um = $value->num_par_um;
					$verificar = true;
				}
				if ($arrayNumeros[$i] == $value->num_par_dois) {
					$this->dois = $value->num_par_dois;
					$verificar = true;
				}
				if ($arrayNumeros[$i] == $value->num_par_tres) {
					$this->tres = $value->num_par_tres;
					$verificar = true;
				}
				if ($arrayNumeros[$i] == $value->num_par_quatro) {
					$this->quatro = $value->num_par_quatro;
					$verificar = true;
				}
				if ($arrayNumeros[$i] == $value->num_par_cinco) {
					$this->cinco = $value->num_par_cinco;
					$verificar = true;
				}
				if ($arrayNumeros[$i] == $value->num_par_seis) {
					$this->seis = $value->num_par_seis;
					$verificar = true;
				}
				if ($arrayNumeros[$i] == $value->num_impar_um) {
					$this->sete = $value->num_impar_um;
					$verificar = true;
				}
				if ($arrayNumeros[$i] == $value->num_impar_dois) {
					$this->oito = $value->num_impar_dois;
					$verificar = true;
				}
				if ($arrayNumeros[$i] == $value->num_impar_tres) {
					$this->nove = $value->num_impar_tres;
					$verificar = true;
				}
				if ($arrayNumeros[$i] == $value->num_impar_quatro) {
					$this->dez = $value->num_impar_quatro;
					$verificar = true;
				}
				if ($arrayNumeros[$i] == $value->num_impar_cinco) {
					$this->onze = $value->num_impar_cinco;
					$verificar = true;
				}
				if ($arrayNumeros[$i] == $value->num_impar_seis) {
					$this->doze = $value->num_impar_seis;
					$verificar = true;
				}
				
				if ($verificar == false) {
					
					$numerosFaltante[$cont] = $arrayNumeros[$i];

					$cont = $cont + 1;
				}

			}

		}

		$percorrer   = 0;
		$geradorCont = 0;
		//Pecorrer o array pra pegar os 3 numeros faltantes
		while ($percorrer < '13') {

			$inicio   = 0;
			$this->treze    = 0;
			$this->quartoze = 0;
			$this->quinze   = 0;

			for ($i=0; $i < 3; $i++) {

				//Faz o gerador pegar o numero diferente para os jogos
				$geradorCont = $geradorCont + $i + 3;

				//Atribuir o valor zero novamente, se o gerador passar de 13
				if ($geradorCont >= 13 || $geradorCont >= 12 || $geradorCont >= 11) {
					$geradorCont = $geradorCont - 11;
				}
				
				if (empty($inicio)) {
					$this->treze    = $numerosFaltante[$geradorCont];

				} else if ($inicio == 1) {

					$this->quartoze = $numerosFaltante[$geradorCont];

				} else {

					$this->quinze   = $numerosFaltante[$geradorCont];	

				}

				$inicio = $inicio + 1;

			}

			$numeros = new Numeros();
			$numeros->um       = $this->um;
			$numeros->dois     = $this->dois;
			$numeros->tres     = $this->tres;
			$numeros->quatro   = $this->quatro;
			$numeros->cinco    = $this->cinco;
			$numeros->seis     = $this->seis;
			$numeros->sete     = $this->sete;
			$numeros->oito     = $this->oito;
			$numeros->nove     = $this->nove;
			$numeros->dez      = $this->dez;
			$numeros->onze     = $this->onze;
			$numeros->doze     = $this->doze;
			$numeros->treze    = $this->treze;
			$numeros->quartoze = $this->quartoze;
			$numeros->quinze   = $this->quinze;

			//Vai gravar os jogos no banco de dados
			$jogosDB = new JogoTresBD();
			$jogosDB->salvaJogosDeTresPorTres($numeros, $codigo, $idUser, $salvar);

			$percorrer = $percorrer + 1;

		}

		return true;

	}

	//Retorna o jogo de 4 numeros
	public function gerarJogoQuatro($arrayVinteCincoNumeros, $codigo)
	{
		
		$v = false;

    	$idUser      = Auth::user()->id;
    	$status      = 0;
    	$contador    = 0;
    	
    	//Pegar os onze numeros
    	while ($contador < 11) {

    		$inicio      = 0;
    		$array = $arrayVinteCincoNumeros;

    		while ($inicio < 15) {

    			$a = count($array) - 1;
    			$geradorCont = rand(1,$a);

				if (empty($inicio)) {
					$this->um = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 1) {
					$this->dois = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 2) {
					$this->tres = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 3) {
					$this->quatro = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 4) {
					$this->cinco = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 5) {
					$this->seis = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 6) {
					$this->sete = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 7) {
					$this->oito = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 8) {
					$this->nove = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 9) {
					$this->dez = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 10) {
					$this->onze = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 11) {
					$this->doze = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 12) {
					$this->treze = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 13) {
					$this->quartoze = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 14) {
					$this->quinze   = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				}

				$inicio = $inicio + 1;

			}

    		$numeros = new Numeros();
			$numeros->um       = $this->um;
			$numeros->dois     = $this->dois;
			$numeros->tres     = $this->tres;
			$numeros->quatro   = $this->quatro;
			$numeros->cinco    = $this->cinco;
			$numeros->seis     = $this->seis;
			$numeros->sete     = $this->sete;
			$numeros->oito     = $this->oito;
			$numeros->nove     = $this->nove;
			$numeros->dez      = $this->dez;
			$numeros->onze     = $this->onze;
			$numeros->doze     = $this->doze;
			$numeros->treze    = $this->treze;
			$numeros->quartoze = $this->quartoze;
			$numeros->quinze   = $this->quinze;
			$numeros->codigo   = $codigo;
			$numeros->idUser   = $idUser;
			$numeros->status   = 0;

			//Vai gravar os jogos no banco de dados
			$jogosDB = new JogoQuatroDB();
			$v = $jogosDB->salvaJogos($numeros);

    		$contador = $contador + 1;

    	}

	}

	//Retorna o jogo de 5 numeros
	public function gerarJogoCinco($arrayVinteCincoNumeros, $codigo)
	{
		
		$v = false;

    	$idUser      = Auth::user()->id;
    	$status      = 0;
    	$contador    = 0;
    	
    	//Pegar os onze numeros
    	while ($contador < 25) {

    		$inicio = 0;
    		$array = $arrayVinteCincoNumeros;

    		while ($inicio < 15) {

    			$a = count($array) - 1;
    			$geradorCont = rand(1,$a);

				if (empty($inicio)) {
					$this->um = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 1) {
					$this->dois = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 2) {
					$this->tres = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 3) {
					$this->quatro = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 4) {
					$this->cinco = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 5) {
					$this->seis = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 6) {
					$this->sete = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 7) {
					$this->oito = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 8) {
					$this->nove = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 9) {
					$this->dez = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 10) {
					$this->onze = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 11) {
					$this->doze = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 12) {
					$this->treze = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 13) {
					$this->quartoze = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 14) {
					$this->quinze   = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				}

				$inicio = $inicio + 1;

			}

    		$numeros = new Numeros();
			$numeros->um       = $this->um;
			$numeros->dois     = $this->dois;
			$numeros->tres     = $this->tres;
			$numeros->quatro   = $this->quatro;
			$numeros->cinco    = $this->cinco;
			$numeros->seis     = $this->seis;
			$numeros->sete     = $this->sete;
			$numeros->oito     = $this->oito;
			$numeros->nove     = $this->nove;
			$numeros->dez      = $this->dez;
			$numeros->onze     = $this->onze;
			$numeros->doze     = $this->doze;
			$numeros->treze    = $this->treze;
			$numeros->quartoze = $this->quartoze;
			$numeros->quinze   = $this->quinze;
			$numeros->codigo   = $codigo;
			$numeros->idUser   = $idUser;
			$numeros->status   = 0;

			//Vai gravar os jogos no banco de dados
			$jogosDB = new JogoCincoBD();
			$v = $jogosDB->salvaJogos($numeros);

    		$contador = $contador + 1;

    	}

    	return $v;

	}

	//Retorna o jogo de 7 numeros
	public function gerarJogoSete($arrayVinteCincoNumeros, $codigo)
	{
		
		$v = false;

    	$idUser      = Auth::user()->id;
    	$status      = 0;
    	$contador    = 0;
    	
    	//Pegar os onze numeros
    	while ($contador < 23) {

    		$inicio      = 0;
    		$array = $arrayVinteCincoNumeros;

    		while ($inicio < 15) {

    			$a = count($array) - 1;
    			$geradorCont = rand(1,$a);

				if (empty($inicio)) {
					$this->um = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 1) {
					$this->dois = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 2) {
					$this->tres = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 3) {
					$this->quatro = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 4) {
					$this->cinco = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 5) {
					$this->seis = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 6) {
					$this->sete = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 7) {
					$this->oito = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 8) {
					$this->nove = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 9) {
					$this->dez = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 10) {
					$this->onze = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 11) {
					$this->doze = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 12) {
					$this->treze = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 13) {
					$this->quartoze = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				} else if ($inicio == 14) {
					$this->quinze   = $array[$geradorCont];
					unset($array[$geradorCont]);
					$array = array_merge($array);
				}

				$inicio = $inicio + 1;

			}

    		$numeros = new Numeros();
			$numeros->um       = $this->um;
			$numeros->dois     = $this->dois;
			$numeros->tres     = $this->tres;
			$numeros->quatro   = $this->quatro;
			$numeros->cinco    = $this->cinco;
			$numeros->seis     = $this->seis;
			$numeros->sete     = $this->sete;
			$numeros->oito     = $this->oito;
			$numeros->nove     = $this->nove;
			$numeros->dez      = $this->dez;
			$numeros->onze     = $this->onze;
			$numeros->doze     = $this->doze;
			$numeros->treze    = $this->treze;
			$numeros->quartoze = $this->quartoze;
			$numeros->quinze   = $this->quinze;
			$numeros->codigo   = $codigo;
			$numeros->idUser   = $idUser;
			$numeros->status   = 0;

			//Vai gravar os jogos no banco de dados
			$jogosDB = new JogoSeteBD();
			$v = $jogosDB->salvaJogos($numeros);

    		$contador = $contador + 1;

    	}

    	return $v;

	}

	public function retornaMaioresNumeros($arrays)
	{

		foreach ($arrays as $value) {
			
			if ($value->um_num == '1' || $value->dois_num == '1' || $value->tres_num == '1' || $value->quatro_num == '1' || $value->cinco_num == '1' || $value->seis_num == '1' || $value->sete_num == '1' || $value->oito_num == '1' || $value->nove_num == '1' || $value->dez_num == '1' || $value->onze_num == '1' || $value->doze_num == '1' || $value->treze_num == '1' || $value->quartoze_num == '1' || $value->quinze_num == '1') {
				$this->um = $this->um + 1;
			}

			if ($value->um_num == '2' || $value->dois_num == '2' || $value->tres_num == '2' || $value->quatro_num == '2' || $value->cinco_num == '2' || $value->seis_num == '2' || $value->sete_num == '2' || $value->oito_num == '2' || $value->nove_num == '2' || $value->dez_num == '2' || $value->onze_num == '2' || $value->doze_num == '2' || $value->treze_num == '2' || $value->quartoze_num == '2' || $value->quinze_num == '2') {
				$this->dois = $this->dois + 1;
			}

			if ($value->um_num == '3' || $value->dois_num == '3' || $value->tres_num == '3' || $value->quatro_num == '3' || $value->cinco_num == '3' || $value->seis_num == '3' || $value->sete_num == '3' || $value->oito_num == '3' || $value->nove_num == '3' || $value->dez_num == '3' || $value->onze_num == '3' || $value->doze_num == '3' || $value->treze_num == '3' || $value->quartoze_num == '3' || $value->quinze_num == '3') {
				$this->tres = $this->tres + 1;
			}

			if ($value->um_num == '4' || $value->dois_num == '4' || $value->tres_num == '4' || $value->quatro_num == '4' || $value->cinco_num == '4' || $value->seis_num == '4' || $value->sete_num == '4' || $value->oito_num == '4' || $value->nove_num == '4' || $value->dez_num == '4' || $value->onze_num == '4' || $value->doze_num == '4' || $value->treze_num == '4' || $value->quartoze_num == '4' || $value->quinze_num == '4') {
				$this->quatro = $this->quatro + 1;
			}

			if ($value->um_num == '5' || $value->dois_num == '5' || $value->tres_num == '5' || $value->quatro_num == '5' || $value->cinco_num == '5' || $value->seis_num == '5' || $value->sete_num == '5' || $value->oito_num == '5' || $value->nove_num == '5' || $value->dez_num == '5' || $value->onze_num == '5' || $value->doze_num == '5' || $value->treze_num == '5' || $value->quartoze_num == '5' || $value->quinze_num == '5') {
				$this->cinco = $this->cinco + 1;
			}
			if ($value->um_num == '6' || $value->dois_num == '6' || $value->tres_num == '6' || $value->quatro_num == '6' || $value->cinco_num == '6' || $value->seis_num == '6' || $value->sete_num == '6' || $value->oito_num == '6' || $value->nove_num == '6' || $value->dez_num == '6' || $value->onze_num == '6' || $value->doze_num == '6' || $value->treze_num == '6' || $value->quartoze_num == '6' || $value->quinze_num == '6') {
				$this->seis = $this->seis + 1;
			}

			if ($value->um_num == '7' || $value->dois_num == '7' || $value->tres_num == '7' || $value->quatro_num == '7' || $value->cinco_num == '7' || $value->seis_num == '7' || $value->sete_num == '7' || $value->oito_num == '7' || $value->nove_num == '7' || $value->dez_num == '7' || $value->onze_num == '7' || $value->doze_num == '7' || $value->treze_num == '7' || $value->quartoze_num == '7' || $value->quinze_num == '7') {
				$this->sete = $this->sete + 1;
			}

			if ($value->um_num == '8' || $value->dois_num == '8' || $value->tres_num == '8' || $value->quatro_num == '8' || $value->cinco_num == '8' || $value->seis_num == '8' || $value->sete_num == '8' || $value->oito_num == '8' || $value->nove_num == '8' || $value->dez_num == '8' || $value->onze_num == '8' || $value->doze_num == '8' || $value->treze_num == '8' || $value->quartoze_num == '8' || $value->quinze_num == '8') {
				$this->oito = $this->oito + 1;
			}

			if ($value->um_num == '9' || $value->dois_num == '9' || $value->tres_num == '9' || $value->quatro_num == '9' || $value->cinco_num == '9' || $value->seis_num == '9' || $value->sete_num == '9' || $value->oito_num == '9' || $value->nove_num == '9' || $value->dez_num == '9' || $value->onze_num == '9' || $value->doze_num == '9' || $value->treze_num == '9' || $value->quartoze_num == '9' || $value->quinze_num == '9') {
				$this->nove = $this->nove + 1;
			}

			if ($value->um_num == '10' || $value->dois_num == '10' || $value->tres_num == '10' || $value->quatro_num == '10' || $value->cinco_num == '10' || $value->seis_num == '10' || $value->sete_num == '10' || $value->oito_num == '10' || $value->nove_num == '10' || $value->dez_num == '10' || $value->onze_num == '10' || $value->doze_num == '10' || $value->treze_num == '10' || $value->quartoze_num == '10' || $value->quinze_num == '10') {
				$this->dez = $this->dez + 1;
			}

			if ($value->um_num == '11' || $value->dois_num == '11' || $value->tres_num == '11' || $value->quatro_num == '11' || $value->cinco_num == '11' || $value->seis_num == '11' || $value->sete_num == '11' || $value->oito_num == '11' || $value->nove_num == '11' || $value->dez_num == '11' || $value->onze_num == '11' || $value->doze_num == '11' || $value->treze_num == '11' || $value->quartoze_num == '11' || $value->quinze_num == '11') {
				$this->onze = $this->onze + 1;
			}
			
			if ($value->um_num == '12' || $value->dois_num == '12' || $value->tres_num == '12' || $value->quatro_num == '12' || $value->cinco_num == '12' || $value->seis_num == '12' || $value->sete_num == '12' || $value->oito_num == '12' || $value->nove_num == '12' || $value->dez_num == '12' || $value->onze_num == '12' || $value->doze_num == '12' || $value->treze_num == '12' || $value->quartoze_num == '12' || $value->quinze_num == '12') {
				$this->doze = $this->doze + 1;
			}
			
			if ($value->um_num == '13' || $value->dois_num == '13' || $value->tres_num == '13' || $value->quatro_num == '13' || $value->cinco_num == '13' || $value->seis_num == '13' || $value->sete_num == '13' || $value->oito_num == '13' || $value->nove_num == '13' || $value->dez_num == '13' || $value->onze_num == '13' || $value->doze_num == '13' || $value->treze_num == '13' || $value->quartoze_num == '13' || $value->quinze_num == '13') {
				$this->treze = $this->treze + 1;
			}
			
			if ($value->um_num == '14' || $value->dois_num == '14' || $value->tres_num == '14' || $value->quatro_num == '14' || $value->cinco_num == '14' || $value->seis_num == '14' || $value->sete_num == '14' || $value->oito_num == '14' || $value->nove_num == '14' || $value->dez_num == '14' || $value->onze_num == '14' || $value->doze_num == '14' || $value->treze_num == '14' || $value->quartoze_num == '14' || $value->quinze_num == '14') {
				$this->quartoze = $this->quartoze + 1;
			}
			
			if ($value->um_num == '15' || $value->dois_num == '15' || $value->tres_num == '15' || $value->quatro_num == '15' || $value->cinco_num == '15' || $value->seis_num == '15' || $value->sete_num == '15' || $value->oito_num == '15' || $value->nove_num == '15' || $value->dez_num == '15' || $value->onze_num == '15' || $value->doze_num == '15' || $value->treze_num == '15' || $value->quartoze_num == '15' || $value->quinze_num == '15') {
				$this->quinze = $this->quinze + 1;
			}
			
			if ($value->um_num == '16' || $value->dois_num == '16' || $value->tres_num == '16' || $value->quatro_num == '16' || $value->cinco_num == '16' || $value->seis_num == '16' || $value->sete_num == '16' || $value->oito_num == '16' || $value->nove_num == '16' || $value->dez_num == '16' || $value->onze_num == '16' || $value->doze_num == '16' || $value->treze_num == '16' || $value->quartoze_num == '16' || $value->quinze_num == '16') {
				$this->dezesseis = $this->dezesseis + 1;
			}
			
			if ($value->um_num == '17' || $value->dois_num == '17' || $value->tres_num == '17' || $value->quatro_num == '17' || $value->cinco_num == '17' || $value->seis_num == '17' || $value->sete_num == '17' || $value->oito_num == '17' || $value->nove_num == '17' || $value->dez_num == '17' || $value->onze_num == '17' || $value->doze_num == '17' || $value->treze_num == '17' || $value->quartoze_num == '17' || $value->quinze_num == '17') {
				$this->dezessete = $this->dezessete + 1;
			}
			
			if ($value->um_num == '18' || $value->dois_num == '18' || $value->tres_num == '18' || $value->quatro_num == '18' || $value->cinco_num == '18' || $value->seis_num == '18' || $value->sete_num == '18' || $value->oito_num == '18' || $value->nove_num == '18' || $value->dez_num == '18' || $value->onze_num == '18' || $value->doze_num == '18' || $value->treze_num == '18' || $value->quartoze_num == '18' || $value->quinze_num == '18') {
				$this->dezoito = $this->dezoito + 1;
			}
			
			if ($value->um_num == '19' || $value->dois_num == '19' || $value->tres_num == '19' || $value->quatro_num == '19' || $value->cinco_num == '19' || $value->seis_num == '19' || $value->sete_num == '19' || $value->oito_num == '19' || $value->nove_num == '19' || $value->dez_num == '19' || $value->onze_num == '19' || $value->doze_num == '19' || $value->treze_num == '19' || $value->quartoze_num == '19' || $value->quinze_num == '19') {
				$this->dezenove = $this->dezenove + 1;
			}
			
			if ($value->um_num == '20' || $value->dois_num == '20' || $value->tres_num == '20' || $value->quatro_num == '20' || $value->cinco_num == '20' || $value->seis_num == '20' || $value->sete_num == '20' || $value->oito_num == '20' || $value->nove_num == '20' || $value->dez_num == '20' || $value->onze_num == '20' || $value->doze_num == '20' || $value->treze_num == '20' || $value->quartoze_num == '20' || $value->quinze_num == '20') {
				$this->vinte = $this->vinte + 1;
			}
			
			if ($value->um_num == '21' || $value->dois_num == '21' || $value->tres_num == '21' || $value->quatro_num == '21' || $value->cinco_num == '21' || $value->seis_num == '21' || $value->sete_num == '21' || $value->oito_num == '21' || $value->nove_num == '21' || $value->dez_num == '21' || $value->onze_num == '21' || $value->doze_num == '21' || $value->treze_num == '21' || $value->quartoze_num == '21' || $value->quinze_num == '21') {
				$this->vinteUm = $this->vinteUm + 1;
			}
			
			if ($value->um_num == '22' || $value->dois_num == '22' || $value->tres_num == '22' || $value->quatro_num == '22' || $value->cinco_num == '22' || $value->seis_num == '22' || $value->sete_num == '22' || $value->oito_num == '22' || $value->nove_num == '22' || $value->dez_num == '22' || $value->onze_num == '22' || $value->doze_num == '22' || $value->treze_num == '22' || $value->quartoze_num == '22' || $value->quinze_num == '22') {
				$this->vinteDois = $this->vinteDois + 1;
			}
			
			if ($value->um_num == '23' || $value->dois_num == '23' || $value->tres_num == '23' || $value->quatro_num == '23' || $value->cinco_num == '23' || $value->seis_num == '23' || $value->sete_num == '23' || $value->oito_num == '23' || $value->nove_num == '23' || $value->dez_num == '23' || $value->onze_num == '23' || $value->doze_num == '23' || $value->treze_num == '23' || $value->quartoze_num == '23' || $value->quinze_num == '23') {
				$this->vinteTres = $this->vinteTres + 1;
			}

			if ($value->um_num == '24' || $value->dois_num == '24' || $value->tres_num == '24' || $value->quatro_num == '24' || $value->cinco_num == '24' || $value->seis_num == '24' || $value->sete_num == '24' || $value->oito_num == '24' || $value->nove_num == '24' || $value->dez_num == '24' || $value->onze_num == '24' || $value->doze_num == '24' || $value->treze_num == '24' || $value->quartoze_num == '24' || $value->quinze_num == '24') {
				$this->vinteQuatro = $this->vinteQuatro + 1;
			}

			if ($value->um_num == '25' || $value->dois_num == '25' || $value->tres_num == '25' || $value->quatro_num == '25' || $value->cinco_num == '25' || $value->seis_num == '25' || $value->sete_num == '25' || $value->oito_num == '25' || $value->nove_num == '25' || $value->dez_num == '25' || $value->onze_num == '25' || $value->doze_num == '25' || $value->treze_num == '25' || $value->quartoze_num == '25' || $value->quinze_num == '25') {
				$this->vinteCinco = $this->vinteCinco + 1;
			}

		}

		//Colocar no array os valores
		$arrayQtd = [
			'qtd' => [$this->um, $this->dois, $this->tres, $this->quatro, $this->cinco, $this->seis, $this->sete, $this->oito, $this->nove, $this->dez, $this->onze, $this->doze, $this->treze, $this->quartoze, $this->quinze, $this->dezesseis, $this->dezessete, $this->dezoito, $this->dezenove, $this->vinte,  $this->vinteUm, $this->vinteDois, $this->vinteTres, $this->vinteQuatro, $this->vinteCinco],
			'cores' => ['rgba(254, 80, 0, 1)', 'rgba(254, 80, 0, .92)', 'rgba(254, 80, 0, .84)', 'rgba(254, 80, 0, .76)', 'rgba(254, 80, 0, .68)', 'rgba(254, 80, 0, .6)', 'rgba(254, 80, 0, .52)', 'rgba(254, 80, 0, .44)', 'rgba(254, 80, 0, .36)', 'rgba(254, 80, 0, .28)', 'rgba(254, 80, 0, .2)', 'rgba(254, 80, 0, .12)', '#FFFFF0', 'rgba(3, 126, 243, .12)', 'rgba(3, 126, 243, .2)', 'rgba(3, 126, 243, .28)', 'rgba(3, 126, 243, .36)', 'rgba(3, 126, 243, .44)', 'rgba(3, 126, 243, .52)', 'rgba(3, 126, 243, .6)', 'rgba(3, 126, 243, .68)', 'rgba(3, 126, 243, .76)', 'rgba(3, 126, 243, .84)', 'rgba(3, 126, 243, .92)', 'rgba(3, 126, 243, 1)']
		];

		//Colocar os maiores numeros na posição da grente do array
		return $arrayQtd;
		
	}

	public function verificarNumerosRepetidos($arrays)
	{

		$arrayContador = array();
		$c = 0;

		for ($i=0; $i < count($arrays); $i++) {
			
			$a = $i + 1;
			//Pegar os numeros repetidos
			$contt = 0;

			//Verificar se o $a e menor que o contador
			if (count($arrays) > $a) {
				
				if ($arrays[$i]->um_num == 
					$arrays[$a]->um_num || 
					$arrays[$i]->dois_num == $arrays[$a]->um_num || 
					$arrays[$i]->tres_num == $arrays[$a]->um_num || 
					$arrays[$i]->quatro_num == $arrays[$a]->um_num || 
					$arrays[$i]->cinco_num == $arrays[$a]->um_num || 
					$arrays[$i]->seis_num == $arrays[$a]->um_num || 
					$arrays[$i]->sete_num == $arrays[$a]->um_num || 
					$arrays[$i]->oito_num == $arrays[$a]->um_num || 
					$arrays[$i]->nove_num == $arrays[$a]->um_num || 
					$arrays[$i]->dez_num == $arrays[$a]->um_num || 
					$arrays[$i]->onze_num == $arrays[$a]->um_num || 
					$arrays[$i]->doze_num == $arrays[$a]->um_num || 
					$arrays[$i]->treze_num == $arrays[$a]->um_num || 
					$arrays[$i]->quartoze_num == $arrays[$a]->um_num || 
					$arrays[$i]->quinze_num == $arrays[$a]->um_num) {
					$contt = $contt + 1;
				}

				if ($arrays[$i]->um_num == $arrays[$a]->dois_num || 
					$arrays[$i]->dois_num == $arrays[$a]->dois_num || 
					$arrays[$i]->tres_num == $arrays[$a]->dois_num || 
					$arrays[$i]->quatro_num == $arrays[$a]->dois_num || 
					$arrays[$i]->cinco_num == $arrays[$a]->dois_num || 
					$arrays[$i]->seis_num == $arrays[$a]->dois_num || 
					$arrays[$i]->sete_num == $arrays[$a]->dois_num || 
					$arrays[$i]->oito_num == $arrays[$a]->dois_num || 
					$arrays[$i]->nove_num == $arrays[$a]->dois_num || 
					$arrays[$i]->dez_num == $arrays[$a]->dois_num || 
					$arrays[$i]->onze_num == $arrays[$a]->dois_num || 
					$arrays[$i]->doze_num == $arrays[$a]->dois_num || 
					$arrays[$i]->treze_num == $arrays[$a]->dois_num || 
					$arrays[$i]->quartoze_num == $arrays[$a]->dois_num || 
					$arrays[$i]->quinze_num == $arrays[$a]->dois_num) {
					$contt = $contt + 1;
				}

				if ($arrays[$i]->um_num == $arrays[$a]->tres_num || 
					$arrays[$i]->dois_num == $arrays[$a]->tres_num || 
					$arrays[$i]->tres_num == $arrays[$a]->tres_num || 
					$arrays[$i]->quatro_num == $arrays[$a]->tres_num || 
					$arrays[$i]->cinco_num == $arrays[$a]->tres_num || 
					$arrays[$i]->seis_num == $arrays[$a]->tres_num || 
					$arrays[$i]->sete_num == $arrays[$a]->tres_num || 
					$arrays[$i]->oito_num == $arrays[$a]->tres_num || 
					$arrays[$i]->nove_num == $arrays[$a]->tres_num || 
					$arrays[$i]->dez_num == $arrays[$a]->tres_num || 
					$arrays[$i]->onze_num == $arrays[$a]->tres_num || 
					$arrays[$i]->doze_num == $arrays[$a]->tres_num || 
					$arrays[$i]->treze_num == $arrays[$a]->tres_num || 
					$arrays[$i]->quartoze_num == $arrays[$a]->tres_num || 
					$arrays[$i]->quinze_num == $arrays[$a]->tres_num) {
					$contt = $contt + 1;
				}

				if ($arrays[$i]->um_num == $arrays[$a]->quatro_num || 
					$arrays[$i]->dois_num == $arrays[$a]->quatro_num || 
					$arrays[$i]->tres_num == $arrays[$a]->quatro_num || 
					$arrays[$i]->quatro_num == $arrays[$a]->quatro_num || 
					$arrays[$i]->cinco_num == $arrays[$a]->quatro_num || 
					$arrays[$i]->seis_num == $arrays[$a]->quatro_num || 
					$arrays[$i]->sete_num == $arrays[$a]->quatro_num || 
					$arrays[$i]->oito_num == $arrays[$a]->quatro_num || 
					$arrays[$i]->nove_num == $arrays[$a]->quatro_num || 
					$arrays[$i]->dez_num == $arrays[$a]->quatro_num || 
					$arrays[$i]->onze_num == $arrays[$a]->quatro_num || 
					$arrays[$i]->doze_num == $arrays[$a]->quatro_num || 
					$arrays[$i]->treze_num == $arrays[$a]->quatro_num || 
					$arrays[$i]->quartoze_num == $arrays[$a]->quatro_num || 
					$arrays[$i]->quinze_num == $arrays[$a]->quatro_num) {
					$contt = $contt + 1;
				}

				if ($arrays[$i]->um_num == $arrays[$a]->cinco_num || 
					$arrays[$i]->dois_num == $arrays[$a]->cinco_num || 
					$arrays[$i]->tres_num == $arrays[$a]->cinco_num || 
					$arrays[$i]->quatro_num == $arrays[$a]->cinco_num || 
					$arrays[$i]->cinco_num == $arrays[$a]->cinco_num || 
					$arrays[$i]->seis_num == $arrays[$a]->cinco_num || 
					$arrays[$i]->sete_num == $arrays[$a]->cinco_num || 
					$arrays[$i]->oito_num == $arrays[$a]->cinco_num || 
					$arrays[$i]->nove_num == $arrays[$a]->cinco_num || 
					$arrays[$i]->dez_num == $arrays[$a]->cinco_num || 
					$arrays[$i]->onze_num == $arrays[$a]->cinco_num || 
					$arrays[$i]->doze_num == $arrays[$a]->cinco_num || 
					$arrays[$i]->treze_num == $arrays[$a]->cinco_num || 
					$arrays[$i]->quartoze_num == $arrays[$a]->cinco_num || 
					$arrays[$i]->quinze_num == $arrays[$a]->cinco_num) {
					$contt = $contt + 1;
				}

				if ($arrays[$i]->um_num == $arrays[$a]->seis_num || 
					$arrays[$i]->dois_num == $arrays[$a]->seis_num || 
					$arrays[$i]->tres_num == $arrays[$a]->seis_num || 
					$arrays[$i]->quatro_num == $arrays[$a]->seis_num || 
					$arrays[$i]->cinco_num == $arrays[$a]->seis_num || 
					$arrays[$i]->seis_num == $arrays[$a]->seis_num || 
					$arrays[$i]->sete_num == $arrays[$a]->seis_num || 
					$arrays[$i]->oito_num == $arrays[$a]->seis_num || 
					$arrays[$i]->nove_num == $arrays[$a]->seis_num || 
					$arrays[$i]->dez_num == $arrays[$a]->seis_num || 
					$arrays[$i]->onze_num == $arrays[$a]->seis_num || 
					$arrays[$i]->doze_num == $arrays[$a]->seis_num || 
					$arrays[$i]->treze_num == $arrays[$a]->seis_num || 
					$arrays[$i]->quartoze_num == $arrays[$a]->seis_num || 
					$arrays[$i]->quinze_num == $arrays[$a]->seis_num) {
					$contt = $contt + 1;
				}

				if ($arrays[$i]->um_num == $arrays[$a]->sete_num || 
					$arrays[$i]->dois_num == $arrays[$a]->sete_num || 
					$arrays[$i]->tres_num == $arrays[$a]->sete_num || 
					$arrays[$i]->quatro_num == $arrays[$a]->sete_num || 
					$arrays[$i]->cinco_num == $arrays[$a]->sete_num || 
					$arrays[$i]->seis_num == $arrays[$a]->sete_num || 
					$arrays[$i]->sete_num == $arrays[$a]->sete_num || 
					$arrays[$i]->oito_num == $arrays[$a]->sete_num || 
					$arrays[$i]->nove_num == $arrays[$a]->sete_num || 
					$arrays[$i]->dez_num == $arrays[$a]->sete_num || 
					$arrays[$i]->onze_num == $arrays[$a]->sete_num || 
					$arrays[$i]->doze_num == $arrays[$a]->sete_num || 
					$arrays[$i]->treze_num == $arrays[$a]->sete_num || 
					$arrays[$i]->quartoze_num == $arrays[$a]->sete_num || 
					$arrays[$i]->quinze_num == $arrays[$a]->sete_num) {
					$contt = $contt + 1;
				}

				if ($arrays[$i]->um_num == $arrays[$a]->oito_num || 
					$arrays[$i]->dois_num == $arrays[$a]->oito_num || 
					$arrays[$i]->tres_num == $arrays[$a]->oito_num || 
					$arrays[$i]->quatro_num == $arrays[$a]->oito_num || 
					$arrays[$i]->cinco_num == $arrays[$a]->oito_num || 
					$arrays[$i]->seis_num == $arrays[$a]->oito_num || 
					$arrays[$i]->sete_num == $arrays[$a]->oito_num || 
					$arrays[$i]->oito_num == $arrays[$a]->oito_num || 
					$arrays[$i]->nove_num == $arrays[$a]->oito_num || 
					$arrays[$i]->dez_num == $arrays[$a]->oito_num || 
					$arrays[$i]->onze_num == $arrays[$a]->oito_num || 
					$arrays[$i]->doze_num == $arrays[$a]->oito_num || 
					$arrays[$i]->treze_num == $arrays[$a]->oito_num || 
					$arrays[$i]->quartoze_num == $arrays[$a]->oito_num || 
					$arrays[$i]->quinze_num == $arrays[$a]->oito_num) {
					$contt = $contt + 1;
				}

				if ($arrays[$i]->um_num == $arrays[$a]->nove_num || 
					$arrays[$i]->dois_num == $arrays[$a]->nove_num || 
					$arrays[$i]->tres_num == $arrays[$a]->nove_num || 
					$arrays[$i]->quatro_num == $arrays[$a]->nove_num || 
					$arrays[$i]->cinco_num == $arrays[$a]->nove_num || 
					$arrays[$i]->seis_num == $arrays[$a]->nove_num || 
					$arrays[$i]->sete_num == $arrays[$a]->nove_num || 
					$arrays[$i]->oito_num == $arrays[$a]->nove_num || 
					$arrays[$i]->nove_num == $arrays[$a]->nove_num || 
					$arrays[$i]->dez_num == $arrays[$a]->nove_num || 
					$arrays[$i]->onze_num == $arrays[$a]->nove_num || 
					$arrays[$i]->doze_num == $arrays[$a]->nove_num || 
					$arrays[$i]->treze_num == $arrays[$a]->nove_num || 
					$arrays[$i]->quartoze_num == $arrays[$a]->nove_num || 
					$arrays[$i]->quinze_num == $arrays[$a]->nove_num) {
					$contt = $contt + 1;
				}

				if ($arrays[$i]->um_num == $arrays[$a]->dez_num || 
					$arrays[$i]->dois_num == $arrays[$a]->dez_num || 
					$arrays[$i]->tres_num == $arrays[$a]->dez_num || 
					$arrays[$i]->quatro_num == $arrays[$a]->dez_num || 
					$arrays[$i]->cinco_num == $arrays[$a]->dez_num || 
					$arrays[$i]->seis_num == $arrays[$a]->dez_num || 
					$arrays[$i]->sete_num == $arrays[$a]->dez_num || 
					$arrays[$i]->oito_num == $arrays[$a]->dez_num || 
					$arrays[$i]->nove_num == $arrays[$a]->dez_num || 
					$arrays[$i]->dez_num == $arrays[$a]->dez_num || 
					$arrays[$i]->onze_num == $arrays[$a]->dez_num || 
					$arrays[$i]->doze_num == $arrays[$a]->dez_num || 
					$arrays[$i]->treze_num == $arrays[$a]->dez_num || 
					$arrays[$i]->quartoze_num == $arrays[$a]->dez_num || 
					$arrays[$i]->quinze_num == $arrays[$a]->dez_num) {
					$contt = $contt + 1;
				}

				if ($arrays[$i]->um_num == $arrays[$a]->onze_num || 
					$arrays[$i]->dois_num == $arrays[$a]->onze_num || 
					$arrays[$i]->tres_num == $arrays[$a]->onze_num || 
					$arrays[$i]->quatro_num == $arrays[$a]->onze_num || 
					$arrays[$i]->cinco_num == $arrays[$a]->onze_num || 
					$arrays[$i]->seis_num == $arrays[$a]->onze_num || 
					$arrays[$i]->sete_num == $arrays[$a]->onze_num || 
					$arrays[$i]->oito_num == $arrays[$a]->onze_num || 
					$arrays[$i]->nove_num == $arrays[$a]->onze_num || 
					$arrays[$i]->dez_num == $arrays[$a]->onze_num || 
					$arrays[$i]->onze_num == $arrays[$a]->onze_num || 
					$arrays[$i]->doze_num == $arrays[$a]->onze_num || 
					$arrays[$i]->treze_num == $arrays[$a]->onze_num || 
					$arrays[$i]->quartoze_num == $arrays[$a]->onze_num || 
					$arrays[$i]->quinze_num == $arrays[$a]->onze_num) {
					$contt = $contt + 1;
				}

				if ($arrays[$i]->um_num == $arrays[$a]->doze_num || 
					$arrays[$i]->dois_num == $arrays[$a]->doze_num || 
					$arrays[$i]->tres_num == $arrays[$a]->doze_num || 
					$arrays[$i]->quatro_num == $arrays[$a]->doze_num || 
					$arrays[$i]->cinco_num == $arrays[$a]->doze_num || 
					$arrays[$i]->seis_num == $arrays[$a]->doze_num || 
					$arrays[$i]->sete_num == $arrays[$a]->doze_num || 
					$arrays[$i]->oito_num == $arrays[$a]->doze_num || 
					$arrays[$i]->nove_num == $arrays[$a]->doze_num || 
					$arrays[$i]->dez_num == $arrays[$a]->doze_num || 
					$arrays[$i]->onze_num == $arrays[$a]->doze_num || 
					$arrays[$i]->doze_num == $arrays[$a]->doze_num || 
					$arrays[$i]->treze_num == $arrays[$a]->doze_num || 
					$arrays[$i]->quartoze_num == $arrays[$a]->doze_num || 
					$arrays[$i]->quinze_num == $arrays[$a]->doze_num) {
					$contt = $contt + 1;
				}

				if ($arrays[$i]->um_num == $arrays[$a]->treze_num || 
					$arrays[$i]->dois_num == $arrays[$a]->treze_num || 
					$arrays[$i]->tres_num == $arrays[$a]->treze_num || 
					$arrays[$i]->quatro_num == $arrays[$a]->treze_num || 
					$arrays[$i]->cinco_num == $arrays[$a]->treze_num || 
					$arrays[$i]->seis_num == $arrays[$a]->treze_num || 
					$arrays[$i]->sete_num == $arrays[$a]->treze_num || 
					$arrays[$i]->oito_num == $arrays[$a]->treze_num || 
					$arrays[$i]->nove_num == $arrays[$a]->treze_num || 
					$arrays[$i]->dez_num == $arrays[$a]->treze_num || 
					$arrays[$i]->onze_num == $arrays[$a]->treze_num || 
					$arrays[$i]->doze_num == $arrays[$a]->treze_num || 
					$arrays[$i]->treze_num == $arrays[$a]->treze_num || 
					$arrays[$i]->quartoze_num == $arrays[$a]->treze_num || 
					$arrays[$i]->quinze_num == $arrays[$a]->treze_num) {
					$contt = $contt + 1;
				}

				if ($arrays[$i]->um_num == $arrays[$a]->quartoze_num || 
					$arrays[$i]->dois_num == $arrays[$a]->quartoze_num || 
					$arrays[$i]->tres_num == $arrays[$a]->quartoze_num || 
					$arrays[$i]->quatro_num == $arrays[$a]->quartoze_num || 
					$arrays[$i]->cinco_num == $arrays[$a]->quartoze_num || 
					$arrays[$i]->seis_num == $arrays[$a]->quartoze_num || 
					$arrays[$i]->sete_num == $arrays[$a]->quartoze_num || 
					$arrays[$i]->oito_num == $arrays[$a]->quartoze_num || 
					$arrays[$i]->nove_num == $arrays[$a]->quartoze_num || 
					$arrays[$i]->dez_num == $arrays[$a]->quartoze_num || 
					$arrays[$i]->onze_num == $arrays[$a]->quartoze_num || 
					$arrays[$i]->doze_num == $arrays[$a]->quartoze_num || 
					$arrays[$i]->treze_num == $arrays[$a]->quartoze_num || 
					$arrays[$i]->quartoze_num == $arrays[$a]->quartoze_num || 
					$arrays[$i]->quinze_num == $arrays[$a]->quartoze_num) {
					$contt = $contt + 1;
				}

				if ($arrays[$i]->um_num == $arrays[$a]->quinze_num || 
					$arrays[$i]->dois_num == $arrays[$a]->quinze_num || 
					$arrays[$i]->tres_num == $arrays[$a]->quinze_num || 
					$arrays[$i]->quatro_num == $arrays[$a]->quinze_num || 
					$arrays[$i]->cinco_num == $arrays[$a]->quinze_num || 
					$arrays[$i]->seis_num == $arrays[$a]->quinze_num || 
					$arrays[$i]->sete_num == $arrays[$a]->quinze_num || 
					$arrays[$i]->oito_num == $arrays[$a]->quinze_num || 
					$arrays[$i]->nove_num == $arrays[$a]->quinze_num || 
					$arrays[$i]->dez_num == $arrays[$a]->quinze_num || 
					$arrays[$i]->onze_num == $arrays[$a]->quinze_num || 
					$arrays[$i]->doze_num == $arrays[$a]->quinze_num || 
					$arrays[$i]->treze_num == $arrays[$a]->quinze_num || 
					$arrays[$i]->quartoze_num == $arrays[$a]->quinze_num || 
					$arrays[$i]->quinze_num == $arrays[$a]->quinze_num) {
					$contt = $contt + 1;
				}

				//Montar o array com os valores repetidos
				$arrayContador[$c] = [
					'numerosRepetidos' => $contt
				];

				$c = $c + 1;

			}

		}

		return $arrayContador;

	}

}

?>