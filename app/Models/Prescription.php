<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'symptom_id',
        'prescription'
    ];
    use HasFactory;

    public function symptoms()
    {
        return $this->hasOne(Symptom::class, 'id', 'symptom_id');
    }
}
