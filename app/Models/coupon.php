<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function plan(){
        $amount=$this->get()->where('id', auth()->user()->coupon_id);
        foreach($amount as $value){
            $price=$value->amount;
        }
        return $price;
    }
}
