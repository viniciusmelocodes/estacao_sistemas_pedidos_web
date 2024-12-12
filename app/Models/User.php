<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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
        'unem_id',
        'usrs_login',
        'usrs_nome',
        'usrs_senha',
        'usrs_situacao',
        'usrs_nivel',
        'usrs_desconto_mercadoria',
        'usrs_desconto_servico',
    ];
}
