<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery_address extends Model
{
    use HasFactory;

    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function city(){
    	return $this->belongsTo(cities::class, 'city_id');
    }

    public function owner(){
        return User::find($this->user_id);
    }

}
