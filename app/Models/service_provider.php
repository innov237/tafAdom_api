<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_provider extends Model
{
    use HasFactory;

    public function provider(){
    	return $this->belongsTo(provider::class ,'id_provider');
    }

    public function service(){
    	return $this->belongsTo(service::class ,'id_service');
    }
}
