<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Bridge\AccessToken;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    ////////Creer un utilisateur
    public function register(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'name' => 'required | string |max:255',
            'email' => 'required | string |email |max:255 | unique:users',
            'password' => 'required | string |min:8 | confirmation',

        ]);
        if ($validateData->failed()) {
            return response()->json(['error' => $validateData->errors()], 400);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  bcrypt($request->password),
        ]);
        $tokenResult = $user->createToken('authapi');
        $token = $tokenResult->accessToken;
        return response()->json(['token' => $token, 'message' => 'User created']);
    }
    ////////connection
    public function login(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            $user = Auth::user();
            $token = $user->createToken('authapi')->accessToken;
            return response()->json(['token' => $token, 'message' => 'Connection reussir']);
        } else {
            return response()->json(['message' => 'Connection echouer'], 401);
        }
    }
    ////////l'ensemble des utilistaeurs
    public function user()
    {
        $user = User::all();
        return response()->json($user, 200);
    }
    ////////deconnection

    public function deconnection(Request $request)
    {
        $user = $request->user();
        if ($user) {
            $user->tokens()->delete();
            return response()->json(['message' => 'Deconnection reussir']);
        }
    }
    /////mot de passe oublier


    public function mot_de_passe_oublier(Request $request)
    {
        try {
            Log::info('Request received for password reset', ['email' => $request->email]);
            $request->validate([
                'email' => 'request|email',
            ]);
            Log::info('Email validation passed', ['email' => $request->email]);
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                Log::warning('Email validation failed', ['email' => $request->email]);
                return response()->json([
                    'message' => 'Email invalide',
                ],400);
            }
            Log::info('User found', ['email' => $user->email]);
            $token = Str::random(60);
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $user->email],
                ['token'=>$token, 'created_at' => now()],
            );
            Log::info('Password reset token generated and savedt', ['email' => $user->email , 'token'=>$token]);
            Mail::to($user->email)->send(new ResetPassword($token));
            Log::info('Password reset email sent successfully', ['email' => $user->email]);
            return response()->json([
                'message' => 'Password reset email sent successfully',
            ],200);

        } catch (\Throwable $th) {
           Log::error('An error occurred during password reset',['error'=> $e ->getMessage()]);
           return response()-> json(['error'=> $e->getMessage()],500);
        }
    }
}
