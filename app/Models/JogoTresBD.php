<?php

namespace App\Models;

use App\Classes\Jogo_tres;
use App\Classes\Numeros;
use DB;

class JogoTresBD
{

	public function salvaJogo(Jogo_tres $jogo)
	{

		try {
			
			$sql = DB::insert('INSERT INTO jogo_tress (codigo_jogo, status, id_user, num_par_um, num_par_dois, 	num_par_tres, num_par_quatro, num_par_cinco, num_par_seis, num_impar_um, num_impar_dois, num_impar_tres, num_impar_quatro, num_impar_cinco, num_impar_seis) VALUE (?,?,?,?,?,?,?,?,?, 0, 0, 0, 0, 0, 0)', [$jogo->codigo, $jogo->status, $jogo->idUser, $jogo->numParUm, $jogo->numParDois, $jogo->numParTres, $jogo->numParQuatro, $jogo->numParCinco, $jogo->numParSeis]);

			return true;

		} catch (Exception $e) { 
			
		}

	}

	public function salvaJogoImpar(Jogo_tres $jogo)
	{

		try {
			
			$sql = DB::insert('UPDATE jogo_tress SET num_impar_um = ?, num_impar_dois = ?, num_impar_tres = ?, num_impar_quatro = ?, num_impar_cinco = ?, num_impar_seis = ? WHERE codigo_jogo = ?', [$jogo->numImparUm, $jogo->numImparDois, $jogo->numImparTres, $jogo->numImparQuatro, $jogo->numImparCinco, $jogo->numImparSeis, $jogo->codigo]);

			return true;

		} catch (Exception $e) { 
			
		}

	}

	//Pegar todos os jogos em par e impar jogados
	public function resgataJogo($codigo)
	{

		try {

			$sql = DB::select('SELECT * FROM jogo_tress WHERE codigo_jogo = ?', [$codigo]);

			return $sql;

		} catch (Exception $e) { 
			
		}

	}


	/*/
	//Lista pelo codigo
	public function listPeloCodigo($codigo)
	{

		$sql = DB::table('temp_jogos_tres')
					->where('codigo', $codigo)
					->get();

		return $sql;

	}
	/*/


	public function salvaJogosDeTresPorTres(Numeros $numeros, $codigo, $idUser, $salvar)
	{
		
		try {

			$salvaJogos = DB::insert('INSERT INTO temp_jogos_tres (num_um, num_dois, num_tres, num_quatro, num_cinco, num_seis, num_sete, num_oito, num_nove, num_dez, num_onze, num_doze, num_treze, num_quartoze, num_quinze, id_users, codigo, salvar) VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$numeros->um, $numeros->dois, $numeros->tres, $numeros->quatro, $numeros->cinco, $numeros->seis, $numeros->sete, $numeros->oito, $numeros->nove, $numeros->dez, $numeros->onze, $numeros->doze, $numeros->treze, $numeros->quartoze, $numeros->quinze, $idUser, $codigo, $salvar]);

			return true;

		} catch (Exception $e) { 
			
		}
		
	}

	//Lista pelo codigo
	public function listPeloCodigo($codigo)
	{

		$sql = DB::table('temp_jogos_tres')
				->where('codigo', [$codigo])
				->get();

		return $sql;

	}
	
	//Excluir o jogo selecionado pelo codigo
	public function destroy($codigo)
	{

		try {

			DB::select('DELETE FROM temp_jogos_tres WHERE codigo = ?', [$codigo]);

			return true;

		} catch (Exception $e) { 
			
		}

	}

	public function todosJogos($codigo, $idUser)
	{

		$sql = DB::select('SELECT * FROM temp_jogos_tres WHERE id_users = ? AND codigo = ?', [$idUser, $codigo]);

		return $sql;

	}

	/*public function listImportExcel($codigo)
	{
		
		$dados = DB::table('temp_jogos_tres')->select('id_users','salvar','id','num_quinze')->where('codigo', [$codigo])->get()->toArray();

		return $dados;

	}*/

}

?>
