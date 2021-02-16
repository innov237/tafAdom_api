<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery_services_request extends Model
{
    use HasFactory;

    protected $fillable = ['amout', 'status', 'delivery_address_id'];

    public function getStatusAttribute($value){

    	
    	if ( 1 == $value)
    		return "En cours de traitement";

    	if ( 2 == $value)
    		return "Traité";
    }
    
}
