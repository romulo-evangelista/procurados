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
        $tiposJuridicos = TiposJuridicos::latest()->paginate(5);

        return view('tiposJuridicos.index',compact('tiposJuridicos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiposJuridicos.create');
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
            ->route('tiposJuridicos.index')
            ->with('success','Tipo Jurídico criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TiposJuridicos  $tiposJuridicos
     * @return \Illuminate\Http\Response
     */
    public function show(TiposJuridicos $tiposJuridicos, $id)
    {
        // $tiposJuridicos = TiposJuridicos::where('id', $id)->get()->first();
        // return view('tiposJuridicos.show',compact('tiposJuridicos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TiposJuridicos  $tiposJuridicos
     * @return \Illuminate\Http\Response
     */
    public function edit(TiposJuridicos $tiposJuridicos, $id)
    {
        $tiposJuridicos = TiposJuridicos::where('id', $id)->get()->first();
        return view('tiposJuridicos.edit',compact('tiposJuridicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TiposJuridicos  $tiposJuridicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TiposJuridicos $tiposJuridicos, $id)
    {
        $tiposJuridicos = TiposJuridicos::where('id', $id)->get()->first();
        $tiposJuridicos->update($request->all());

        return redirect()
            ->route('tiposJuridicos.index')
            ->with('success','Tipo Jurídico atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TiposJuridicos  $tiposJuridicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(TiposJuridicos $tiposJuridicos, $id)
    {
        $tiposJuridicos = TiposJuridicos::where('id', $id)->get()->first();
        $tiposJuridicos->delete();

        return redirect()
            ->route('tiposJuridicos.index')
            ->with('success','Tipo Jurídico deletado com sucesso.');
    }
}
