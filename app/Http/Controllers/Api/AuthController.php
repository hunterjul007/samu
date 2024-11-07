<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use TwoCaptcha\TwoCaptcha;


class AuthController extends Controller
{
    // Register User (Gamer)
    

    // public function index(){
    //     $solver = new TwoCaptcha('26b0b768ac19464bada9b734ee6fbb02');
    //     try {
    //         $result = $solver->recaptcha([
    //             'sitekey' => '6LfB5_IbAAAAAMCtsjEHEHKqcB9iQocwwxTiihJu',
    //             'url'     => 'https://2captcha.com/demo/recaptcha-v3',
    //             'version' => 'v3',
    //             'action'  => 'test',
    //         ]);
    //     } catch (\Exception $e) {
    //         die($e->getMessage());
    //     }
    //     // var_dump($result);
    //     die('Captcha solved: <script> window.verifyRecaptcha(' .  $result->code . ')   </script>');
    
    // }
    public function register(Request $request)
    {

        $request->validate([
            'pseudo' => 'bail|required',
            'email' => 'bail|required|email|unique:users',
            'password' => 'bail|required|min:6',
        ]);

        $data = $request->all();
        $data['password'] =  Hash::make($request->password);
        $data['image'] = "defaultuser.png";
        $data['pseudo'] = $request->pseudo;
        $data['email'] = $request->email;
       
        // $data['language'] = Setting::first()->language;
        $user = User::create($data);
        $user['token'] = $user->createToken('urgenceSAMU')->accessToken;

        return redirect('inscription-complet');
        // return response()->json(, 200);
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|email',
            'password' => 'bail|required',
        ]);
        $data = array('email' => $request->email, 'password' => $request->password);
        if (Auth::guard('appuser')->attempt($data)) {
            $user = Auth::guard('appuser')->user();
          
            User::find(Auth::guard('appuser')->user()->id)->update(['online' => true]);
            $user['token'] = $user->createToken('urgenceSAMU')->accessToken;
            return redirect('/dashboard');
        } else {
            return response()->json(['response' => "Mot de passe ou E-mail incorrect"], 200);
        }
    }
    function solveRecaptchaV2($apiKey, $siteKey, $url) {
        $requestUrl = "http://2captcha.com/in.php?key={$apiKey}&method=userrecaptcha&googlekey={$siteKey}&pageurl={$url}&json=1";

        $response = file_get_contents($requestUrl);
        $result = json_decode($response, true);

        if ($result['status'] != 1) {
                return response()->json(['response' => "Error when sending captcha: " . $result['request']], 200);
            // throw new Exception();
        }

        $captchaId = $result['request'];

        while (true) {
            sleep(5);
            $resultUrl = "http://2captcha.com/res.php?key={$apiKey}&action=get&id={$captchaId}&json=1";
            $response = file_get_contents($resultUrl);
            $result = json_decode($response, true);

            if ($result['status'] == 1) {
                return $result['request'];
            } elseif ($result['request'] == 'CAPCHA_NOT_READY') {
                continue;
            } else {
                return response()->json(['response' => "Error while solving captcha: " . $result['request']], 200);
            }
        }
    }

    function solveRecaptchaV3($apiKey, $siteKey, $url, $action = 'verify', $minScore = 0.3) {
        $requestUrl = "http://2captcha.com/in.php?key={$apiKey}&method=userrecaptcha&googlekey={$siteKey}&pageurl={$url}&version=v3&action={$action}&min_score={$minScore}&json=1";

        $response = file_get_contents($requestUrl);
        $result = json_decode($response, true);

        if ($result['status'] != 1) {
            return response()->json(['response' => "Error when sending captcha: " . $result['request']], 200);
            // throw new Except();
        }

        $captchaId = $result['request'];

        while (true) {
            sleep(5);
            $resultUrl = "http://2captcha.com/res.php?key={$apiKey}&action=get&id={$captchaId}&json=1";
            $response = file_get_contents($resultUrl);
            $result = json_decode($response, true);

            if ($result['status'] == 1) {
                return $result['request'];
            } elseif ($result['request'] == 'CAPCHA_NOT_READY') {
                continue;
            } else {
                // throw new Exception();
            return response()->json(['response' => "Error while solving captcha: " . $result['request']], 200);

            }
        }
    }

    public function userLogout()
    {
        //  return response()->json(['message' => 'Mot de passe ou E-mail incorrect'], 200);
        if (Auth::guard('appuser')->check()) {
            User::find(Auth::guard('appuser')->user()->id)->update(['online' => false]);
            Auth::guard('appuser')->logout();
            return redirect('/connexion');
        }
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|email',
            'password' => 'bail|required',
        ]);

        $data = array('email' => $request->email, 'password' => $request->password);
        if (Auth::guard('appadmin')->attempt($data)) {
            $admin = Auth::guard('appadmin')->user();
            // return response()->json(['message' => ], 200);
            $admin['token'] = $admin->createToken('urgenceSAMU')->accessToken;
            return redirect('admin/dashboard/');
        } else {
            return view('admin.auth.login', ['message' => 'Mot de passe ou E-mail incorrect']);
        }
    }

    public function logoutAdmin()
    {
        //  return response()->json(['message' => 'Mot de passe ou E-mail incorrect'], 200);
        if (Auth::guard('appadmin')->check()) {
            Auth::guard('appadmin')->logout();
            return redirect('/admin/connexion');
        } else {
            return redirect('/admin/dashboard');
        }
    }
}
