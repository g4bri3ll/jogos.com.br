<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LotofacilBD;
use App\Models\JogoTresBD;
use Auth;
use App\Classes\Lotofacil;
use App\Classes\Jogo_tres;
use App\Classes\User;

class ControllerResourceTresPorTres extends Controller
{

	//Lista o resultado do jogo
	public function index($codigo, $true = null)
	{

		//Pegar o id da session
		$idUser = Auth::user()->id;

		//Retorna com todo o array do jogo, pelo codigo e o id do usuario
		$jgs = new JogoTresBD();
		$arrayJogos = $jgs->todosJogos($codigo, $idUser);
		
		//Pegar os valores ganhado para lista na tela de resultado
		$jgTres = new Jogo_tres();
		$arrayValoresJogos = $jgTres->validaJogo($arrayJogos);

		return view('lotofacil-3x3-premiada\criar-jogo\pares\resultado', 
					compact('arrayJogos', 'arrayValoresJogos', 'codigo'))
    	    		->with('nav', true)
            		->with('true', $true)
	        		->with('aT', 'active');

	}
    
    public function salvaJogosPar(Request $request, $par, $impar, $codigo)
    {

    	//Pegar os 25 numeros
    	$lotofacil = new LotofacilBD();
        $numeros = $lotofacil->listaNImpar();
        
        $idUser = 0;

        //Verifciar quantos numeros foram selecionado
        $qtdNumero = 0;
        for ($i=0; $i < count($request->valor); $i++) { 
            $qtdNumero = $i;
        }
        
        //Retorna se a opção for par
        if ($qtdNumero <> 5) {

        	//Verificar se está na opção par ou impar
        	if (!empty($par)) {
	        	return view('lotofacil-3x3-premiada\criar-jogo\pares\index')
		                ->with('nav', true)
		                ->with('aT', 'active')
		                ->with('impar_par', 'par')
		                ->with('error', 'error')
		                ->with('numeros', $numeros);	
        	} else {
        		return view('lotofacil-3x3-premiada\criar-jogo\pares\index')
		        	    ->with('nav', true)
		    	        ->with('aT', 'active')
		    	        ->with('error', 'error')
		    	        ->with('codigo', $codigo)
		            	->with('impar_par', 'impar')
		            	->with('numeros', $numeros);
        	}
            

        }

        $numUm     = 0;
        $numDois   = 0;
        $numTres   = 0;
        $numQuatro = 0;
        $numCinco  = 0;
        $numSeis   = 0;

        //Se estiver correto salva os numeros pares na base de dados
        for ($i=0; $i < count($request->valor); $i++) { 
            
            if ($i == 0) {
                $numUm = $request->valor[$i];
            } else if ($i == 1) {
                $numDois = $request->valor[$i];
            } else if ($i == 2) {
                $numTres = $request->valor[$i];
            } else if ($i == 3) {
                $numQuatro = $request->valor[$i];
            } else if ($i == 4) {
                $numCinco = $request->valor[$i];
            } else if ($i == 5) {
                $numSeis = $request->valor[$i];
            }
            
        }

        //Valida se o cadastro ocorrer tudo bem
        $valida = false;

        if (!empty($par)) {
        	
   	    	//Receber o codigo do jogo
	    	$geraCodigo = new User();
    		$codigo = $geraCodigo->gerandoCodigo(17, true, true, true);

		    $jogo = new Jogo_tres();
		    $jogo->numParUm     = $numUm;
		    $jogo->numParDois   = $numDois;
		    $jogo->numParTres   = $numTres;
		    $jogo->numParQuatro = $numQuatro;
		    $jogo->numParCinco  = $numCinco;
		    $jogo->numParSeis   = $numSeis;
		    $jogo->idUser       = $idUser;
		    $jogo->status       = 1;
		    $jogo->codigo       = $codigo;

		    $jogoDB = new JogoTresBD();
	        $valida = $jogoDB->salvaJogo($jogo);

	        if ($valida) {

		        //Encaminha para fazer o jogo impar
	        	return view('lotofacil-3x3-premiada\criar-jogo\pares\index')
	            	    ->with('nav', true)
	        	        ->with('aT', 'active')
	        	        ->with('codigo', $codigo)
	                	->with('impar_par', 'impar')
	                	->with('numeros', $numeros);

	        } else {
	        	echo "Erro ao cadastrar os numeros pares";
	        }

	    } else {
	
	    	//Cadastrar os numeros impares
	    	$jogo = new Jogo_tres();
		    $jogo->numImparUm     = $numUm;
		    $jogo->numImparDois   = $numDois;
		    $jogo->numImparTres   = $numTres;
		    $jogo->numImparQuatro = $numQuatro;
		    $jogo->numImparCinco  = $numCinco;
		    $jogo->numImparSeis   = $numSeis;
		    $jogo->codigo         = $codigo;

		    $jogoDB = new JogoTresBD();
	        $valida = $jogoDB->salvaJogoImpar($jogo);

	        if ($valida) {

	        	//Gera os jogos de quinze
	        	$loto = new Lotofacil();
	        	$verificar = $loto->GerarJogos($codigo);

	        	//Verificar se o jogo foi feito com sucesso
	        	if ($verificar) {
					
			        //Retorna para o index do jogo de tres, com todos os 13 jogos feitos
			        return redirect()->route('listaJogosPorTres', ['codigo' => $codigo]);
	        		
	        	}

	        } else {
	        	
	        	//Encaminha para fazer o jogo impar
	        	return view('lotofacil-3x3-premiada\criar-jogo\pares\index')
	            	    ->with('nav', true)
	        	        ->with('aT', 'active')
	        	        ->with('codigo', $codigo)
	                	->with('impar_par', 'impar')
	                	->with('numeros', $numeros);

	        }

	    }
        
    }

}
