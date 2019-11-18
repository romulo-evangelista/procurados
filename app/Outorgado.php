<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outorgado extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nacionalidade',
        'estado_civil',
        'profissao',
        'CPF',
        'email',
        'endereco',
        'RG',
        'UF',
        'orgao_emissor',
    ];
}
