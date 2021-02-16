<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery_services_request extends Model
{
    use HasFactory;

    public function getStatusAttribute($value){

    	if ( 1 == $value)
    		return "En attente de traitement";

    	if ( 2 == $value)
    		return "En cours de traitement";

    	if ( 3 == $value)
    		return "Traité";
    }
    
}
