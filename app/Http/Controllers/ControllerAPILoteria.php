<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LotofacilBD;

class ControllerAPILoteria extends Controller
{

    public function atualizaBD($numeroConcurso)
    {
        
        $loteria = new LotofacilBD();
        $arrayDados = $loteria->dadosAPI($numeroConcurso);

        $resultado      = $arrayDados['resultado'];
        $numeroConcurso = $arrayDados['numeroConcurso'];
        $dataSorteio    = $arrayDados['dataSorteio'];
        $proxDtConcurso = $arrayDados['proxDtConcurso'];
        $acumulou       = $arrayDados['acumulou'];
        $premioAcumulad = $arrayDados['premioAcumulad'];
        $valorEstimado  = $arrayDados['valorEstimado'];       

        $loteria = new LotofacilBD();
        $loteria->gravaAPILoteria($resultado, $numeroConcurso, $dataSorteio, $proxDtConcurso, $acumulou, $premioAcumulad, $valorEstimado);

        return view('index');

    }

    //Atualiza o banco de dados com o ultimo jogo da API
    public function verificaAtualizacao()
    {

        //Chamada da funcão para os resultado da loteria
        $api = new \GiordanoLima\LoteriasApi\Lotofacil();
        //Retorna o número do próximo concurso ao atual. Este valor poderá ser utilizado no construtor da classe para buscar os respectivos dados.
        $numeroConcurso = $api->getProximoConcurso();

        $lotofacil = new LotofacilBD();
        $numeros = $lotofacil->listaUltimoJogo();
        $num_concurso = 0;

        //Colocar o valor do ultimo concurso no banco de dados e igual ao da API
        foreach ($numeros as $key) {
            $num_concurso = $key->numero_concurso;
        }

        //Verificar se o ultimo cadastro do banco de dados foi do concurso atual
        if ($numeroConcurso > $num_concurso) {
            
            return redirect()->route('atualizaBD', $numeroConcurso);

        } else {
            
            //Retorna para o index inicial
            return redirect()->route('pagina_inicial');
                    
        }
        
    }

}
