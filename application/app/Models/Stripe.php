<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stripe extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'stripes';

    protected $fillable = [
        'id',
        'client_id',
        'object',
        'amount',
        'client_secret',
        'capture_method',
        'confirmation_method',
        'created',
        'currency',
        'payment_method_types'
    ];


}
