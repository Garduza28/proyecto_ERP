<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'orden',
        'paciente',
        'color',
        'trabajo',
        'doctor_id',
        'materiales_total', // Asegúrate de incluir este campo en $fillable
        'material_recepcion'
    ];

    protected $casts = [
        'material_recepcion' => 'array',
        'materiales_total' => 'array' // Define este campo como un array
    ];


    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function materiales()
{
    return $this->belongsToMany(Material::class)->withPivot('unidades', 'precio_total');
}

    public function statu()
    {
        return $this->belongsTo(Status::class);
    }
}
