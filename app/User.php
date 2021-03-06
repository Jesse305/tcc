<?php

namespace App;
use App\Models\Perfil;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Veiculo;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'cpf', 'perfil_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getPerfil()
    {
      return $this->hasOne(Perfil::class, 'id', 'perfil_id');
    }

    public function getVeiculos()
    {

      return $this->hasMany(Veiculo::class);
    }

}
