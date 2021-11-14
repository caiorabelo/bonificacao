<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Administrador extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nome_completo',
        'login',
        'senha',
        'data_criacao',
        'data_alteracao',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'senha',
    ];

    protected $table = 'administrador';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_alteracao';

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function funcionario(){
    	return $this->hasMany(Funcionario::class);
    }
    public function movimentacao(){
    	return $this->hasMany(Movimentacao::class);
    }
}
