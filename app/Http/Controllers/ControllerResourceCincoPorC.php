<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LotofacilBD;
use App\Models\JogoCincoBD;
use App\Classes\Jogo_cinco;
use App\Classes\Lotofacil;
use Auth;
use App\Classes\Numeros;
use App\Classes\User;

class ControllerResourceCincoPorC extends Controller
{
    
    public function salvaNumerosCinco(Request $request)
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
        if (count($request->valor) <> 5) {

        	//Verificar se está na opção par ou impar
        	return redirect()->route('cinco', ['error', true]);

        }

        //Faz o cadastro do 4 numeros selecionados
        $numeros = new Numeros();
        $numeros->status = '1';
        $numeros->idUser = $idUser;
        $numeros->codigo = $codigo;
        $numeros->um     = $request->valor[0];
        $numeros->dois   = $request->valor[1];
        $numeros->tres   = $request->valor[2];
        $numeros->quatro = $request->valor[3];
        $numeros->cinco  = $request->valor[4];
        
        //Salvar os numeros selecionados
        $numCincoDB = new JogoCincoBD();
        $valida = $numCincoDB->salvaNumeros($numeros);

        if ($valida) {
        	//Encaminha para o rota criar os onze jogos
        	return redirect()->route('svJogoCinco', $codigo);
        } else {
            echo "Ocorreu um erro, ao salvar os cinco numeros";
        }

    }

    public function salvaJogoCinco($codigo)
    {

        $numNaoPodemUm     = 0;
        $numNaoPodemDois   = 0;
        $numNaoPodemTres   = 0;
        $numNaoPodemQuatro = 0;
        $numNaoPodemCinco  = 0;

        //Pegar os numeros jogado pelo codigo
        $numerosJogados = new JogoCincoBD();
        $arrayNumeroBD = $numerosJogados->listaJogos($codigo);

        foreach ($arrayNumeroBD as $value) {
            $numNaoPodemUm     = $value->num_um;
            $numNaoPodemDois   = $value->num_dois;
            $numNaoPodemTres   = $value->num_tres;
            $numNaoPodemQuatro = $value->num_quatro;
            $numNaoPodemCinco  = $value->num_cinco;
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
            /*Excluir o quinto valor do array*/
            if ($arrayVinteCincoNumeros[$i] == $numNaoPodemCinco) {
                unset($arrayVinteCincoNumeros[$i]);
                $arrayVinteCincoNumeros = array_merge($arrayVinteCincoNumeros);
            }

        }

        //Pegar os quinze numeros para salvar
        $lotofacil = new Lotofacil();
        $retorno = $lotofacil->gerarJogoCinco($arrayVinteCincoNumeros, $codigo);

        return redirect()->route('listaJogosC', $codigo);

    }
    
    public function listaJogos($codigo, $true = null)
    {
        
        $idConcurso = null;
        //Pegar o id do usuário da session
        $idUser = Auth::user()->id;
        //Lista todos os onze jogos do usuário para a tela
        $arrayJogosC = new JogoCincoBD();
        $arrayJogos = $arrayJogosC->listaJogosEscolhidos($codigo, $idUser);
        
        //Pegar os valores ganhado para lista na tela de resultado
        $jg = new Lotofacil();
        $arrayValoresJogos = $jg->validaJogo($arrayJogos, $idConcurso);

        return view('lotofacil-expert-profissional\criar-jogo\resultado', compact('arrayJogos', 'arrayValoresJogos', 'codigo'))
            ->with('nav', true)
            ->with('true', $true)
            ->with('aC', 'active');

    }

}

?>