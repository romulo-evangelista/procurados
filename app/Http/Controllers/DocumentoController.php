<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;

use Illuminate\Support\Facades\DB;

class DocumentoController extends Controller
{
    public function index()
    {
        $outorgados = DB::table('outorgados')->get()->all();
        $outorgantes = DB::table('outorgantes')->get()->all();
        $tipos_juridicos = DB::table('tipos_juridicos')->get()->all();
        $operacoes = DB::table('operacoes')->get()->all();
        $documentos = Documento::orderBy('created_at', 'desc')->paginate(10);
        return view('procuracao', [
            'documentos' => $documentos,
            'outorgados' => $outorgados,
            'outorgantes' => $outorgantes,
            'tipos_juridicos' => $tipos_juridicos,
            'operacoes' => $operacoes
        ]);
    }

    public function documento(Request $request)
    {
        $outorgado = DB::table('outorgados')
            ->where('id', $request->outorgado_id)
            ->get()
            ->first();

        $outorgante = DB::table('outorgantes')
            ->where('id', $request->outorgante_id)
            ->get()
            ->first();

        $tipo_juridico = DB::table('tipos_juridicos')
            ->where('id', $request->tipo_juridico_id)
            ->get()
            ->first();

        $operacao = DB::table('operacoes')
            ->where('id', $request->operacao_id)
            ->get()
            ->first();

        $conteudos = [];

        return view('documento', compact(
            'outorgado',
            'outorgante',
            'tipo_juridico',
            'operacao',
            'conteudos'
        ));
    }

    // public function create()
    // {
    //     return view('products.create');
    // }

    // public function store(ProductRequest $request)
    // {
    //     $product = new Product;
    //     $product->name        = $request->name;
    //     $product->description = $request->description;
    //     $product->quantity    = $request->quantity;
    //     $product->price       = $request->price;
    //     $product->save();
    //     return redirect()->route('products.index')->with('message', 'Product created successfully!');
    // }

    // public function show($id)
    // {
    //     //
    // }

    // public function edit($id)
    // {
    //     $product = Product::findOrFail($id);
    //     return view('products.edit',compact('product'));
    // }

    // public function update(ProductRequest $request, $id)
    // {
    //     $product = Product::findOrFail($id);
    //     $product->name        = $request->name;
    //     $product->description = $request->description;
    //     $product->quantity    = $request->quantity;
    //     $product->price       = $request->price;
    //     $product->save();
    //     return redirect()->route('products.index')->with('message', 'Product updated successfully!');
    // }

    // public function destroy($id)
    // {
    //     $product = Product::findOrFail($id);
    //     $product->delete();
    //     return redirect()->route('products.index')->with('alert-success','Product hasbeen deleted!');
    // }
}
