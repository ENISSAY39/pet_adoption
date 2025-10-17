<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'breed',
        'age',
        'adopted',
        'species_id',
    ];

    protected $casts = [
        'adopted' => 'boolean',
    ];

    public function species()
    {
        return $this->belongsTo(Species::class);
    }
}
