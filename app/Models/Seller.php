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
        return $this->hasOne(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class ,'fk_seller');
    }
}
