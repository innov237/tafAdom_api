<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    use HasFactory;

    public $appends = ['town'];

    public function city(){
    	return $this->belongsTo(cities::class);
    }

    public function getTownAttribute(){
    	return cities::where('id', $this->cities_id)->first();
    }
    
}