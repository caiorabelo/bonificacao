<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable=[
        'nome_completo',
        'login',
        'senha',
        'senha',
        'saldo_atual',
        'administrador_id',
        'data_criacao',
        'data_alteracao',
    ];

    protected $table = 'funcionario';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_alteracao';

    public function administrador(){
    	return $this->belongsTo(Administrador::class);
    }

    public function movimentacao(){
    	return $this->hasMany(Movimentacao::class);
    }
}
