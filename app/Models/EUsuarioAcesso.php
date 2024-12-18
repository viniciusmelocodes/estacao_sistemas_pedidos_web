<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EUsuarioAcesso extends Model
{
    protected $table = "e_usuarios_acessos";

    protected $primaryKey = "usac_id";

    protected $fillable = [
        'usrs_id',
        'unem_id',
        'usac_nivel',
        'created_at',
        'updated_at'
    ];
}
