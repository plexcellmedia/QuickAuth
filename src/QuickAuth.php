<?php

namespace Plexcellmedia\QuickAuth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Sentinel;
use Reminder;
use Activation;

use Illuminate\Support\Facades\Mail;
use Plexcellmedia\QuickAuth\Mail\ActivateAccount;
use Plexcellmedia\QuickAuth\Mail\ForgotPassword;
use Plexcellmedia\QuickAuth\Mail\NewPassword;

class QuickAuth
{
    /**
     * Show login view
     *
     * @param  array $vars
     * @return \Illuminate\Http\Response
     */
    public static function showLogin($vars = [])
    {
        return view('vendor.quickauth.login', $vars);
    }

    /**
     * User login
     *
     * @param  Illuminate\Http\Request $request
     * @param  boolean $json
     * @return \Illuminate\Http\Response
     *
     * @throws \Cartalyst\Sentinel\Checkpoints\ThrottlingException
     * @throws \Cartalyst\Sentinel\Checkpoints\NotActivatedException
     */
    public static function doLogin(Request $request, $json = false)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required'
        ], [
            'email.required'    => __('quickauth::validator.email.required'),
            'email.email'       => __('quickauth::validator.email.email'),
            'password.required' => __('quickauth::validator.password.required')
        ]);

        if ($validator->fails()) {
            if ($json) {
                return response()->json(['success' => false, 'error' => $validator->errors()]);
            }
            return redirect()->route('quickauth.login.show')->withErrors($validator->errors())->withInput();
        }

        try {
            $credentials = [
                'email'    => $request->input('email'),
                'password' => $request->input('password')
            ];

            if (Sentinel::authenticate($credentials)) {
                if ($json) {
                    return response()->json(['success' => true]);
                }
                return redirect()->route(config('quickauth.login_success_route'))->with('message', __('quickauth::messages.login.success'));
            }
        } catch (\Cartalyst\Sentinel\Checkpoints\ThrottlingException $ex) {
            if ($json) {
                return response()->json([
                    'success' => false,
                    'error'   => __('quickauth::messages.login.error.throttle')
                ]);
            }
            return redirect()->route('quickauth.login.show')->with('error', __('quickauth::messages.login.error.throttle'));
        } catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $ex) {
            if ($json) {
                return response()->json([
                    'success' => false,
                    'error'   => __('quickauth::messages.login.error.activate')
                ]);
            }
            return redirect()->route('quickauth.login.show')->with('error', __('quickauth::messages.login.error.activate'));
        }

        if ($json) {
            return response()->json([
                'success' => false,
                'error'   => __('quickauth::messages.login.error.invalid')
            ]);
        }

        return redirect()->route('quickauth.login.show')->with('error', __('quickauth::messages.login.error.invalid'));
    }

    /**
     * Show register view
     *
     * @param  array $vars
     * @return \Illuminate\Http\Response
     */
    public static function showRegister($vars = [])
    {
        return view('vendor.quickauth.register', $vars);
    }

    /**
     * Register new user
     *
     * @param  Illuminate\Http\Request $request
     * @param  boolean $json
     * @return \Illuminate\Http\Response
     */
    public static function doRegister(Request $request, $json = false)
    {

        $rules = [
            'email'            => 'required|email|max:64|unique:users,email',
            'password'         => 'required|same:password_confirm|max:64',
            'password_confirm' => 'required'
        ];

        $messages = [
            'email.required'            => __('quickauth::validator.email.required'),
            'email.email'               => __('quickauth::validator.email.email'),
            'email.max'                 => __('quickauth::validator.email.max'),
            'email.unique'              => __('quickauth::validator.email.unique'),
            'password.required'         => __('quickauth::validator.password.required'),
            'password.same'             => __('quickauth::validator.password.same'),
            'password_confirm.required' => __('quickauth::validator.password_confirm.required'),
        ];

        if (config('quickauth.username_support')) {
            $rules['username']             = 'required|min:3|max:32|unique:users,username';
            $messages['username.required'] = __('quickauth::validator.username.required');
            $messages['username.min']      = __('quickauth::validator.username.min');
            $messages['username.max']      = __('quickauth::validator.username.max');
            $messages['username.unique']   = __('quickauth::validator.username.unique');
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            if ($json) {
                return response()->json(['success' => false, 'error' => $validator->errors()]);
            }
            return redirect()->route('quickauth.register.show')->withErrors($validator->errors())->withInput();
        }

        $email    = $request->input('email');
        $username = $request->input('username');
        $password = $request->input('password');

        $insert = [
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        if (config('quickauth.username_support')) {
            $insert['username'] = $username;
        }

        $userId = DB::table('users')->insertGetId($insert);

        $user       = Sentinel::findById($userId);
        $activation = Activation::create($user);

        Mail::to($email)->queue(new ActivateAccount($user->id, $activation->code));

        if ($json) {
            return response()->json(['success' => true, 'message' => __('quickauth::messages.register.success')]);
        }
        return redirect()->route('quickauth.login.show')->with('message', __('quickauth::messages.register.success'));
    }

    /**
     * Activate user
     *
     * @param  integer $userId
     * @param  string $code
     * @return \Illuminate\Http\Response
     */
    public static function doActivate($userId, $code)
    {
        $user = Sentinel::findById($userId);
        if (!is_null($user) && Activation::complete($user, $code)) {
            return redirect()->route('quickauth.login.show')->with('message', __('quickauth::messages.activate.success'));
        }
        return redirect()->route('quickauth.login.show')->with('error', __('quickauth::messages.activate.error'));
    }

    /**
     * Show forgot password view
     *
     * @param  array $vars
     * @return \Illuminate\Http\Response
     */
    public static function showForgotPassword($vars = [])
    {
        return view('vendor.quickauth.forgot', $vars);
    }

    /**
     * Send forgot password verify link
     *
     * @param  Illuminate\Http\Request $request
     * @param  boolean $json
     * @return \Illuminate\Http\Response
     */
    public static function doForgotPassword(Request $request, $json = false)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email'
        ], [
            'email.required' => __('quickauth::validator.email.required'),
            'email.email'    => __('quickauth::validator.email.email'),
            'email.exists'   => __('quickauth::validator.email.exists')
        ]);

        if ($validator->fails()) {
            if ($json) {
                return response()->json(['success' => false, 'error' => $validator->errors()]);
            }
            return redirect()->route('quickauth.forgot.show')->withErrors($validator->errors())->withInput();
        }

        $email    = $request->input('email');
        $results  = DB::table('users')->where('email', $email)->first();
        $user     = Sentinel::findById($results->id);
        $reminder = Reminder::create($user);
        $url      = route('quickauth.forgot.verify', [$email, $reminder->code]);

        Mail::to($email)->queue(new ForgotPassword($url));

        if ($json) {
            return response()->json(['success' => true, 'message' => __('quickauth::messages.forgot.success')]);
        }

        return redirect()->route('quickauth.forgot.show')->with('message', __('quickauth::messages.forgot.success'));
    }

    /**
     * Validate forgot password token and reset password
     *
     * @param  string $email
     * @param  string $code
     * @return \Illuminate\Http\Response
     */
    public static function verifyForgotPassword($email, $code)
    {
        $validator = Validator::make([
            'email' => $email,
            'code'  => $code
        ], [
            'email' => 'required|email|exists:users,email',
            'code'  => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('quickauth.forgot.show')->with('error', __('quickauth::messages.reset.error'));
        }

        $results = DB::table('users')->where('email', $email)->first();
        $user    = Sentinel::findById($results->id);

        $password = str_random(8);

        if ($reminder = Reminder::complete($user, $code, $password)) {
            Mail::to($email)->queue(new NewPassword($password));
            return redirect()->route('quickauth.login.show')->with('message', __('quickauth::messages.reset.success'));
        }

        return redirect()->route('quickauth.forgot.show')->with('error', __('quickauth::messages.reset.error'));
    }

    /**
     * Logout user
     *
     * @param  boolean $json
     * @return \Illuminate\Http\Response
     */
    public static function doLogout($json = false)
    {
        Sentinel::logout();

        if ($json) {
            return response()->json(['success' => true, 'message' => __('quickauth::messages.logout.success')]);
        }
        return redirect()->route(config('quickauth.logout_redirect_route'))->with('message', __('quickauth::messages.logout.success'));
    }
}
