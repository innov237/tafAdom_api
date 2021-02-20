<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_provider extends Model
{
    use HasFactory;

    protected $appends = ['count_mark'];


    public function scopeServices($query, $value){
    	return $query->where('id_service', $value);
    }

    public function provider(){
    	return $this->belongsTo(provider::class ,'id_provider');
    }

    public function service(){
    	return $this->belongsTo(service::class ,'id_service');
    }

    public function getCountMarkAttribute(){
    	return delivery_request_review::count();
    }
}
