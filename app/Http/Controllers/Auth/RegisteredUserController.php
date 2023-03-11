<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\NewUser;
use App\Models\Company;
use App\Models\User;
use App\Mail\NewKover;
use App\Providers\RouteServiceProvider;
use Bpuig\Subby\Models\Plan;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Modules\Setting\Entities\Setting;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function createPro()
    {
        return view('auth.subby.pro-signup');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()
                                                    ->letters()
                                                    ->numbers()
                                                    ->symbols()],
            'company_name' => ['required', 'string',  'max:50'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_active' => 1
        ]);


        $superAdmin = 'Owner';

        $user->assignRole($superAdmin);

        // Excecute this function
        $this->addCompany($request, $user);

        event(new Registered($user));

        // Auth::login($user);

        toast("Votre compte a été créé! Veuillez vous connecter", 'success');

        return redirect()->route('login');
    }

    // Create a new company after user's registration
    public function addCompany($request, User $user){

        $company = Company::create([
            'name' => $request->company_name,
            'user_id' => $user->id,
            'personal_company' => true
        ]);

        // Setup settings
        $this->settingSetup($company);

        // Excecute this function
        $this->updateUser($user, $company->id);

        $this->sendMail($request, $user, $company);
    }

    // Change current company id
    public function updateUser(User $user, $company){

        $user->current_company_id = $company;
        $user->save();

    }

    public function settingSetup(Company $company){

        $setting = Setting::create([
            'company_id'   => $company->id,
            'reference'     => 'ETS',
            'notification_email' => 'notification@koverae.com',
            'default_currency_id' => 1,
            'default_currency_position' => 'suffix',
            'company_address' => 'Brazzaville'
        ]);
        $setting->save();

    }

    // Send welcome email to user
    public function sendMail($request, $user, $company){

        Mail::to($user->email)->send(new NewKover($request, $user, $company));

        // $user->notify(new NewKover($request, $user, $company));
    }

    //
    // public function send($request, $user, $company){

    //     $user->notify(new NotificationsNewKover($user));
    // }
}
