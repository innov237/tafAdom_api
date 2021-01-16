<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_request extends Model
{
    use HasFactory;
    public function serviceUser()
    {
        return $this->belongsTo(User::class);
    }
}
