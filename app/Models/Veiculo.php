<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = [
      'modelo', 'ano', 'placa', 'cor', 'cliente_id'
    ];

    public function cliente()
    {

      return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }
}
