<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Sms;
use App\Models\User;
use App\Utility\PhoneNumberUtility;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    public function login()
    {
        return view('pages/login');
    }

    protected function _registerOrLoginUser($data, $provider)
    {
        DB::transaction(function () use ($data, $provider) {

            $account = Account::where('provider_id', $data->id)->where('provider', $provider)->first();
            if (!$account) {
                $user = new User();
                $user->name = $data->name;
                $user->generateUsername($data->email);
                $user->save();
                $account = $this->createAccount($data, $provider, $user);
            }
            Auth::login($account->user);
        });
    }

    private function createAccount($data, $provider, $user)
    {

        $account = new Account();
        $account->user_id = $user->id;
        $account->provider = $provider;
        $account->provider_id = $data->id;
        $account->username = $data->name; //put name temporary
        $account->avatar = $data->avatar ?? url('frontend/images/avatar1.png');
        $account->email = $data->email;
        $account->last_login = Carbon::now();
        $account->save();
        return $account;

    }

    private function addAccount($data, $provider, $user)
    {
        $account = Account::where('provider_id', $data->id)->where('provider', $provider)->first();
        if (!$account) {
            $this->createAccount($data, $provider, $user);
        } else {
            $account->last_login = Carbon::now();
            $account->avatar = $data->avatar;
            $account->save();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');

    }

    public function redirectToProvider(Request $request, $provider)
    {
        $request->validate(['provider|in:google,facebook']);
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        $request->validate(['provider|in:google,facebook']);
        $providerUserInfo = Socialite::driver($provider)->user();
        if (!Auth::check()) { //logn page
            $this->_registerorLoginUser($providerUserInfo, $provider);
            return redirect($request->session()->pull('url.intended', route('index')));
        } else { // profile page add new account
            $this->addAccount($providerUserInfo, $provider, Auth::user());
            return redirect()->route('account.setting');
        }
    }

    public function loginWithPhoneNumber(Request $request)
    {
        $code = random_int(1000, 9999);
        $sms = new Sms();
        $phone_number = PhoneNumberUtility::convertToE164($request->tel);
        if (is_null($phone_number)) {
            session()->flash(
                'message.error',
                'شماره تلفن اشتباه است .'
            );
            return redirect()->back();
        }
        $sms->sendOTP($phone_number, $code);
        Session::put('gsmTel', $phone_number);
        Session::put('gsmVerificationCode', $code);
        return redirect()->route('verification.page');
    }
    public function verificationPage()
    {
        return view('pages.verification-code');
    }

    public function handleGsmCallback(Request $request)
    {
        $request->validate(['code|integer:digits:4']);
        $code = $request->code1 . $request->code2 . $request->code3 . $request->code4;

        if ($code != Session::get('gsmVerificationCode')) {
            return back()->withErrors('کد وارد شده صحیح نمی باشد');
        }
        $tel = Session::get('gsmTel');
        if (!Auth::check()) {
            $this->_registerorLoginUser((object) [
                'id' => $tel,
                'email' => $tel . '@gsm',
                'username' => $tel . '@gsm',
                'name' => $tel,
            ], 'gsm');
            return redirect($request->session()->pull('url.intended', route('index')));
        }
        //else{} will be implemented later in profile
    }
}
