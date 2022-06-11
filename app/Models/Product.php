<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'unitPrice',
        'existence',
        'warranty',
        'fk_seller',
    ];
    public function seller()
    {
        return $this->belongsTo(Seller::class, "id_seller");
    }
}
