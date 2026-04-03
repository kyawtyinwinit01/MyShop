<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class Order extends Model
{
    use HasFactory,softDeletes;
    protected $table = 'orders';
    protected $fillable = [
        'voucher_no',
        'total',
        'qty',
        'payment_slip',
        'status',
        'notes',
        'item_id',
        'payment_id',
        'user_id'
    ];
}
