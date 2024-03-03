<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        return view('auth.register');
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'numeric', 'regex:/^[0-9]{10}$/'],// 10 digit numeric phone number
            'image' => ['required', 'mimes:jpeg,jpg,png,gif|max:10000'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $userImagePath = time() . '.' . $request->image->extension();
        $request->image->move(public_path('user_images'), $userImagePath);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $userImagePath,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));
        // Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
