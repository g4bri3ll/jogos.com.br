<?php 

namespace App\Models;

use DB;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use DateTime;

class LotofacilBD {

	//
	public function listaNImpar()
	{
		try 
		{
			$list = DB::table('numeros')->get();

			return $list;
		} 
		catch(FatalThrowableError $e) 
		{
    		echo "Erro de exception"; 
		}
		
	}

	//Faz a gravação dos dados da API no banco de dados
	public function gravaAPILoteria($resultado, $numeroConcurso, $dataSorteio, $proxDtConcurso, $acumulou, $premioAcumulad, $valorEstimado)
	{
		
		$um_num;
		$dois_num;
		$tres_num;
		$quarto_num;
		$cinco_num;
		$seis_num;
		$sete_num;
		$oito_num;
		$nove_num;
		$dez_num;
		$onze_num;
		$doze_num;
		$treze_num;
		$quartoze_num;
		$quinze_num;

		//separando os numeros
		$array = explode("-", $resultado);
		for ($i = 0;$i < count($array); $i++) {

			$um_num       = $array[0];
			$dois_num     = $array[1];
			$tres_num     = $array[2];
			$quarto_num   = $array[3];
			$cinco_num    = $array[4];
			$seis_num     = $array[5];
			$sete_num     = $array[6];
			$oito_num     = $array[7];
			$nove_num     = $array[8];
			$dez_num      = $array[9];
			$onze_num     = $array[10];
			$doze_num     = $array[11];
			$treze_num    = $array[12];
			$quartoze_num = $array[13];
			$quinze_num   = $array[14];

		}
		
		DB::insert('INSERT INTO lotofacils (um_num, dois_num, tres_num, quatro_num, cinco_num, seis_num, sete_num, oito_num, nove_num, dez_num, onze_num, doze_num, treze_num, quartoze_num, quinze_num, numero_concurso, data_sorteio, acumulou, premio_acumulado, valor_estimado) VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [$um_num, $dois_num, $tres_num, $quarto_num, $cinco_num, $seis_num, $sete_num, $oito_num, $nove_num, $dez_num, $onze_num, $doze_num, $treze_num, $quartoze_num, $quinze_num, $numeroConcurso, $dataSorteio, $acumulou, $premioAcumulad, $valorEstimado]);

	}

	//Pega o ultimo numero do jogo da lotofacil
	public function listaUltimoJogo()
	{
		$list = DB::select('SELECT numero_concurso FROM lotofacils ORDER BY id DESC LIMIT 1');
		return $list;
	}

	//Lista o ultimo jogo da lotofacil
	public function ultimoJogo()
	{

		$list = DB::select('SELECT * FROM lotofacils ORDER BY id DESC LIMIT 1');
		return $list;

	}

	//Lista pelo numero do id do concurso
	public function listaPorIdConcurso($idConcurso)
	{

		$list = DB::select('SELECT * FROM lotofacils WHERE id = ?', [$idConcurso]);
		return $list;

	}


	//Verificar se o concurso já foi salvo na base de dados
	public function verificaJogoSalvo($numeroConcurso)
	{
		$list = DB::select('SELECT numero_concurso FROM lotofacils WHERE numero_concurso = ?', $numeroConcurso);
		return $list;
	}

	public function dadosAPI($numeroConcurso)
	{
		
		//Verificar se o chamado está pra algum numero especifico
		if (empty($numeroConcurso)) {
			//Chamada da funcão para os resultado da loteria
        	$api = new \GiordanoLima\LoteriasApi\Lotofacil();
		} else {
			//Chamada da funcão para os resultado da loteria
        	$api = new \GiordanoLima\LoteriasApi\Lotofacil($numeroConcurso);
		}

        //Retorna o resultado da loteria (números sorteados, etc).
        $resultado      = $api->getResultado();
        //Retorna o número do próximo concurso ao atual. Este valor poderá ser utilizado no construtor da classe para buscar os respectivos dados.
        $numeroConcurso = $api->getProximoConcurso();
        //Retorna a data de realização do sorteio.
        $date = date_create_from_format('d/m/Y', $api->getData());
        //Formatando no padrão do MySQL a data
        $dataSorteio    = date_format($date, 'Y-m-d');
		//Retorna a data do próximo sorteio.
        $proxDtConcurso = $api->getDataProximoConcurso();
        //Indica se o prêmio foi acumulado ou não.
        $acumulou       = $api->acumulado();
        //$acumulou = str_replace(['.',','],'', $acumulou);
        //Retorna o valor acumulado do prêmio.
        $premioAcumulad = $api->getPremioAcumulado();
        //Indica o valor estimado da premiação do próximo sorteio.
        $valorEstimado  = $api->getValorEstimado();
        //$valorEstimado = str_replace(['.',','],'', $valorEstimado);

        $arrayAPIValor = 
        [
        	'resultado'      => $resultado,
        	'numeroConcurso' => $numeroConcurso,
        	'dataSorteio'    => $dataSorteio,
        	'proxDtConcurso' => $proxDtConcurso,
        	'acumulou'       => $acumulou,
        	'premioAcumulad' => $premioAcumulad,
        	'valorEstimado'  => $valorEstimado
        ];

        return $arrayAPIValor;

	}

	//Retorna o array de valores fornecido pelo rastreador
	public function listaJogos($qtd)
	{

		$arrayJogo = DB::select('SELECT * FROM lotofacils ORDER BY numero_concurso DESC LIMIT ?', [$qtd]);

		return $arrayJogo;
		
	}

	//Lista os ultimos 10 jogos
	public function listaDezJogos()
	{

		$arrayJogo = DB::select('SELECT * FROM lotofacils ORDER BY numero_concurso DESC LIMIT 10');

		return $arrayJogo;
		
	}

	public function verificarExisteCodigo($codigo)
	{
		
		$jogoCinco = DB::select('SELECT * FROM jogo_cinco where codigo = ?', [$codigo]); 
		$jogoQuatro = DB::select('SELECT * FROM jogo_quatros where codigo = ?', [$codigo]);
		$jogoSete = DB::select('SELECT * FROM jogo_setes where codigo = ?', [$codigo]); 
		$jogoTres = DB::select('SELECT * FROM jogo_tress where codigo_jogo = ?', [$codigo]);

		$arrayTotal = [
			'tres' => $jogoTres,
			'quatro' => $jogoQuatro,
			'cinco' => $jogoCinco,
			'sete' => $jogoSete
		];

		return $arrayTotal;

	}

	public function salvaJogoTres($codigo)
	{
		try 
		{
			$list = DB::select('UPDATE temp_jogos_tres SET salvar = 1 WHERE codigo = ?', [$codigo]);

			return 0;
		} 
		catch(FatalThrowableError $e) 
		{
    		echo "Erro de exception" . $e->getMessage();  
		}

	}

	public function salvaJogoSete($codigo)
	{
		try 
		{
			$list = DB::select('UPDATE temp_jogos_sete SET status = 1 WHERE codigo = ?', [$codigo]);

			return 0;
		} 
		catch(FatalThrowableError $e) 
		{
    		echo "Erro de exception" . $e->getMessage();  
		}
		
	}

	public function salvaJogoQuatro($codigo)
	{
		try 
		{
			$list = DB::select('UPDATE temp_jogos_quatro SET status = 1 WHERE codigo = ?', [$codigo]);

			return 0;
		} 
		catch(FatalThrowableError $e) 
		{
    		echo "Erro de exception" . $e->getMessage();
		}
		
	}

	public function salvaJogoCinco($codigo)
	{
		try 
		{
			$list = DB::select('UPDATE temp_jogos_cinco SET status = 1 WHERE codigo = ?', [$codigo]);

			return 0;
		} 
		catch(FatalThrowableError $e) 
		{
    		echo "Erro de exception" . $e->getMessage();  
		}
		
	}

	public function pegarJogoPeloId($idConcurso)
	{

		$jogo = DB::select('SELECT * FROM lotofacils WHERE id = ?', [$idConcurso]);

		return $jogo;

	}

}

?>