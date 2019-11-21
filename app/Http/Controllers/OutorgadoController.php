<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outorgado;

class OutorgadoController extends Controller
{
    public function index()
    {
        $outorgados = Outorgado::orderBy('id', 'asc')->paginate(10);
        return view('outorgados',['outorgados' => $outorgados]);
    }

    public function create()
    {
        return view('new-outorgado');
    }

    public function store(Request $request)
    {
        $outorgado = new Outorgado;
        $outorgado->nacionalidade = $request->nacionalidade;
        $outorgado->estado_civil  = $request->estado_civil;
        $outorgado->profissao     = $request->profissao;
        $outorgado->CPF           = $request->CPF;
        $outorgado->email         = $request->email;
        $outorgado->endereco      = $request->endereco;
        $outorgado->RG            = $request->RG;
        $outorgado->UF            = $request->UF;
        $outorgado->orgao_emissor = $request->orgao_emissor;
        $outorgado->save();
        return redirect()->route('outorgado.index')->with('message', 'Outorgado created successfully!');
    }
}
