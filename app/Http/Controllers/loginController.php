<?php

namespace App\Http\Controllers;

use App\Models\MyUsers;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class loginController extends Controller
{
    public function showLoginForm()
    {
        return view('loginView');
    }
    public function authenticate()
    {
        return view('loginView');
    }
    public function requestLogin(Request $request)
    {
        $email = $request->input('email');
        $formCode = $request->input('code');
        if ($email!=null && $formCode!=null){
            if (MyUsers::query()->where('email','=',$email)
                ->where('code','=',$formCode)
                ->count()){
                return view('index', ['news' => News::all()]);
            }
        }
        $code = mt_rand(100000, 999999);
        $message = "Ваш код для входу: $code";
        Mail::raw($message, function ($message) use ($email) {
            $message->to($email)->subject('Код для входу');
        });
        MyUsers::query()->updateOrCreate(
        ['email' => $email],
        ['code' => $code]
        );

        return view('loginView');
    }
}
