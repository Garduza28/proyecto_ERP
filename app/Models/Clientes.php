<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

        use HasFactory;

        protected $fillable = [
            'name',
            'direccion',
            'numtel',
            'email',
            'name_empresa',
            'cargo_empresa',
            'direccion_empresa',
            'num_empresa',
            'email_empresa',
            'preferencia_contacto',
        ];

    }

