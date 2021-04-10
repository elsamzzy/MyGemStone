<?php

namespace App\Http\Controllers;

use App\Models\coupon;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index(User $user, Coupon $coupon)
    {
        return view('dashboard.settings', [
            'user'=>$user,
            'coupon'=>$coupon
        ]);
    }

    public function changeBank(Request $request)
    {

        $this->validate($request, [
           'password'=> 'required',
           'bank'=> 'required|string',
           'account_name'=>'required|string',
           'account_number'=>'required|string|min:9|max:11'
        ]);

        $hashedPassword = User::find(auth()->user()->id)->password;
        if (Hash::check($request['password'], $hashedPassword)) {
            User::where('id', auth()->user()->id)->update([
                'bank' => $request['bank'],
                'account_name' => $request['account_name'],
                'account_number' => $request['account_number']
            ]);
            return back()->with('bank', 'Successfully changed your bank details');
        }

        return back()->with('password','Incorrect password');
    }

    public function changePassword(Request $request)
    {

        $this->validate($request, [
            'old_password'=> 'required',
            'password'=> 'required|min:8|confirmed',
        ]);
        $hashedPassword = User::find(auth()->user()->id)->password;
        if (Hash::check($request['old_password'], $hashedPassword)) {
            User::where('id', auth()->user()->id)->update(['password'=> Hash::make($request['password'])]);
            return back()->with('pass', 'Successfully changed your password');
        }

        return back()->with('pass_error','Incorrect password');
    }
}
