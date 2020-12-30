<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    public function symptoms()
    {
        return $this->hasOne(Symptom::class, 'id', 'symptom_id');
    }
}
