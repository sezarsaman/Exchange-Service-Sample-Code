<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $primaryKey = 'currency_id';

    protected $guarded = ['currency_id'];
}
