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

use App\Models\Restaurant;

use App\Traits\HandlesFileUpload;

class RegisteredUserController extends Controller
{
    // richiamo il Trait che userò in store 
    use HandlesFileUpload;
    
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $restaurant = Restaurant::create([
            'name' => $request->restaurant_name, 
            'address' => $request->address,
            'description'=> $request->description,
            'vat'=> $request->vat,  
            'user_id' => $user->id,
            // 'image' => $this->uploadFile($request->file('image'), 'restaurant_images')
            'image' => $request->image
        ]);
        // if ($request->hasFile('image')) {
        //     //gestisco qui la rinomina del file in caso di file con stesso nome, tramite trait 
        //     $restaurant['image'] = $this->uploadFile($request->file('image'), 'restaurant_images');
        // }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
