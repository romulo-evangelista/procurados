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
        $documentos = Documento::orderBy('created_at', 'desc')->paginate(10);
        return view('documentos', [
            'documentos' => $documentos,
            'outorgados' => $outorgados
        ]);
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