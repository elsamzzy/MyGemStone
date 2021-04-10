<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\coupon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SetCouponController extends Controller
{

    public function __construct()
    {
        $this->middleware('coup');
    }

    public function index()
    {
        return view('auth.coupon');
    }

    public function store(Request $request)
    {

        $coupon = coupon::where('code', $request['coupon'])->exists();

        if($coupon === false){
            return back()->with('status', 'Invalid coupon code');
        }

        $coudetails = coupon::get()->where('code', $request['coupon']);

        foreach($coudetails as $coupons){
            $couponid=$coupons->id;
        }

        $request->request->add(['coupon_id' => $couponid]);

        $this->validate($request, [
            'coupon_id' => ['unique:users'],
            'coupon' => ['required', 'numeric'],
            'checkbox' => ['required']
        ]);

        $user = session('user');

        User::where('username', $user)->update(['coupon_id'=> $request['coupon_id']]);

        $request->session()->forget('coupon');

        session(['success' => 'yes']);

        return redirect()->route('success');
    }
}
