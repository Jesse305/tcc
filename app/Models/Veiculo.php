<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = [
      'modelo', 'ano', 'placa', 'cor', 'user_id'
    ];

    public function cliente()
    {

      return $this->hasOne(User::class, 'id', 'user_id');
    }
}
