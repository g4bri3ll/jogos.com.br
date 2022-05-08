<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserBD;
use App\Classes\ValidaArray;
use App\Models\LotofacilBD;
use App\Models\JogoTresBD;
use App\Models\JogoQuatroDB;
use App\Models\JogoCincoBD;
use App\Models\JogoSeteBD;
use DateTime;
use Auth;
use App\Classes\Lotofacil;
use App\Classes\Jogo_quatro;
use App\Classes\Jogo_tres;
use App\Classes\Jogo_cinco;
use App\Classes\Jogo_sete;
use App\Classes\NumerosSorteados;
use Dompdf\Dompdf;
use App\Classes\GerarHtmlJogo;

class ControllerResourceJogosSalvos extends Controller
{
	
	public function excluirJogo($codigo)
	{
		
		//Percorrer as tabelas pra verificar qual dela esta o codigo passado
        $tableTres   = new JogoTresBD();
        $arrayJogoT = $tableTres->listPeloCodigo($codigo);

        $tableQuatro = new JogoQuatroDB();
        $arrayJogoQ = $tableQuatro->listPeloCodigo($codigo);
        
        $tableCinco  = new JogoCincoBD();
        $arrayJogoC = $tableCinco->listPeloCodigo($codigo);
        
        $tableSete   = new JogoSeteBD();
        $arrayJogoS = $tableSete->listPeloCodigo($codigo);

        //Verificar em qual tabela esta o codigo
        if (!empty($arrayJogoT)) {
            
            //faz a excluir na tabela correspondente
            $tableT = new JogoTresBD();
            $verificar = $tableT->destroy($codigo);    

        } else if (!empty($arrayJogoQ)) {
            
            //faz a excluir na tabela correspondente
            $tableQ = new JogoQuatroDB();
            $verificar = $tableQ->destroy($codigo);    

        } else if (!empty($arrayJogoC)) {
            
            //faz a excluir na tabela correspondente
            $tableC = new JogoCincoBD();
            $verificar = $tableC->destroy($codigo);    

        } else if (!empty($arrayJogoS)) {
            
            //faz a excluir na tabela correspondente
            $tableS = new JogoSeteBD();
            $verificar = $tableS->destroy($codigo);    

        }


        $sucess = 0;
        //Verificar se retorno verdadeiro a exclusão do item
		if ($verificar) {
			$sucess = 1;        	
	    }        

        //Retorna para rota redirecionar para view
        return redirect()->route('jogos.index')->with('sucess', $sucess);
        ;

	}

    //Lista os jogos salvos
    public function listaJogoSalvo($codigo)
    {

        //Lista os ultimos 10 jogos
        $dezJogos = new LotofacilBD();
        $arrayDezJogos = $dezJogos->listaDezJogos();

        //Pegar o array do jogo
        $arrayJogos = 0;

        //Verificar de qual tabela esta vindo o jogo
        $qualJogo = 0;
        
        //Percorrer as tabelas pra verificar qual dela esta o codigo passado
        $tableTres   = new JogoTresBD();
        $arrayJogos = $tableTres->listPeloCodigo($codigo);
        $qualJogo = "tres";
        
        if (count($arrayJogos) <= 0) {
            $tableQuatro = new JogoQuatroDB();
            $arrayJogos = $tableQuatro->listPeloCodigo($codigo);
            $qualJogo = "quatro";
        }
        
        if (count($arrayJogos) <= 0) {
            $tableCinco  = new JogoCincoBD();
            $arrayJogos = $tableCinco->listPeloCodigo($codigo);
            $qualJogo = "cinco";
        }
        
        if (count($arrayJogos) <= 0) {
            $tableSete   = new JogoSeteBD();
            $arrayJogos = $tableSete->listPeloCodigo($codigo);
            $qualJogo = "sete";
        }
        
        //Retorna para a view com o array para lista
        return view('jogos-salvos\resultados\listaJogo', 
                compact('arrayJogos', 
                        'arrayDezJogos', 
                        'codigo', 
                        'qualJogo'))
                    ->with('nav', true);

    }

