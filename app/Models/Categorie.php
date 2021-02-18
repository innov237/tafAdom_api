<?php

namespace App\Models;

use App\Models\service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class categorie extends Model
{
    use HasFactory;

    public function service()
    {
        return $this->hasMany(service::class);
    }

}
