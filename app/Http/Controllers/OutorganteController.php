<?php

namespace App\Http\Controllers;

use App\Outorgante;
use Illuminate\Http\Request;

class OutorganteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outorgantes = Outorgante::latest()->paginate(5);

        return view('outorgantes.index',compact('outorgantes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outorgantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Outorgante::create($request->all());

        return redirect()
            ->route('outorgantes.index')
            ->with('success','Outorgante criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Outorgante  $outorgante
     * @return \Illuminate\Http\Response
     */
    public function show(Outorgante $outorgante)
    {
        // return view('outorgantes.show',compact('outorgante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Outorgante  $outorgante
     * @return \Illuminate\Http\Response
     */
    public function edit(Outorgante $outorgante)
    {
        return view('outorgantes.edit',compact('outorgante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outorgante  $outorgante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outorgante $outorgante)
    {
        $outorgante->update($request->all());

        return redirect()
            ->route('outorgantes.index')
            ->with('success','Outorgante atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Outorgante  $outorgante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outorgante $outorgante)
    {
        $outorgante->delete();

        return redirect()
            ->route('outorgantes.index')
            ->with('success','Outorgante deletado com sucesso.');
    }
}
