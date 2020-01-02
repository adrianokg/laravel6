<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome', 'data_nascimento', 'sexo', 'cep', 'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'estado'];
    protected $dates = ['data_nascimento'];
    protected $table = 'clientes';
}
