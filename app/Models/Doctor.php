<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'direction',
        'number',

    ];


        public function invoices()
        {
            return $this->hasMany(Invoice::class);
        }

    }

