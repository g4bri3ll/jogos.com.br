<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LotofacilBD;
use App\Models\JogoQuatroDB;
use App\Classes\Lotofacil;
use Auth;
use App\Classes\Jogo_quatro;
use App\Classes\Numeros;
use App\Classes\User;

class ControllerResourceQuatroPorQ extends Controller
{
    
    public function salvaJogos(Request $request)
    {
    	
    	//Pegar o id do usuário da session
    	$idUser = Auth::user()->id;
    	
    	//Receber o codigo do jogo
    	$geraCodigo = new User();
		$codigo = $geraCodigo->gerandoCodigo(17, true, true, true);
    	
    	//Pegar os 25 numeros
    	$lotofacil = new LotofacilBD();
        $numeros = $lotofacil->listaNImpar();

    	//Retorna se a opção for par
        if (count($request->valor) <> 4) {

        	//Verificar se está na opção par ou impar
        	return redirect()->route('quatro', ['error', true]);

        }
        	
        //Faz o cadastro do 4 numeros selecionados
        $numeros = new Numeros();
        $numeros->status = '1';
        $numeros->idUser = $idUser;
        $numeros->codigo = $codigo;
        $numeros->um     = $request->valor[0];
        $numeros->dois   = $request->valor[1];;
        $numeros->tres   = $request->valor[2];;
        $numeros->quatro = $request->valor[3];;

        //Salvar os numeros selecionados
        $numQuatroDB = new JogoQuatroDB();
        $valida = $numQuatroDB->salvaQuatroNum($numeros);

        if ($valida) {
        	
        	//Encaminha para o rota criar os onze jogos
        	return redirect()->route('listaJogoQuatro', ['codigo' => $codigo]);
        }

    }

    public function listaJogosQuatro($codigo)
    {

    	$numNaoPodemUm     = 0;
    	$numNaoPodemDois   = 0;
    	$numNaoPodemTres   = 0;
    	$numNaoPodemQuatro = 0;

    	//Pegar os numeros jogado pelo codigo
    	$numerosJogados = new JogoQuatroDB();
    	$arrayQuatroNumero = $numerosJogados->listaJogos($codigo);

    	foreach ($arrayQuatroNumero as $value) {
    		$numNaoPodemUm     = $value->num_um;
	    	$numNaoPodemDois   = $value->num_dois;
   		 	$numNaoPodemTres   = $value->num_tres;
    		$numNaoPodemQuatro = $value->num_quatro;	
    	}

    	//Pegar os vinte cincos numero para criar os jogos
    	$numeros = new Numeros();
    	$arrayVinteCincoNumeros = $numeros->numeros();

    	for ($i=0; $i < count($arrayVinteCincoNumeros); $i++) {
    		
    		/*Excluir o primeiro valor do array*/
    		if ($arrayVinteCincoNumeros[$i] == $numNaoPodemUm) {
				unset($arrayVinteCincoNumeros[$i]);
				$arrayVinteCincoNumeros = array_merge($arrayVinteCincoNumeros);
			}
    		/*Excluir o segundo valor do array*/
    		if ($arrayVinteCincoNumeros[$i] == $numNaoPodemDois) {
				unset($arrayVinteCincoNumeros[$i]);
				$arrayVinteCincoNumeros = array_merge($arrayVinteCincoNumeros);
			}
	    	/*Excluir o terceiro valor do array*/
    		if ($arrayVinteCincoNumeros[$i] == $numNaoPodemTres) {
				unset($arrayVinteCincoNumeros[$i]);
				$arrayVinteCincoNumeros = array_merge($arrayVinteCincoNumeros);
			}
			/*Excluir o quatro valor do array*/
    		if ($arrayVinteCincoNumeros[$i] == $numNaoPodemQuatro) {
				unset($arrayVinteCincoNumeros[$i]);
				$arrayVinteCincoNumeros = array_merge($arrayVinteCincoNumeros);
			}

    	}

    	//Pegar os quinze numeros para salvar
    	$lotofacil = new Lotofacil();
    	$lotofacil->gerarJogoQuatro($arrayVinteCincoNumeros, $codigo);
        
        return redirect()->route('listJogosQuatro', $codigo);

    }

    public function listaJogosQ($codigo, $true = null)
    {
        
        $idConcurso = null;
        //Pegar o id do usuário da session
    	$idUser = Auth::user()->id;
    	//Lista todos os onze jogos do usuário para a tela
        $arrayJogosQ = new JogoQuatroDB();
		$arrayJogos = $arrayJogosQ->listaJogosEscolhidos($codigo, $idUser);
        
        //Pegar os valores ganhado para lista na tela de resultado
        $jg = new Lotofacil();
        $arrayValoresJogos = $jg->validaJogo($arrayJogos, $idConcurso);

        return view('lotofacil-erre-4\criar-jogo\resultado', compact('codigo'))
            ->with('arrayValoresJogos', $arrayValoresJogos)
            ->with('arrayJogos', $arrayJogos)
            ->with('nav', true)
            ->with('true', $true)
            ->with('aQ', 'active');

    }

}
