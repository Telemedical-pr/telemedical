<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    use HasFactory;

    public function doctors()
    {
        return $this->belongsTo('App\Models\User','doctor_id', 'id');
    }
    public function patients()
    {
        return $this->belongsTo('App\Models\User','patient_id', 'id');
    }
}
