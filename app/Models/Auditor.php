<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditor extends Model
{
    use HasFactory;
    protected $fillable = [
        'dui',
        'nit',
        'address',
        'id_usuario',
    ];
}
