<?php

namespace App\Models;

use App\Classes\Numeros;
use DB;

class JogoCincoBD
{

	public function salvaNumeros(Numeros $numeros)
	{

		try {

			DB::table('jogo_cinco')
					->insert([
						'num_um' => $numeros->um, 
						'num_dois' => $numeros->dois,
						'num_tres' => $numeros->tres,
						'num_quatro' => $numeros->quatro,
						'num_cinco' => $numeros->cinco,
						'status' => $numeros->status,
						'id_users' => $numeros->idUser,
						'codigo' => $numeros->codigo,
					]);

			return true;

		} catch (Exception $e) { 
			
		}

	}

	/*Lista todos os 5 numeros escolhido pela tela do index*/
	public function listaJogos($codigo)
	{

		$sql = DB::select('SELECT * FROM jogo_cinco WHERE codigo = ?', [$codigo]);

		return $sql;

	}

	public function salvaJogos(Numeros $numeros)
	{ 
		
		try {

			DB::table('temp_jogos_cinco')
					->insert([
						'num_um' => $numeros->um,
						'num_dois' => $numeros->dois,
						'num_tres' => $numeros->tres,
						'num_quatro' => $numeros->quatro,
						'num_cinco' => $numeros->cinco,
						'num_seis' => $numeros->seis,
						'num_sete' => $numeros->sete,
						'num_oito' => $numeros->oito,
						'num_nove' => $numeros->nove,
						'num_dez' => $numeros->dez,
						'num_onze' => $numeros->onze,
						'num_doze' => $numeros->doze,
						'num_treze' => $numeros->treze,
						'num_quartoze' => $numeros->quartoze,
						'num_quinze' => $numeros->quinze,
						'id_users' => $numeros->idUser,
						'codigo' => $numeros->codigo,
						'status' => $numeros->status,
					]);

			return true;

		} catch (Exception $e) { 
			
		}

	}

	public function listaJogosEscolhidos($codigo, $idUser)
	{

		$dados = DB::select('SELECT * FROM temp_jogos_cinco WHERE codigo = ? AND id_users = ?', [$codigo, $idUser]);
		
		return $dados;


	}

	//Lista pelo codigo
	public function listPeloCodigo($codigo)
	{

		$sql = DB::table('temp_jogos_cinco')
					->where('codigo', $codigo)
					->get();

		return $sql;

	}

	//Excluir o jogo selecionado pelo codigo
	public function destroy($codigo)
	{

		try {

			DB::select('DELETE FROM temp_jogos_cinco WHERE codigo = ?', [$codigo]);

			return true;

		} catch (Exception $e) { 
			
		}

	}
	
}

?>