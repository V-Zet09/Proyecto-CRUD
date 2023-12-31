<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Staff;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        $roles = Role::all();
        $staff = Staff::all();

        return view('auth.register', compact('roles', 'staff'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'lastname' => ['required', 'string', 'max:255'],
            'role_id' => ['required', 'string', 'max:255'],
            'staff_id' => ['required', 'string', 'max:255'],
        ],
        [
            'name.required' => 'El campo Nombre es obligatorio.',
            'email.required' => 'El campo Correo Electrónico es obligatorio.',
            'email.email' => 'El campo Correo Electrónico debe ser una dirección de correo válida.',
            'email.unique' => 'Este correo ya ha sido registrado.',
            'password.required' => 'El campo Contraseña es obligatorio.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'lastname.required' => 'El campo Apellido es obligatorio.',
            'role_id.required' => 'Por favor, seleccione un Rol.',
            'staff_id.required' => 'Por favor, seleccione un Staff.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'role_id' => $request->role_id,
            'staff_id' => $request->staff_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
