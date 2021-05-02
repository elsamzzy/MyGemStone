<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return
     */
    public function store(Request $request)
    {
        if(Auth::guard()->attempt($this->credentials($request))){
            $user = User::where('username', $request['username'])->first();
            $enId = Crypt::encryptString($user->id);
            $enPass = Crypt::encryptString($request['password']);
            $use = array();
            array_push($use, $enId);
            array_push($use, $enPass);
            return $use;
        }

        return 'false';
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only('username', 'password');
    }

    /**
     * Display the specified resource.
     *
     * @param   $id
     *
     */
    public function show($id)
    {
        $encrypt = explode(',', $id);

        $enId = Crypt::decryptString($encrypt[0]);
        $enPass = Crypt::decryptString($encrypt[1]);

        // $use = json_decode($enId, true);
        if ($user = User::where('id', $enId)->first()) {
            $cred = array('username'=>$user->username, 'password'=>$enPass);
            //array_push($cred, 'username', $user->username);
            //array_push($cred, $enPass);
            if (Auth::guard()->attempt($cred)) {
                return 'true';
            }
            return 'false';
        }
        return 'false';
    }

    /**
     * @param $use
     * @return array
     */
    public function getInfo($use, User $us) {
        $encrypt = explode(',', $use);

        $enId = Crypt::decryptString($encrypt[0]);
        $enPass = Crypt::decryptString($encrypt[1]);

        // $use = json_decode($enId, true);
        if ($user = User::where('id', $enId)->first()) {
            $cred = array('username'=>$user->username, 'password'=>$enPass);
            if (Auth::guard()->attempt($cred)) {
                $use = $user->toArray();
                return $use;
            }
            return [];
        }
        return [];
    }

    public function getRef($use, User $us) {
        $encrypt = explode(',', $use);

        $enId = Crypt::decryptString($encrypt[0]);
        $enPass = Crypt::decryptString($encrypt[1]);

        // $use = json_decode($enId, true);
        if ($user = User::where('id', $enId)->first()) {
            $cred = array('username'=>$user->username, 'password'=>$enPass);
            if (Auth::guard()->attempt($cred)) {
                $referrals = array();
                if ($ref=$us->get()->where('user_id', $enId)) {
                    $x=0;
                    foreach($ref as $value) {
                        if($sub_referral = $us->get()->where('user_id', $value->id)) {
                            $y = 0;
                            foreach($sub_referral as $key) {
                                if($sub_sub_referral = $us->get()->where('user_id', $key->id)) {
                                    foreach($sub_sub_referral as $sub_key) {
                                        $referrals[$value->username][$key->username] = [$sub_key->username];
                                    }
                                }
                                if(empty($referrals[$value->username][$key->username])) {
                                    $referrals[$value->username][$key->username] = [];      
                                }
                                $y++;
                            }
                        }
                        if (empty($referrals[$value->username])) {
                            $referrals[$value->username] = [];
                        }
                        $x++;
                    }
                };
                return $referrals;
            }
            return [];
        }
        return [];
    }


    public function getCouponAmount($id) {
        $encrypt = explode(',', $id);

        $enId = Crypt::decryptString($encrypt[0]);
        $enPass = Crypt::decryptString($encrypt[1]);

        // $use = json_decode($enId, true);
        if ($user = User::where('id', $enId)->first()) {
            $cred = array('username'=>$user->username, 'password'=>$enPass);
            if (Auth::guard()->attempt($cred)) {
                $coupon = coupon::where('id', $user['coupon_id'])->first();
                return $coupon['amount'];
            }
            return 0;
        }
        return 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeBank(Request $request, $info) {
        $encrypt = explode(',', $info);

        $enId = Crypt::decryptString($encrypt[0]);
        $enPass = Crypt::decryptString($encrypt[1]);

        // $use = json_decode($enId, true);
        if ($user = User::where('id', $enId)->first()) {
            $cred = array('username'=>$user->username, 'password'=>$enPass);
            if (Auth::guard()->attempt($cred)) {
                if ($request['bank_password'] === $enPass) {
                    if(User::where('id', $enId)->update(['bank' => $request['bank_name'], 'account_number' => $request['bank_account_number'], 'account_name' => $request['bank_account_name']])) {
                        return true;
                    }
                    return false;
                }
                return false;
            }
            return false;
        }
        return false;
    }

    public function changePassword(Request $request, $info) {
        $encrypt = explode(',', $info);

        $enId = Crypt::decryptString($encrypt[0]);
        $enPass = Crypt::decryptString($encrypt[1]);

        // $use = json_decode($enId, true);
        if ($user = User::where('id', $enId)->first()) {
            $cred = array('username'=>$user->username, 'password'=>$enPass);
            if (Auth::guard()->attempt($cred)) {
                if($request['old_password'] === $enPass) {
                    if(strlen($request['password']) > 6) {
                        if ($request['password'] === $request['password_confirmation']) {
                            if(User::where('id', $enId)->update(['password' => Hash::make($request['password'])])) {
                                return true;
                            }
                            return false;
                        }
                        return 2;
                    }
                    return 2;
                }
                return 1;
            }
            return false;
        }
        return false;
    }
}
