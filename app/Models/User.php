<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function extras()
    {
        return $this->hasOne(Extra::class,'id', 'patient_id');
    }
    public function patientVisits(){
        return $this->hasMany(Visits::class,'id','patient_id');
    }
    public function docVisits(){
        return $this->hasMany(Visits::class,'id','doctor_id');
    }

    public function symptoms()
    {
        return $this->hasMany(Symptom::class,'id', 'patient_id');
    }


}
