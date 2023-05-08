<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;


class RegisteredUserController extends Controller
{
    public function index()
    {
        return view('Auth.index');
    }
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $destinationPath = public_path('assets/users');
            $avatar->move($destinationPath, $filename);
            $user->avatar = $filename;
        }

        $user->save();

        Auth::login($user);

        if (Auth::check() && Auth::user()->admin == 1) {
            return view('Admin.dashboard');
        } else {
            // return redirect()->intended(RouteServiceProvider::HOME);
            return redirect()->route('agendamentos.index');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('auth.update', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::find($id);
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $destinationPath = public_path('assets/users');
            $avatar->move($destinationPath, $filename);
            $user->avatar = $filename;
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->update();

        return redirect()->route('usuario.index', $user)->with('success', 'Usuário atualizado com sucesso!');
    }
}
