<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\coupon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Cookie;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {

        $user = User::where('username', $request['refid'])->first();

        User::create([
            'user_id' => $user->id,
            'username' => $request['username'],
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['mob'],
            'password' => '',
            'bank' => '',
            'account_name' => '',
            'account_number' => '',
            'coupon_id' => '0',
            'balance' => '0',
            'request_withdraw' => '0',
            'withdraw' => '0',
        ]);

        $newUser = User::where('username', $request['username'])->first();

        // $id = $newUser->id;

        $enId = Crypt::encryptString($newUser);

        $user = array();
        array_push($user, $enId);

        return $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $id
     * @return boolean
     */
    public function password(Request $request, $id) {
        $enId = Crypt::decryptString($id);

        $use = json_decode($enId, true);

        if (is_array($use)) {
            User::where('id', $use['id'])->update([
                'password' => Hash::make($request['password']),
            ]);
            return true;
        }
        return false;

    }


    /**
     * Display the specified resource.
     *
     * @param  string  $detail
     * @return string
     */
    public function encryptUser($detail) {
        return Crypt::encryptString($detail);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $email
     * @return number
     */
    public function verifyEmail($email)
    {
        $mail = User::where('email', $email)->first();
        if($mail){
            return 1;
        }
        return 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $phone
     * @return number
     */
    public function verifyPhone($phone)
    {
        $mobile = User::where('phone', $phone)->first();
        if($mobile){
            return 1;
        }
        return 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $username
     * @return number
     */
    public function verifyUsername($username)
    {
        $user = User::where('username', $username)->first();
        if($user){
            return 1;
        }
        return 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  id
     * @param  number coupon
     * @return
     */
    public function verifyCoupon($id, $coupon)
    {
        $enId = Crypt::decryptString($id);

        $use = json_decode($enId, true);

        if (is_array($use)) {
            $coup = coupon::where('code', $coupon)->first();
            if($coup){
                return $coup->amount;
            }
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCoupon(Request $request, $id)
    {
        $enId = Crypt::decryptString($id);

        $use = json_decode($enId, true);

        if(is_array($use)){
            $cou = coupon::where('code', $request['coupon'])->first();
            User::where('id', $use['id'])->update([
                'coupon_id' => $cou->id,
            ]);
            $user = array();
            array_push($user, $id);
            return $user;
        } else {
            return 'fail';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        return User::where('username', $username)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $enId = Crypt::decryptString($id);

        $use = json_decode($enId, true);

        if(is_array($use)){
            // $data = Crypt::decryptString(session()->has('user'));
            User::where('id', $use['id'])->update([
                'bank' => $request['bank'],
                'account_number' => $request['number'],
                'account_name' => $request['name']
            ]);
            $user = array();
            array_push($user, $id);
            return $user;
        } else {
            return 'fail';
        }
    }

    /**.
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
