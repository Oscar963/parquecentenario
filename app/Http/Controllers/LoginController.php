<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|',
            'id_tipo_usuarios' => 'required|integer',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->id_tipo_usuarios = $request->id_tipo_usuarios;

        $user->save();

        return redirect()->back()->with('success', 'Usuario registrado exitosamente.');
    }

    public function login(Request $request) {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        $remember = ($request->has('remember') ? true : false);

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if (Auth::user()->id_tipo_usuarios == 1 || Auth::user()->id_tipo_usuarios == 4) {
                return redirect()->intended(route('privada'));
            } else {
                return redirect()->intended(route('welcome'));
            }
        } 
        else 
        {
            return redirect('login')->withErrors(['login' => 'Credenciales incorrectas.']);
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    public function cambiarContrasena(Request $request)
    {
        // Validar los campos
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ], [
            'new_password.confirmed' => 'La confirmación de la nueva contraseña no coincide.',
        ]);

        // Verificar que la contraseña actual sea correcta
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual es incorrecta.']);
        }

        // Cambiar la contraseña
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'La contraseña ha sido actualizada exitosamente.');
    }

}
