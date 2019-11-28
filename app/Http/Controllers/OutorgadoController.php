<?php

namespace App\Http\Controllers;

use App\Outorgado;
use Illuminate\Http\Request;

class OutorgadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outorgados = Outorgado::all();

        return view('outorgados.index',compact('outorgados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outorgados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Outorgado::create($request->all());

        return redirect()
            ->route('outorgados.index')
            ->with('success','Outorgado criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Outorgado  $outorgado
     * @return \Illuminate\Http\Response
     */
    public function show(Outorgado $outorgado)
    {
        // return view('outorgados.show',compact('outorgado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Outorgado  $outorgado
     * @return \Illuminate\Http\Response
     */
    public function edit(Outorgado $outorgado)
    {
        return view('outorgados.edit',compact('outorgado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outorgado  $outorgado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outorgado $outorgado)
    {
        $outorgado->update($request->all());

        return redirect()
            ->route('outorgados.index')
            ->with('success','Outorgado atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Outorgado  $outorgado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outorgado $outorgado)
    {
        $outorgado->delete();

        return redirect()
            ->route('outorgados.index')
            ->with('success','Outorgado deletado com sucesso.');
    }
}
