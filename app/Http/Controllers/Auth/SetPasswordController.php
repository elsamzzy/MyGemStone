<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SetPasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('pass');
    }

    public function index()
    {
        return view('auth.password');
    }

    public function store(Request $request)
    {
        $user = session('user');

        foreach ($user as $users){
            $username=$users;
        }

        $this->validate($request, [
            'password' => ['required' ,'min:8', 'confirmed']
        ]);

        User::where('username', $username)->update(['password'=> Hash::make($request['password'])]);

        $request->session()->forget('password');

        session(['bank' => 'yes']);

        return redirect()->route('bank');
    }
}
