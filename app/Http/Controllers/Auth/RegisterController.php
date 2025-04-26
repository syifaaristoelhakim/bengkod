<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    // Tampilkan form register
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Tangani proses register
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'pasien', // otomatis isi role pasien
        ]);

        // Redirect ke halaman login setelah berhasil registrasi
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
