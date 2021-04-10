<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'user_id',
        'name',
        'email',
        'phone',
        'bank',
        'account_name',
        'account_number',
        'password',
        'coupon_id',
        'balance',
        'withdraw',
        'request_withdraw',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function coupon()
    {
        return $this->hasMany(coupon::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function referral()
    {
        return $this->belongsTo(User::class);
    }

    public function indirectreferral()
    {
        return $this->hasManyThrough(User::class, User::class);
    }

    //get referal count for current auth user
    public function referal(User $user)
    {
        return $this->where('user_id', $user->id)->count();
    }

    //get first downliner details as collection
    public function downliner(User $user)
    {
        return $this->get()->where('user_id', $user->id);
    }

    //get referal count for downliner for curernt auth user
    public function indownliner($user)
    {
        return $this->where('user_id', $user)->count();
    }

    //get details of second downliner
    public function indirect($user)
    {
        $down=array();
        foreach($user as $collect){
            $lower_ref=$this->get()->where('user_id', $collect->id);

            foreach($lower_ref as $downliners){
                array_push($down, $downliners);
            }
        }
        return $down;
    }

    public function indirectref(User $user)
    {
        $list_of_downliners = $this->downliner($user);
        $listing=$this->indirect($list_of_downliners);
        $counting=array_count_values($listing);
        if(empty($counting)){
            return 0;
        }else{
            return $counting;

        }

    }

}
