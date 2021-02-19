<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public const ROOT = 1;
    public const ADMIN = 2;
    public const USER = 3;
}