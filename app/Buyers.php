<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyers extends Model
{
    public $table = 'buyers';

    public $fillable = ['fullName', 'email', 'phone','address', 'totalValue', 'status', 'ref'];
}
