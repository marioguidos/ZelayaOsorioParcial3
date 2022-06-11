<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $fillable = [
        'dui',
        'nit',
        'address',
        'id_usuario',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }
    public function products()
    {
        return $this->hasMany(Product::class ,'fk_seller');
    }
}
