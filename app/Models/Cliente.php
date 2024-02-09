<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'persona';

    protected $primaryKey = 'id_persona';

    public $timestamps = false;

    protected $fillable= [
        'tipo_persona',
        'nombre',
        'tipo_documento',
        'numero_documento',
        'telefono',
        'direccion',
        'email',

    ];

    protected $guarded = [
        
    ];
}
