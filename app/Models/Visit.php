<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;


    public function doctors()
    {
        return $this->belongsTo(User::class,'doctor_id', 'id');
    }
    public function patients()
    {
        return $this->belongsTo(User::class,'patient_id', 'id');
    }
    public function diagnosis()
    {
        return $this->hasOne(Diagnosis::class, 'visit_id', 'id');
    }
}
