<?php

namespace App\Http\Controllers;

use App\Operacao;
use Illuminate\Http\Request;

class OperacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operacoes = Operacao::all();

        return view('operacoes.index',compact('operacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operacoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Operacao::create($request->all());

        return redirect()
            ->route('operacoes.index')
            ->with('success','Operação criada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operacao  $operacao
     * @return \Illuminate\Http\Response
     */
    public function show(Operacao $operacao, $id)
    {
        // $operacao = Operacao::where('id', $id)->get()->first();
        // return view('operacoes.show',compact('operacao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Operacao  $operacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Operacao $operacao, $id)
    {
        $operacao = Operacao::where('id', $id)->get()->first();
        return view('operacoes.edit',compact('operacao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Operacao  $operacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operacao $operacao, $id)
    {
        $operacao = Operacao::where('id', $id)->get()->first();
        $operacao->update($request->all());

        return redirect()
            ->route('operacoes.index')
            ->with('success','Operação atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operacao  $operacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operacao $operacao, $id)
    {
        $operacao = Operacao::where('id', $id)->get()->first();
        $operacao->delete();

        return redirect()
            ->route('operacoes.index')
            ->with('success','Operação deletada com sucesso.');
    }
}
