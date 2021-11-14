<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    use HasFactory;

    protected $fillable=[
        'tipo_movimentacao',
        'valor',
        'observacao',
        'funcionario_id',
        'administrador_id',
        'data_criacao',
    ];

    protected $table = 'movimentacao';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = null;

    public function administrador(){
    	return $this->belongsTo(Administrador::class);
    }

    public function funcionario(){
    	return $this->belongsTo(Funcionario::class);
    }
}
