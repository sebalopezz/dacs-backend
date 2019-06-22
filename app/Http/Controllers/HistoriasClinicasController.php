<?php

namespace App\Http\Controllers;

use App\HistoriaClinica;
use App\Visita;
use Illuminate\Http\Request;

class HistoriasClinicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historiasclinicas = HistoriaClinica::all();
        foreach($historiasclinicas as $historia){
            $historia->visitas = Visita::where('idhistoriaclinica',$historia->id)->get();
        }
        return $historiasclinicas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('historiasclinicas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $historia = new HistoriaClinica();
        $historia->pacienteId = request('pacienteId');
        $historia->fechaInicio = request('fechaInicio');
        $historia->grupoSanguineo = request('grupoSanguineo');
        $historia->observaciones = request('observaciones');
        $historia->save();
        return redirect('/api/historiasclinicas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HistoriaClinica  $historiaClinica
     * @return \Illuminate\Http\Response
     */
    public function show($idpaciente)
    {  
        $historia = HistoriaClinica::where('pacienteId',$idpaciente)->first();
        if (!$historia){
            return $historia;
        }
        $historia->visitas = Visita::where('HistoriaClinicaId',$historia->id)->get();
        return $historia;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistoriaClinica  $historiaClinica
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoriaClinica $historiaClinica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistoriaClinica  $historiaClinica
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $historia = HistoriaClinica::find($id);
        $historia->pacienteId = request('pacienteId');
        $historia->fechaInicio = request('fechaInicio');
        $historia->grupoSanguineo = request('grupoSanguineo');
        $historia->observaciones = request('observaciones');
        $historia->save();
        return redirect('/api/historiasclinicas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistoriaClinica  $historiaClinica
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HistoriaClinica::find($id)->delete();
        return redirect('/api/historiasclinicas');
    }
}
