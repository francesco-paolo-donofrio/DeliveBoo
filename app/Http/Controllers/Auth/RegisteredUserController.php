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
use App\Models\Type;


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
        $types = Type::all();
        return view('auth.register', compact('types'));
    }
    public function store(Request $request): RedirectResponse
    {
        //dd($request);
        // Validazione dei dati, inclusa l'immagine
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'restaurant_name' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'vat' => ['required', 'string', 'max:20'],
                'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'], // Validazione dell'immagine
                'types'=>   ['required']
            ], [
                'name.required' => 'Il campo nome è obbligatorio.',
                'name.string' => 'Il campo nome deve essere una stringa.',
                'name.max' => 'Il campo nome non può superare :max caratteri.',
                'email.required' => 'Il campo email è obbligatorio.',
                'email.string' => 'Il campo email deve essere una stringa.',
                'email.lowercase' => 'L\'email deve essere in minuscolo.',
                'email.email' => 'L\'indirizzo email non è valido.',
                'email.max' => 'L\'email non può superare :max caratteri.',
                'email.unique' => 'Questo indirizzo email è già stato utilizzato.',
                'password.required' => 'Il campo password è obbligatorio.',
                'password.confirmed' => 'La conferma della password non corrisponde.',
                'restaurant_name.required' => 'Il campo nome del ristorante è obbligatorio.',
                'restaurant_name.string' => 'Il campo nome del ristorante deve essere una stringa.',
                'restaurant_name.max' => 'Il campo nome del ristorante non può superare :max caratteri.',
                'address.required' => 'Il campo indirizzo è obbligatorio.',
                'address.string' => 'Il campo indirizzo deve essere una stringa.',
                'address.max' => 'L\'indirizzo non può superare :max caratteri.',
                'description.required' => 'Il campo descrizione è obbligatorio.',
                'description.string' => 'Il campo descrizione deve essere una stringa.',
                'vat.required' => 'Il campo partita IVA è obbligatorio.',
                'vat.string' => 'Il campo partita IVA deve essere una stringa.',
                'vat.max' => 'La partita IVA non può superare :max caratteri.',
                'image.image' => 'Il file deve essere un\'immagine.',
                'image.mimes' => 'Il file deve essere di uno dei seguenti tipi: jpeg, png, jpg, gif, webp.',
                'image.max' => 'Il file non può superare :max kilobytes.',
                'types.required'=>'Inserire almeno una tipologia'
            ]);
    
    
            // Creazione dell'utente
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            // Caricamento dell'immagine se presente
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $this->uploadFile($request->file('image'), 'restaurant_images');
            } else {
                $imagePath = 'restaurant_images/placeholder.png';
            }
            ;
    
            // Creazione del ristorante
            $restaurant = Restaurant::create([
                'name' => $request->restaurant_name,
                'address' => $request->address,
                'description' => $request->description,
                'vat' => $request->vat,
                'user_id' => $user->id,
                'image' => $imagePath,
            ]);
            if ($request->has('types')) {
                $restaurant->types()->attach($request->types);
            };
    
    
            // Evento Registered e login dell'utente
            event(new Registered($user));
            Auth::login($user);
    
            // Redirect alla home
            return redirect(RouteServiceProvider::HOME);
        } catch (\Exception $e) {
            Log::error('Errore durante la registrazione: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Si è verificato un errore durante la registrazione. Riprova più tardi.']);
        }
        
    }


}
