<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'texto',
    ];
    protected $table = 'operacoes';
}
