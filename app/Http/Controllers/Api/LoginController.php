<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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
                $referrals = array();
                if ($ref=$us->get()->where('user_id', $enId)) {
                    $x=0;
                    foreach($ref as $value) {
                        if($sub_referral = $us->get()->where('user_id', $value->id)) {
                            $y = 0;
                            foreach($sub_referral as $key) {
                                $referrals[$value->username][$y] = [$key->username];
                                $y++;
                            }
                        } else {
                            $referrals[$value->username];
                        }

                    }
                };
                array_push($referrals, $user);
                return $referrals;
            }
            return [];
        }
        return [];
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
}
