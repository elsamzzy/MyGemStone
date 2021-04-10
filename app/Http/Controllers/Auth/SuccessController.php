<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('suc');
    }

    public function index(Request $request)
    {
        $request->session()->forget([
            'user',
            'success'
        ]);

        return view('auth.success');
    }
}
