<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'last_name', 'extra_data'
    ];

    protected $casts = [
        'extra_data' => 'array'
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            // get: fn ($value) => ucfirst($value),
            set: fn ($value) => ucwords($value),
        );
    }
    // relationship

    public function people()
    {
        return $this->belongsTo(User::class);
    }
}
