<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('cms.auth.sign-in');
    }


    public function doLogin(Request $request)
    {

        // \Log::info('Form token: ' . $request->_token);
        // \Log::info('Session token: ' . session()->token());

        // dd('Form token = '.$request->_token, 'Session token = '.session()->token());

        
//        dd('login fun');
        $credentials = $request->only('email', 'password');

        if (Auth::guard('user')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

//            return response()->json([
//                'success' => true,
//                'message' => 'Successfully logged in',
//            ]);
            return redirect()->route('dashboard');
        }

//        return response()->json([
//            'success' => false,
//            'message' => 'Invalid credentials, please try again.',
//        ], 401);
        return back()->with('error', 'Invalid credentials, please try again.');
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        session()->invalidate();
        return redirect()->route('login');
    }


    public function showResetPasswordForm()
    {
        return view('cms.auth.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'token' => 'required'
        ]);

        $status = \Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->save();
            }
        );

        if ($status == \Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __($status));
        }

        return back()->withErrors(['email' => [__($status)]]);
    }

}
