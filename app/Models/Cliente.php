<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Veiculo;

class Cliente extends Model
{
    protected $fillable = [
      'nome', 'cpf', 'telefone', 'email'
    ];

    public function isVeiculo()
    {
      $isVeiculo = Veiculo::where('cliente_id', $this->id)->count();

      return $isVeiculo;
    }
}
