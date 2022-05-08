<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LotofacilBD;
use App\Classes\lotofacil;

class ControllerJogoRastreador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($qtd = 10)
    {

        $lotofacil = new LotofacilBD();
        $arrays = $lotofacil->listaJogos($qtd);

        //Colocar as cores no botão referente ao chamado
        $cor = 'btn-primary';
        $botao = 0;
        if ($qtd == 10) {
            $botao = 'corDez';
        } else if ($qtd == 20) {
            $botao = 'corVinte';
        } else if ($qtd == 30) {
            $botao = 'corTrinta';
        } else if ($qtd == 40) {
            $botao = 'corQuarenta';
        } else if ($qtd == 50) {
            $botao = 'corCinquenta';
        } else {
            $botao = 'corCem';
        }

        //Retorna a quantidade de numero que mais saiu, dos 25 numeros
        $lot = new lotofacil();
        $arrayNum = $lot->retornaMaioresNumeros($arrays);

        /*Verificar os numeros repetidos do jogos pra lista. Jogo 1983 e 1984 os numeros que fora repetidos*/
        $lot = new lotofacil();
        $arrayNumRepetidos = $lot->verificarNumerosRepetidos($arrays);

        //Juntas os array em um
        //$arrays = array_merge($arrays, $arrayNumRepetidos);

        return view('lotofacil-rastreador-tendencias\rastreador\index', compact('arrays', 'arrayNum', 'arrayNumRepetidos'))
                ->with('nav', true)
                ->with('aR', 'active')
                ->with($botao, 'btn-primary');
                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
