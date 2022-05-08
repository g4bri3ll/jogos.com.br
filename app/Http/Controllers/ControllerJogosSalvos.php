<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserBD;
use Auth;
use App\Classes\ValidaArray;

class ControllerJogosSalvos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Pegar o id do usuário para lista
        $idUser = Auth::user()->id;
        $status = 1;

        $user = new UserBD();
        $arrayJogos = $user->listaJogoSalvos($idUser, $status);

        //Tira os valores repetidos
        $array = new ValidaArray();
        $arrayJogos = $array->juntarArray($arrayJogos);
        
        //Retorna para view com o array de jogos
        return view('jogos-salvos\resultados\index', compact('arrayJogos'))
                ->with('nav', true);

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
