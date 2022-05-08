<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lotoFacilBD;

class ControllerLotofacil extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Buscar o ultimo resultado da lotofacil cadastrado no sistema
        /*$lotoFacilBD = new LotofacilBD();
        $arrayUltimoJogo = $lotoFacilBD->ultimoJogo();*/

        /*return header('Location: http://loterias.caixa.gov.br/wps/portal/loterias/landing/lotofacil/');*/
        //return view('loteria\lotofacil\resultado', compact('arrayUltimoJogo'));
        return view('loteria\lotofacil\resultado');

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
