<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';

    protected $guarded = ['order_id'];

    public function format()
    {
        return [
            'email'      => $this->order_email,
            'amount'     => $this->order_amount,
            'origin'     => $this->currencyOrigin->currency_sign,
            'end'        => $this->currencyEnd->currency_sign,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }

    public function currencyOrigin()
    {
        return $this->belongsTo(Currency::class,'order_currency_id_origin');
    }

    public function currencyEnd()
    {
        return $this->belongsTo(Currency::class,'order_currency_id_end');
    }
}
