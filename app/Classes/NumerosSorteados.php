<?php

namespace App\Classes;

class NumerosSorteados
{

	/* Receber o array de jogos selecionado pelo usuário, e o ultimo jogo da lotofacil
	$arrayJogos -> Todos os jogos do usuário
	$arrayUltimoJogo -> o ultimo jogo da lotofacil
	*/
	public function validaJogos($arrayJogos, $arrayUltimoJogo)
	{

		$acertosOnze     = 0;
		$acertosDoze     = 0;
		$acertosTreze    = 0;
		$acertosQuartoze = 0;
		$acertosQuinze   = 0;

		$gamhoOnze     = 0;
		$gamhoDoze     = 0;
		$gamhoTreze    = 0;
		$gamhoQuartoze = 0;
		$gamhoQuinze   = 0;

		//Tem que decodificar porque esta vindo como objeto
		$jarray = json_decode(json_encode($arrayUltimoJogo),true);

		//Colocar nas varias os numeros sorteado no ultimo sorteio da lotofacil
		$um       = $jarray['0']['um_num'];
		$dois     = $jarray['0']['dois_num'];
		$tres     = $jarray['0']['tres_num'];
		$quatro   = $jarray['0']['quatro_num'];
		$cinco    = $jarray['0']['cinco_num'];
		$seis     = $jarray['0']['seis_num'];
		$sete     = $jarray['0']['sete_num'];
		$oito     = $jarray['0']['oito_num'];
		$nove     = $jarray['0']['nove_num'];
		$dez      = $jarray['0']['dez_num'];
		$onze     = $jarray['0']['onze_num'];
		$doze     = $jarray['0']['doze_num'];
		$treze    = $jarray['0']['treze_num'];
		$quartoze = $jarray['0']['quartoze_num'];
		$quinze   = $jarray['0']['quinze_num'];

		//Pegar a quantidade de numeros que caiu no jogo
		$arrayJogosGanhados = null;
		//Vai colocando as cores na posição do contador
		$contt = 0;
		//Inicia o array com zero
		$arrayCores = 0;

		//Pegar os quinze numero da lotofacil sorteador para verificar
		foreach ($arrayJogos as $value) {
			
			//E preciso começar com zero pra saber quanto numeros foi acertado... Entedeu
			$validator = 0;

			//Valida o primeiro numero jogado, se foi acertado no jogo
			if ($value->num_um == $um || $value->num_um == $dois || $value->num_um == $tres || $value->num_um == $quatro || $value->num_um == $cinco || $value->num_um == $seis || $value->num_um == $sete || $value->num_um == $oito || $value->num_um == $nove || $value->num_um == $dez || $value->num_um == $onze || $value->num_um == $doze || $value->num_um == $treze || $value->num_um == $quartoze || $value->num_um == $quinze) {

				$validator = $validator + 1;

			}
			
			if ($value->num_dois == $um || $value->num_dois == $dois || $value->num_dois == $tres || $value->num_dois == $quatro || $value->num_dois == $cinco || $value->num_dois == $seis || $value->num_dois == $sete || $value->num_dois == $oito || $value->num_dois == $nove || $value->num_dois == $dez || $value->num_dois == $onze || $value->num_dois == $doze || $value->num_dois == $treze || $value->num_dois == $quartoze || $value->num_dois == $quinze) {
				
				$validator = $validator + 1;

			}

			if ($value->num_tres == $um || $value->num_tres == $dois || $value->num_tres == $tres || $value->num_tres == $quatro || $value->num_tres == $cinco || $value->num_tres == $seis || $value->num_tres == $sete || $value->num_tres == $oito || $value->num_tres == $nove || $value->num_tres == $dez || $value->num_tres == $onze || $value->num_tres == $doze || $value->num_tres == $treze || $value->num_tres == $quartoze || $value->num_tres == $quinze) {
				
				$validator = $validator + 1;

			}

			if ($value->num_quatro == $um || $value->num_quatro == $dois || $value->num_quatro == $tres || $value->num_quatro == $quatro || $value->num_quatro == $cinco || $value->num_quatro == $seis || $value->num_quatro == $sete || $value->num_quatro == $oito || $value->num_quatro == $nove || $value->num_quatro == $dez || $value->num_quatro == $onze || $value->num_quatro == $doze || $value->num_quatro == $treze || $value->num_quatro == $quartoze || $value->num_quatro == $quinze) {
				
				$validator = $validator + 1;

			}

			if ($value->num_cinco == $um || $value->num_cinco == $dois || $value->num_cinco == $tres || $value->num_cinco == $quatro || $value->num_cinco == $cinco || $value->num_cinco == $seis || $value->num_cinco == $sete || $value->num_cinco == $oito || $value->num_cinco == $nove || $value->num_cinco == $dez || $value->num_cinco == $onze || $value->num_cinco == $doze || $value->num_cinco == $treze || $value->num_cinco == $quartoze || $value->num_cinco == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($value->num_seis == $um || $value->num_seis == $dois || $value->num_seis == $tres || $value->num_seis == $quatro || $value->num_seis == $cinco || $value->num_seis == $seis || $value->num_seis == $sete || $value->num_seis == $oito || $value->num_seis == $nove || $value->num_seis == $dez || $value->num_seis == $onze || $value->num_seis == $doze || $value->num_seis == $treze || $value->num_seis == $quartoze || $value->num_seis == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($value->num_sete == $um || $value->num_sete == $dois || $value->num_sete == $tres || $value->num_sete == $quatro || $value->num_sete == $cinco || $value->num_sete == $seis || $value->num_sete == $sete || $value->num_sete == $oito || $value->num_sete == $nove || $value->num_sete == $dez || $value->num_sete == $onze || $value->num_sete == $doze || $value->num_sete == $treze || $value->num_sete == $quartoze || $value->num_sete == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($value->num_oito == $um || $value->num_oito == $dois || $value->num_oito == $tres || $value->num_oito == $quatro || $value->num_oito == $cinco || $value->num_oito == $seis || $value->num_oito == $sete || $value->num_oito == $oito || $value->num_oito == $nove || $value->num_oito == $dez || $value->num_oito == $onze || $value->num_oito == $doze || $value->num_oito == $treze || $value->num_oito == $quartoze || $value->num_oito == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($value->num_nove == $um || $value->num_nove == $dois || $value->num_nove == $tres || $value->num_nove == $quatro || $value->num_nove == $cinco || $value->num_nove == $seis || $value->num_nove == $sete || $value->num_nove == $oito || $value->num_nove == $nove || $value->num_nove == $dez || $value->num_nove == $onze || $value->num_nove == $doze || $value->num_nove == $treze || $value->num_nove == $quartoze || $value->num_nove == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($value->num_dez == $um || $value->num_dez == $dois || $value->num_dez == $tres || $value->num_dez == $quatro || $value->num_dez == $cinco || $value->num_dez == $seis || $value->num_dez == $sete || $value->num_dez == $oito || $value->num_dez == $nove || $value->num_dez == $dez || $value->num_dez == $onze || $value->num_dez == $doze || $value->num_dez == $treze || $value->num_dez == $quartoze || $value->num_dez == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($value->num_onze == $um || $value->num_onze == $dois || $value->num_onze == $tres || $value->num_onze == $quatro || $value->num_onze == $cinco || $value->num_onze == $seis || $value->num_onze == $sete || $value->num_onze == $oito || $value->num_onze == $nove || $value->num_onze == $dez || $value->num_onze == $onze || $value->num_onze == $doze || $value->num_onze == $treze || $value->num_onze == $quartoze || $value->num_onze == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($value->num_doze == $um || $value->num_doze == $dois || $value->num_doze == $tres || $value->num_doze == $quatro || $value->num_doze == $cinco || $value->num_doze == $seis || $value->num_doze == $sete || $value->num_doze == $oito || $value->num_doze == $nove || $value->num_doze == $dez || $value->num_doze == $onze || $value->num_doze == $doze || $value->num_doze == $treze || $value->num_doze == $quartoze || $value->num_doze == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($value->num_treze == $um || $value->num_treze == $dois || $value->num_treze == $tres || $value->num_treze == $quatro || $value->num_treze == $cinco || $value->num_treze == $seis || $value->num_treze == $sete || $value->num_treze == $oito || $value->num_treze == $nove || $value->num_treze == $dez || $value->num_treze == $onze || $value->num_treze == $doze || $value->num_treze == $treze || $value->num_treze == $quartoze || $value->num_treze == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($value->num_quartoze == $um || $value->num_quartoze == $dois || $value->num_quartoze == $tres || $value->num_quartoze == $quatro || $value->num_quartoze == $cinco || $value->num_quartoze == $seis || $value->num_quartoze == $sete || $value->num_quartoze == $oito || $value->num_quartoze == $nove || $value->num_quartoze == $dez || $value->num_quartoze == $onze || $value->num_quartoze == $doze || $value->num_quartoze == $treze || $value->num_quartoze == $quartoze || $value->num_quartoze == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($value->num_quinze == $um || $value->num_quinze == $dois || $value->num_quinze == $tres || $value->num_quinze == $quatro || $value->num_quinze == $cinco || $value->num_quinze == $seis || $value->num_quinze == $sete || $value->num_quinze == $oito || $value->num_quinze == $nove || $value->num_quinze == $dez || $value->num_quinze == $onze || $value->num_quinze == $doze || $value->num_quinze == $treze || $value->num_quinze == $quartoze || $value->num_quinze == $quinze) {
				
				$validator = $validator + 1;
				
			}

			//Atribuir uma cor ao jogo ganho
			$cor = null;
			//Receber o valor que ganho em cada jogo
			$valorGanho = null;
			/*Validar se o numero foi sorteador acima de 11 numeros
			*/
			if ($validator == '15') {

				$acertosQuinze = $acertosQuinze + 1;
				$cor = '#00FF00';
				$valorGanho = '4500000';
				$gamhoQuinze = $gamhoQuinze + $valorGanho;


			} else if ($validator == '14') {

				$acertosQuartoze = $acertosQuartoze + 1;
				$cor = '#808000';
				$valorGanho = '1577';
				$gamhoQuartoze = $gamhoQuartoze + $valorGanho;

			} else if ($validator == '13') {

				$acertosTreze = $acertosTreze + 1;
				$cor = '#DAA520';
				$valorGanho = '25';
				$gamhoTreze = $gamhoTreze + $valorGanho;

			} else if ($validator == '12') {
				
				$acertosDoze = $acertosDoze + 1;
				$cor = '#BDB76B';
				$valorGanho = '10';
				$gamhoDoze = $gamhoDoze + $valorGanho ;

			} else if ($validator == '11') {
				
				$acertosOnze = $acertosOnze + 1;				
				$cor = '#D2691E';
				$valorGanho = '5';
				$gamhoOnze = $gamhoOnze + $valorGanho;

			} else {
				$cor = '#FF0000';
				$valorGanho = '0';
			}

			//Pegar o array de cores
			$arrayCores = [
				'cores' => $cor
			];

			$contt = $contt + 1;

		}


		$qunatidadeTotal = $acertosOnze + $acertosDoze + $acertosTreze + $acertosQuartoze + $acertosQuinze;

		$valorTotal = $gamhoOnze + $gamhoDoze + $gamhoTreze + $gamhoQuartoze + $gamhoQuinze;

		//Montar o array de jogos pra o resultador
		$arrayJogosGanhados = [
			$arrayCores,
			'acertos'    => ['11 pontos', '12 pontos', '13 pontos', '14 pontos', '15 pontos', 'Total'],
			'quantidade' => [$acertosOnze, $acertosDoze, $acertosTreze, $acertosQuartoze, $acertosQuinze, $qunatidadeTotal],
			'premio'     => [$gamhoOnze, $gamhoDoze, $gamhoTreze, $gamhoQuartoze, $gamhoQuinze, $valorTotal]
		];

		return $arrayJogosGanhados;

	}


	public function validaJogosPorConcurso($arrayJogos, $arrayUltimoJogo)
	{

		$acertosOnze     = 0;
		$acertosDoze     = 0;
		$acertosTreze    = 0;
		$acertosQuartoze = 0;
		$acertosQuinze   = 0;

		$gamhoOnze     = 0;
		$gamhoDoze     = 0;
		$gamhoTreze    = 0;
		$gamhoQuartoze = 0;
		$gamhoQuinze   = 0;

		//Tem que decodificar porque esta vindo como objeto
		$jarray = json_decode(json_encode($arrayUltimoJogo),true);

		//Colocar nas varias os numeros sorteado no ultimo sorteio da lotofacil
		$um       = $jarray['0']['um_num'];
		$dois     = $jarray['0']['dois_num'];
		$tres     = $jarray['0']['tres_num'];
		$quatro   = $jarray['0']['quatro_num'];
		$cinco    = $jarray['0']['cinco_num'];
		$seis     = $jarray['0']['seis_num'];
		$sete     = $jarray['0']['sete_num'];
		$oito     = $jarray['0']['oito_num'];
		$nove     = $jarray['0']['nove_num'];
		$dez      = $jarray['0']['dez_num'];
		$onze     = $jarray['0']['onze_num'];
		$doze     = $jarray['0']['doze_num'];
		$treze    = $jarray['0']['treze_num'];
		$quartoze = $jarray['0']['quartoze_num'];
		$quinze   = $jarray['0']['quinze_num'];

		//Pegar a quantidade de numeros que caiu no jogo
		$arrayJogosGanhados = null;
		//Vai colocando as cores na posição do contador
		$contt = 0;
		//Inicia o array com zero
		$arrayCores = 0;
		
		//Pegar os quinze numero da lotofacil sorteador para verificar
		foreach ($arrayJogos as $numeros) {
			//E preciso começar com zero pra saber quanto numeros foi acertado...
			$validator = 0;

			//Valida o primeiro numero jogado, se foi acertado no jogo
			if ($numeros->num_um == $um || $numeros->num_um == $dois || $numeros->num_um == $tres || $numeros->num_um == $quatro || $numeros->num_um == $cinco || $numeros->num_um == $seis || $numeros->num_um == $sete || $numeros->num_um == $oito || $numeros->num_um == $nove || $numeros->num_um == $dez || $numeros->num_um == $onze || $numeros->num_um == $doze || $numeros->num_um == $treze || $numeros->num_um == $quartoze || $numeros->num_um == $quinze) {

				$validator = $validator + 1;

			}
			
			if ($numeros->num_dois == $um || $numeros->num_dois == $dois || $numeros->num_dois == $tres || $numeros->num_dois == $quatro || $numeros->num_dois == $cinco || $numeros->num_dois == $seis || $numeros->num_dois == $sete || $numeros->num_dois == $oito || $numeros->num_dois == $nove || $numeros->num_dois == $dez || $numeros->num_dois == $onze || $numeros->num_dois == $doze || $numeros->num_dois == $treze || $numeros->num_dois == $quartoze || $numeros->num_dois == $quinze) {
				
				$validator = $validator + 1;

			}

			if ($numeros->num_tres == $um || $numeros->num_tres == $dois || $numeros->num_tres == $tres || $numeros->num_tres == $quatro || $numeros->num_tres == $cinco || $numeros->num_tres == $seis || $numeros->num_tres == $sete || $numeros->num_tres == $oito || $numeros->num_tres == $nove || $numeros->num_tres == $dez || $numeros->num_tres == $onze || $numeros->num_tres == $doze || $numeros->num_tres == $treze || $numeros->num_tres == $quartoze || $numeros->num_tres == $quinze) {
				
				$validator = $validator + 1;

			}

			if ($numeros->num_quatro == $um || $numeros->num_quatro == $dois || $numeros->num_quatro == $tres || $numeros->num_quatro == $quatro || $numeros->num_quatro == $cinco || $numeros->num_quatro == $seis || $numeros->num_quatro == $sete || $numeros->num_quatro == $oito || $numeros->num_quatro == $nove || $numeros->num_quatro == $dez || $numeros->num_quatro == $onze || $numeros->num_quatro == $doze || $numeros->num_quatro == $treze || $numeros->num_quatro == $quartoze || $numeros->num_quatro == $quinze) {
				
				$validator = $validator + 1;

			}

			if ($numeros->num_cinco == $um || $numeros->num_cinco == $dois || $numeros->num_cinco == $tres || $numeros->num_cinco == $quatro || $numeros->num_cinco == $cinco || $numeros->num_cinco == $seis || $numeros->num_cinco == $sete || $numeros->num_cinco == $oito || $numeros->num_cinco == $nove || $numeros->num_cinco == $dez || $numeros->num_cinco == $onze || $numeros->num_cinco == $doze || $numeros->num_cinco == $treze || $numeros->num_cinco == $quartoze || $numeros->num_cinco == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($numeros->num_seis == $um || $numeros->num_seis == $dois || $numeros->num_seis == $tres || $numeros->num_seis == $quatro || $numeros->num_seis == $cinco || $numeros->num_seis == $seis || $numeros->num_seis == $sete || $numeros->num_seis == $oito || $numeros->num_seis == $nove || $numeros->num_seis == $dez || $numeros->num_seis == $onze || $numeros->num_seis == $doze || $numeros->num_seis == $treze || $numeros->num_seis == $quartoze || $numeros->num_seis == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($numeros->num_sete == $um || $numeros->num_sete == $dois || $numeros->num_sete == $tres || $numeros->num_sete == $quatro || $numeros->num_sete == $cinco || $numeros->num_sete == $seis || $numeros->num_sete == $sete || $numeros->num_sete == $oito || $numeros->num_sete == $nove || $numeros->num_sete == $dez || $numeros->num_sete == $onze || $numeros->num_sete == $doze || $numeros->num_sete == $treze || $numeros->num_sete == $quartoze || $numeros->num_sete == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($numeros->num_oito == $um || $numeros->num_oito == $dois || $numeros->num_oito == $tres || $numeros->num_oito == $quatro || $numeros->num_oito == $cinco || $numeros->num_oito == $seis || $numeros->num_oito == $sete || $numeros->num_oito == $oito || $numeros->num_oito == $nove || $numeros->num_oito == $dez || $numeros->num_oito == $onze || $numeros->num_oito == $doze || $numeros->num_oito == $treze || $numeros->num_oito == $quartoze || $numeros->num_oito == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($numeros->num_nove == $um || $numeros->num_nove == $dois || $numeros->num_nove == $tres || $numeros->num_nove == $quatro || $numeros->num_nove == $cinco || $numeros->num_nove == $seis || $numeros->num_nove == $sete || $numeros->num_nove == $oito || $numeros->num_nove == $nove || $numeros->num_nove == $dez || $numeros->num_nove == $onze || $numeros->num_nove == $doze || $numeros->num_nove == $treze || $numeros->num_nove == $quartoze || $numeros->num_nove == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($numeros->num_dez == $um || $numeros->num_dez == $dois || $numeros->num_dez == $tres || $numeros->num_dez == $quatro || $numeros->num_dez == $cinco || $numeros->num_dez == $seis || $numeros->num_dez == $sete || $numeros->num_dez == $oito || $numeros->num_dez == $nove || $numeros->num_dez == $dez || $numeros->num_dez == $onze || $numeros->num_dez == $doze || $numeros->num_dez == $treze || $numeros->num_dez == $quartoze || $numeros->num_dez == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($numeros->num_onze == $um || $numeros->num_onze == $dois || $numeros->num_onze == $tres || $numeros->num_onze == $quatro || $numeros->num_onze == $cinco || $numeros->num_onze == $seis || $numeros->num_onze == $sete || $numeros->num_onze == $oito || $numeros->num_onze == $nove || $numeros->num_onze == $dez || $numeros->num_onze == $onze || $numeros->num_onze == $doze || $numeros->num_onze == $treze || $numeros->num_onze == $quartoze || $numeros->num_onze == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($numeros->num_doze == $um || $numeros->num_doze == $dois || $numeros->num_doze == $tres || $numeros->num_doze == $quatro || $numeros->num_doze == $cinco || $numeros->num_doze == $seis || $numeros->num_doze == $sete || $numeros->num_doze == $oito || $numeros->num_doze == $nove || $numeros->num_doze == $dez || $numeros->num_doze == $onze || $numeros->num_doze == $doze || $numeros->num_doze == $treze || $numeros->num_doze == $quartoze || $numeros->num_doze == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($numeros->num_treze == $um || $numeros->num_treze == $dois || $numeros->num_treze == $tres || $numeros->num_treze == $quatro || $numeros->num_treze == $cinco || $numeros->num_treze == $seis || $numeros->num_treze == $sete || $numeros->num_treze == $oito || $numeros->num_treze == $nove || $numeros->num_treze == $dez || $numeros->num_treze == $onze || $numeros->num_treze == $doze || $numeros->num_treze == $treze || $numeros->num_treze == $quartoze || $numeros->num_treze == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($numeros->num_quartoze == $um || $numeros->num_quartoze == $dois || $numeros->num_quartoze == $tres || $numeros->num_quartoze == $quatro || $numeros->num_quartoze == $cinco || $numeros->num_quartoze == $seis || $numeros->num_quartoze == $sete || $numeros->num_quartoze == $oito || $numeros->num_quartoze == $nove || $numeros->num_quartoze == $dez || $numeros->num_quartoze == $onze || $numeros->num_quartoze == $doze || $numeros->num_quartoze == $treze || $numeros->num_quartoze == $quartoze || $numeros->num_quartoze == $quinze) {
				
				$validator = $validator + 1;
				
			}

			if ($numeros->num_quinze == $um || $numeros->num_quinze == $dois || $numeros->num_quinze == $tres || $numeros->num_quinze == $quatro || $numeros->num_quinze == $cinco || $numeros->num_quinze == $seis || $numeros->num_quinze == $sete || $numeros->num_quinze == $oito || $numeros->num_quinze == $nove || $numeros->num_quinze == $dez || $numeros->num_quinze == $onze || $numeros->num_quinze == $doze || $numeros->num_quinze == $treze || $numeros->num_quinze == $quartoze || $numeros->num_quinze == $quinze) {
				
				$validator = $validator + 1;
				
			}

			//Atribuir uma cor ao jogo ganho
			$cor = null;
			//Receber o valor que ganho em cada jogo
			$valorGanho = null;
			/*Validar se o numero foi sorteador acima de 11 numeros
			*/
			if ($validator == '15') {

				$acertosQuinze = $acertosQuinze + 1;
				$cor = '#00FF00';
				$valorGanho = '4500000';
				$gamhoQuinze = $gamhoQuinze + $valorGanho;


			} else if ($validator == '14') {

				$acertosQuartoze = $acertosQuartoze + 1;
				$cor = '#808000';
				$valorGanho = '1577';
				$gamhoQuartoze = $gamhoQuartoze + $valorGanho;

			} else if ($validator == '13') {

				$acertosTreze = $acertosTreze + 1;
				$cor = '#DAA520';
				$valorGanho = '25';
				$gamhoTreze = $gamhoTreze + $valorGanho;

			} else if ($validator == '12') {
				
				$acertosDoze = $acertosDoze + 1;
				$cor = '#BDB76B';
				$valorGanho = '10';
				$gamhoDoze = $gamhoDoze + $valorGanho ;

			} else if ($validator == '11') {
				
				$acertosOnze = $acertosOnze + 1;				
				$cor = '#D2691E';
				$valorGanho = '5';
				$gamhoOnze = $gamhoOnze + $valorGanho;

			} else {
				$cor = '#FF0000';
				$valorGanho = '0';
			}

			//Pegar o array de cores
			$arrayCores = [
				'cores' => $cor
			];

			$contt = $contt + 1;

		}


		$qunatidadeTotal = $acertosOnze + $acertosDoze + $acertosTreze + $acertosQuartoze + $acertosQuinze;

		$valorTotal = $gamhoOnze + $gamhoDoze + $gamhoTreze + $gamhoQuartoze + $gamhoQuinze;

		//Montar o array de jogos pra o resultador
		$arrayJogosGanhados = [
			$arrayCores,
			'acertos'    => ['11 pontos', '12 pontos', '13 pontos', '14 pontos', '15 pontos', 'Total'],
			'quantidade' => [$acertosOnze, $acertosDoze, $acertosTreze, $acertosQuartoze, $acertosQuinze, $qunatidadeTotal],
			'premio'     => [$gamhoOnze, $gamhoDoze, $gamhoTreze, $gamhoQuartoze, $gamhoQuinze, $valorTotal]
		];

		return $arrayJogosGanhados;

	}

}

?>
