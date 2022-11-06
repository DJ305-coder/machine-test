<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'contact_number',
        'address',
        'email',
        'password',
        'country_id',
        'state_id',
        'city_id',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = md5($value);
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id'); 
    }

    public function state(){
        return $this->belongsTo(State::class, 'state_id'); 
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }
}
