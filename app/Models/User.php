<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $appends = ['city', 'role'];

    public function service_request()
    {
        return $this->hasMany(service_request::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'residence',
        'cities_id',
        'telephone',
        'prenom'
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

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }

        /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }

    public function town(){
        return $this->belongsTo(cities::class, 'cities_id');
    }

    public function getRoleAttribute(){
        return Role::where('id', $this->role_id)->first();
    }

    public function getCityAttribute(){
        return cities::where('id', $this->cities_id)->first();
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function isAdmin(){   

        return $this->role->rank >= Role::find(Role::ADMIN)->rank;
    }

}
