<?php

namespace App\Http\Controllers;

use App\Visita;
use Illuminate\Http\Request;

class VisitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitas = Visita::all();
        return $visitas;
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
        $visita = new Visita();
        $visita->fecha = request('fecha');
        $visita->sintomas = request('sintomas');
        $visita->diagnostico = request('diagnostico');
        $visita->idreceta = request('idreceta');
        $visita->idmedico = request('idmedico');
        $visita->idpartida = request('idpartida');
        $visita->save();
        return redirect('/api/visitas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visita  $visita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visita = Visita::find($id);
        return $visita;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visita  $visita
     * @return \Illuminate\Http\Response
     */
    public function edit(Visita $visita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visita  $visita
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $visita = Visita::find($id);
        $visita->fecha = request('fecha');
        $visita->sintomas = request('sintomas');
        $visita->diagnostico = request('diagnostico');
        $visita->idreceta = request('idreceta');
        $visita->idmedico = request('idmedico');
        $visita->idpartida = request('idpartida');
        $visita->save();
        return redirect('/api/visitas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visita  $visita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Visita::find($id)->delete();
        return redirect('/api/visitas');
    }
}
