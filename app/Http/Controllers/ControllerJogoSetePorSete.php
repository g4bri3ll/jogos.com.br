<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LotofacilBD;

class ControllerJogoSetePorSete extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($error = false)
    {
        $numeroConcurso = 0;
        $loteria = new LotofacilBD();
        $arrayDados = $loteria->dadosAPI($numeroConcurso);

        $resultado      = $arrayDados['resultado'];
        $numeroConcurso = $arrayDados['numeroConcurso'];
        $dataSorteio    = $arrayDados['dataSorteio'];
        $acumulou       = $arrayDados['acumulou'];

        $lotofacil = new LotofacilBD();
        $numeros = $lotofacil->listaNImpar();

        return view('lotofacil-erre-7\criar-jogo\index')
                ->with('nav', true)
                ->with('numeros', $numeros)
                ->with('aS', 'active')
                ->with('resultado', $resultado)
                ->with('error', $error)
                ->with('dataSorteio', $dataSorteio)
                ->with('numeroConcurso', $numeroConcurso)
                ->with('acumulou', $acumulou);
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
