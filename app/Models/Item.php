<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class Item extends Model
{
    use HasFactory,softDeletes;
    protected $table = 'items';
    protected $fillable = [
        'code_no',
        'name',
        'image',
        'price',
        'discount',
        'in_stock',
        'description',
        'category_id'
    ];
}
