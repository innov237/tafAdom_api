<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    use HasFactory;

    public $appends = ['town', 'avatar'];

    public function city(){
    	return $this->belongsTo(cities::class);
    }

    public function getTownAttribute(){
    	return cities::where('id', $this->cities_id)->first();
    }
    

    public function getAvatarAttribute(){

    	if ("user_avatar.jpg" == $this->profile_picture)
    		return route('images.show', [  'default', $this->profile_picture]);
    	else
    		return route('images.show', [ 'profiles', $this->profile_picture]);
    }
}