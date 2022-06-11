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
        return $this->belongsTo(User::class,'id_seller');
    }
    public function product()
    {
        return $this->belongsTo(Product::class ,'fk_seller');
    }
}
