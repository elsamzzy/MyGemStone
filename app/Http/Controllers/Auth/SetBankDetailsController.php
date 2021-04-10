<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SetBankDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('bank');
    }

    public function index()
    {
        return view('auth.bankdetails');
    }

    public function store(Request $request)
    {
        $user = session('user');
        foreach ($user as $users){
            $username=$users;
        }

        $this->validate($request, [
            'bank' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'min:10', 'max:11']
        ]);


        User::where('username', $username)->update([
            'bank' => $request['bank'],
            'account_name' => $request['name'],
            'account_number' => $request['number']
        ]);

        $request->session()->forget('bank');

        session(['coupon' => 'yes']);

        return redirect()->route('coupon');
    }
}
