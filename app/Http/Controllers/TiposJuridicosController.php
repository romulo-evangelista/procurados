<?php

namespace App\Http\Controllers;

use App\TiposJuridicos;
use Illuminate\Http\Request;

class TiposJuridicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_juridicos = TiposJuridicos::latest()->paginate(5);

        return view('tipos_juridicos.index',compact('tipos_juridicos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos_juridicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TiposJuridicos::create($request->all());

        return redirect()
            ->route('tipos_juridicos.index')
            ->with('success','Tipo Jurídico criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TiposJuridicos  $tipo_juridico
     * @return \Illuminate\Http\Response
     */
    public function show(TiposJuridicos $tipo_juridico)
    {
        // return view('tipos_juridicos.show',compact('tipo_juridico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TiposJuridicos  $tipo_juridico
     * @return \Illuminate\Http\Response
     */
    public function edit(TiposJuridicos $tipo_juridico)
    {
        return view('tipos_juridicos.edit',compact('tipo_juridico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TiposJuridicos  $tipo_juridico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TiposJuridicos $tipo_juridico)
    {
        $tipo_juridico->update($request->all());

        return redirect()
            ->route('tipos_juridicos.index')
            ->with('success','Tipo Jurídico atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TiposJuridicos  $tipo_juridico
     * @return \Illuminate\Http\Response
     */
    public function destroy(TiposJuridicos $tipo_juridico)
    {
        $tipo_juridico->delete();

        return redirect()
            ->route('tipos_juridicos.index')
            ->with('success','Tipo Jurídico deletado com sucesso.');
    }
}
