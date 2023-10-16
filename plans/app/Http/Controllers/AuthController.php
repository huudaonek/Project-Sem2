<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
     public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
{
    $request->validate([
        'FullName' => 'required|max:100',
        'UserName' => 'required|unique:users,UserName|max:100',
        'Phone' => 'required|unique:users,Phone',
        'Email' => 'required|email|unique:users,Email|max:100',
        'Password' => 'required|min:6|max:100',
    ]);

    $validatedData = [
        'FullName' => $request->input('FullName'),
        'UserName' => $request->input('UserName'),
        'Phone' => $request->input('Phone'),
        'Address' => $request->input('Address'),
        'Email' => $request->input('Email'),
    ];

    if (strlen($request->input('Password')) >= 6 && strlen($request->input('Password')) <= 100) {
        $validatedData['Password'] = bcrypt($request->input('Password'));
    }

    $user = User::create(array_merge($validatedData, ['role' => 'user']));

    Auth::login($user);

    SendEmail::dispatch($user);

    return redirect()->route('login.form')->with('notification', 'Account created successfully. You can now log in.');
}


    public function showLoginForm()
    {
        return view('login');
    }

public function login(Request $request)
{
    $user = User::where('Email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->Password)) {
        $error = 'Invalid email or password.';
        return view('login', compact('error'));
    }

    Auth::login($user);
    return redirect()->route('home');
}
public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
}
public function home()
{
    $products = Product::all();

    return view('User.homeUser', ['products' => $products]);
}

public function product()
{
    $products = Product::all();

    return view('User.product', ['products' => $products]);
}

}
