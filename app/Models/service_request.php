<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_request extends Model
{
    use HasFactory;
    
    public function serviceUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function serviceAsk()
    {
        return $this->belongsTo(service::class, 'service_id');
    }


    public function delivryAddress()
    {
        return $this->belongsTo(delivery_address::class, 'delivery_address_id');
    }

    public function serviceProcessing()
    {
        return $this->hasMany(delivery_services_request::class, 'service_request_id');
    }
}
