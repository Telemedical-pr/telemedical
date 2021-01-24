<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id',
        'diagnosis'
    ];

    public function visits()
    {
        return $this->belongsTo(Visit::class, 'id', 'visit_id');
    }
}
