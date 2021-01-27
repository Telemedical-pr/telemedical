<?php

namespace App\Models;

use Carbon\Carbon;
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
        return $this->hasMany(Visit::class,'id','patient_id');
    }
    public function docVisits(){
        return $this->hasMany(Visit::class,'id','doctor_id');
    }

    public function symptoms()
    {
        return $this->hasMany(Symptom::class,'id', 'patient_id');
    }
    public function docOnline()
    {
        return $this->hasMany(Symptom::class,'id', 'doctor_id');
    }


    public function docSpecialization()
    {
        return $this->hasOne(Category::class, 'id', 'specialization');
    }

    public function getAge()
    {
        return Carbon::parse($this->attributes['DOB'])->age;
    }

    public function getMetricHeight(){
        if($this->attributes['unit_height'] == 'FT'){
            $height = ($this->attributes['last_height'])*30.48;
        }else{
            $height = ($this->attributes['last_height']);
        }

        return $height;
    }

    public function getMass()
    {
        if($this->attributes['unit_weight'] == 'LBS'){
            $weight = ($this->attributes['last_weight'])/2.2046226218488000903;
        }else{
            $weight = ($this->attributes['last_weight']);
        }

        return $weight;
    }

    public function getBMI(){
        if ($this->getMass() != null && $this->getMetricHeight() != null) {
            $mass =  $this->getMass();
            $height = $this->getMetricHeight();
            return $mass/(($height*$height)/10000);
        } else {
            return null;
        }

    }

    public function getVerdict()
    {
        if ($this->getBMI()) {
            if ($this->getBMI() < 18.5) {
                return 'You are in the Underweight Category';
            } elseif($this->getBMI() >= 18.5 && $this->getBMI() < 25){
                return 'You are Healthy and your BMI is normal';
            } elseif($this->getBMI() >= 25 && $this->getBMI() < 30){
                return 'You are in the Overweight Category';
            }else {
                return 'You are in the Obese Category';
            }
        }else {
            return 'Please set your Height and Weight to get your BMI';
        }

    }

    public function docExperience()
    {
        return (date("Y")) - ($this->attributes['start_year']);
    }

}
