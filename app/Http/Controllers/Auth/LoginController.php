<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.signin');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
{
    // 🔹 1. Validasi input
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    // 🔹 2. Ambil input username & password
    $credentials = $request->only('username', 'password');

    // 🔹 3. Cek apakah user centang "remember me"
    $remember = $request->boolean('rememberMe'); // lebih aman daripada has()

    // 🔹 4. Coba autentikasi user
    if (Auth::attempt($credentials, $remember)) {
        // regenerate session ID untuk mencegah session fixation
        $request->session()->regenerate();

        // arahkan ke dashboard atau halaman sebelumnya
        return redirect()->intended('/dashboard');
    }

    // 🔹 5. Kalau gagal login, kirim pesan error & isi ulang username
    return back()->withErrors([
        'message' => 'Username atau password tidak sesuai.',
    ])->withInput($request->only('username'));
}




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/sign-in');
    }
}
