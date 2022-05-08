<?php

namespace App\Models;

use App\Classes\Numeros;
use DB;

class JogoSeteBD
{

	public function salvaNumeros(Numeros $numeros)
	{

		try {

			$sql = DB::insert('INSERT INTO jogo_setes (num_um, num_dois, num_tres, num_quatro, num_cinco, num_seis, num_sete, status, id_users, codigo) VALUE (?,?,?,?,?,?,?,?,?,?)', [$numeros->um, $numeros->dois, $numeros->tres, $numeros->quatro, $numeros->cinco, $numeros->seis, $numeros->sete, $numeros->status, $numeros->idUser, $numeros->codigo]);

			return true;

		} catch (Exception $e) { 
			
		}

	}

	/*Lista todos os 7 numeros escolhido pela tela do index*/
	public function listaJogos($codigo)
	{

		$sql = DB::select('SELECT * FROM jogo_setes WHERE codigo = ?', [$codigo]);

		return $sql;

	}

	public function salvaJogos(Numeros $numeros)
	{ 
		
		try {

			$salvarDB = DB::insert('INSERT INTO temp_jogos_sete (num_um, num_dois, num_tres, num_quatro, num_cinco, num_seis, num_sete, num_oito, num_nove, num_dez, num_onze, num_doze, num_treze, num_quartoze, num_quinze, id_users, codigo, status) VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [$numeros->um, $numeros->dois, $numeros->tres, $numeros->quatro, $numeros->cinco, $numeros->seis, $numeros->sete, $numeros->oito, $numeros->nove, $numeros->dez, $numeros->onze, $numeros->doze, $numeros->treze, $numeros->quartoze, $numeros->quinze, $numeros->idUser, $numeros->codigo, $numeros->status]);
			
			return true;

		} catch (Exception $e) { 
			
		}

	}

	/*/
	//Lista pelo codigo
	public function listPeloCodigo($codigo)
	{

		$sql = DB::table('temp_jogos_sete')
					->where('codigo', $codigo)
					->get();

		return $sql;

	}
	/*/

	public function listaJogosEscolhidos($codigo, $idUser)
	{

		$dados = DB::select('SELECT * FROM temp_jogos_sete WHERE id_users = ? AND codigo = ?', [$idUser, $codigo]);
		
		return $dados;

	}

	//Lista pelo codigo
	public function listPeloCodigo($codigo)
	{

		$sql = DB::select('SELECT * FROM temp_jogos_sete WHERE codigo = ?', [$codigo]);

		return $sql;

	}

	//Excluir o jogo selecionado pelo codigo
	public function destroy($codigo)
	{

		try {

			DB::select('DELETE FROM temp_jogos_sete WHERE codigo = ?', [$codigo]);

			return true;

		} catch (Exception $e) { 
			
		}

	}

}
?>