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
            ->where('id', $request->tipojuridico_id)
            ->get()
            ->first();

        $operacao = DB::table('operacoes')
            ->where('id', $request->operacao_id)
            ->get()
            ->first();

        $conteudos_operacoes = DB::table('conteudos_operacoes')
            ->where('operacao_id', $request->operacao_id)
            ->get('conteudo_id');

        $conteudos_tiposjuridicos = DB::table('conteudos_tiposjuridicos')
            ->where('tipojuridico_id', $request->tipojuridico_id)
            ->get('conteudo_id');

        foreach($conteudos_tiposjuridicos as $conteudo_tj) {
            foreach($conteudos_operacoes as $conteudo_operacao) {
                if($conteudo_tj->conteudo_id == $conteudo_operacao->conteudo_id) {
                    $conteudo = DB::table('conteudos')
                        ->get()
                        ->where('id', $conteudo_tj->conteudo_id)
                        ->where('id', $conteudo_operacao->conteudo_id)
                        ->first();
                }
            }
        }

        $data =  $request->data;
        $local = $request->local;

        return view('documento', compact(
            'outorgado',
            'outorgante',
            'tipo_juridico',
            'operacao',
            'conteudo',
            'data',
            'local'
        ));
    }
}