    public function salvaJogoUsers($codigo)
    {

        //Verificar se o codigo existe no banco de dados
        $lotDAO = new LotofacilBD();
        $valida = $lotDAO->verificarExisteCodigo($codigo);
        $true = "Jogo salvo com sucesso";
        
        if(!empty($valida['tres'])){
            //Salvar o jogo pelo codigo
            $lotDAO = new LotofacilBD();
            $resultado = $lotDAO->salvaJogoTres($codigo);

            if (empty($resultado)) {
                return redirect()->route('listaJogosPorTres', [$codigo, $true]);
            }

        }

        if(!empty($valida['quatro'])){
            //Salvar o jogo pelo codigo
            $lotDAO = new LotofacilBD();
            $resultado = $lotDAO->salvaJogoQuatro($codigo);

            if (empty($resultado)) {
                return redirect()->route('listJogosQuatro', [$codigo, $true]);
            }
        
        }

        if(!empty($valida['cinco'])){
            //Salvar o jogo pelo codigo
            $lotDAO = new LotofacilBD();
            $resultado = $lotDAO->salvaJogoCinco($codigo);

            if (empty($resultado)) {
                return redirect()->route('listaJogosC', [$codigo, $true]);
            }
            
        }

        if(!empty($valida['sete'])){
            //Salvar o jogo pelo codigo
            $lotDAO = new LotofacilBD();
            $resultado = $lotDAO->salvaJogoSete($codigo);

            if (empty($resultado)) {
                return redirect()->route('listaJogosSete', [$codigo, $true]);
            }

        } 

        return view('login')->with('false', 'Erro, entre em contato com o administrador do sistema !!!');
        
    }

    public function listaPorConcurso(Request $request)
    {

        $qualJogo = $request->qualJogo;
        $codigo = $request->codigo;
        $idConcurso = $request->idConcurso;
        $arrayJogos = 0;
        $dataConcurso = 0;
        $numeroJogo = 0;

        //Lista os ultimos 10 jogos
        $dezJogos = new LotofacilBD();
        $arrayDezJogos = $dezJogos->listaDezJogos();

        foreach ($arrayDezJogos as $key) {
            if ($idConcurso == $key->id) {
                $date = new DateTime($key->data_sorteio);
                $dataConcurso = $date->format('d/m/Y');
                $numeroJogo = $key->numero_concurso;
            }
        }
        
        //Pegar o id da session
        $idUser = Auth::user()->id;

        if ($qualJogo == "tres") {            

            //Retorna com todo o array do jogo, pelo codigo e o id do usuario
            $jgs = new JogoTresBD();
            $arrayJogos = $jgs->todosJogos($codigo, $idUser);
            
        }

        if ($qualJogo == "quatro") {
            
            //Lista todos os onze jogos do usuário para a tela
            $arrayJogosQ = new JogoQuatroDB();
            $arrayJogos = $arrayJogosQ->listaJogosEscolhidos($codigo, $idUser);
            
        }
        
        if ($qualJogo == "cinco") {
    
            //Lista todos os onze jogos do usuário para a tela
            $arrayJogosC = new JogoCincoBD();
            $arrayJogos = $arrayJogosC->listaJogosEscolhidos($codigo, $idUser);
            
        }
        
        if ($qualJogo == "sete") {
            
            //Lista todos os onze jogos do usuário para a tela
            $arrayJogosS = new JogoSeteBD();
            $arrayJogos = $arrayJogosS->listaJogosEscolhidos($codigo, $idUser);

        }

        //Pegar os valores ganhado para lista na tela de resultado
        $jg = new Lotofacil();
        $arrayValoresJogos = $jg->validaJogo($arrayJogos, $idConcurso);

        /*/
            echo "Arrays de jogos" . "<br /><br />";
            print_r($arrayJogos);
            echo "<br /><br />" . "Arrays de dez jogos" . "<br /><br />";
            print_r($arrayDezJogos);
            echo "<br /><br />" . "codigo do jogos" . "<br /><br />";
            print_r($codigo);
            echo "<br /><br />" . "qual jogo jogos" . "<br /><br />";
            print_r($qualJogo);    
        /*/

        //Retorna para a view com o array para lista
        return view('jogos-salvos\resultados\listaJogo')
            ->with('arrayJogos', $arrayJogos)
            ->with('arrayDezJogos', $arrayDezJogos)
            ->with('codigo', $codigo)
            ->with('qualJogo', $qualJogo)
            ->with('dataConcurso', $dataConcurso)
            ->with('numeroJogo', $numeroJogo)
            ->with('arrayValoresJogos', $arrayValoresJogos)
            ->with('nav', true);
        
    }

    public function geraPDF($codigo)
    {
        
        $jogos = 0;

        $tableTres   = new JogoTresBD();
        $jogos = $tableTres->listPeloCodigo($codigo);

        if (count($jogos) <= 0) {
            $tableQuatro = new JogoQuatroDB();
            $jogos = $tableQuatro->listPeloCodigo($codigo);
        }
        
        if (count($jogos) <= 0) {
            $tableCinco  = new JogoCincoBD();
            $jogos = $tableCinco->listPeloCodigo($codigo);
        }
        
        if (count($jogos) <= 0) {
            $tableSete   = new JogoSeteBD();
            $jogos = $tableSete->listPeloCodigo($codigo);
        }

        $gera = new GerarHtmlJogo();
        $html = $gera->geraJogoHtml($jogos);
        
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->load_html($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("jogos.pdf");

    }

}

?>