<?php

namespace App\Http\Controllers;

use App\Events\Login;
use App\Events\LoginAttempt;
use App\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public $userRequest;

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->userRequest = $request;
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $this->logAudit($request->email, "Login");

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            Login::dispatch(Auth::user());

            return redirect()->intended('/');
        } else {
            LoginAttempt::dispatch($request->email, $request->ip(), $request->header('user-agent'));
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }

    public function logAudit($email, $type)
    {
        DB::table('audit')->insert([
            'audit' => "User " . $type . " email: " . $email,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function logout(Request $request)
    {
        $this->logAudit(Auth::user()->email, "Logout");

        Logout::dispatch(Auth::user());
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $this->logAudit($request->email, "Forgot Password");

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $this->logAudit($request->email, "Reset Password");

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
