<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class EUsuario extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'e_usuarios';

    protected $primaryKey = 'usrs_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'usrs_login',
        'usrs_nome',
        'usrs_senha',
        'usrs_situacao',
        'usrs_desconto_mercadoria',
        'usrs_desconto_servico',
        'created_at',
        'updated_at'
    ];
}
