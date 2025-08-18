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

        $credentials = $request->only('email', 'password');

        if (Auth::guard('user')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'message' => 'Successfully logged in',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials, please try again.',
        ], 401);
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
