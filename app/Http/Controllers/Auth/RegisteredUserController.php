<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\Auth\OtpInterface;
use App\Models\Common\Company;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\Auth\OtpRepository;
use Bpuig\Subby\Models\Plan;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{

    protected $otpRepository;

    public function __construct(OtpInterface $otpRepository)
    {
        $this->otpRepository = $otpRepository;
    }
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:9', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::default()
                                                    ->letters()
                                                    ->mixedCase()
                                                    ->numbers()
                                                    ->symbols()
                                                    ->uncompromised()],
            'company_name' => ['required', 'string', 'max:100', 'unique:settings'],
            // 'domain' => ['required', 'string', 'max:100'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_active' => 1,
        ]);

        // Assign the owner role to the user
        $role = 'Super Admin';
        $user->assignRole($role);

        // $this->otpRepository->sendWelcomeOtp($user->phone);
        // The event
        event(new Registered($user, $request));

        // Inscrit l'utilisateur à la formule orrespondante
        // $this->subscribe($user);

        // // Récupérer l'utilisateur fraîchement créé
        $user = $this->connected($user->id);

        // Auth::login($user);

        return redirect()->route('login');
    }
    public function connected($id)
    {
        $user = User::findOrFail($id);
        $company = $user->companies()->latest()->first();
        $user->current_company_id = $company->id;
        $user->save();

        return $user;
    }

    public function subscribe($user){
        // Subscribe to Koverae Prime
        $plan = Plan::find(2);

        $user->newSubscription(
            'main', // identifier tag of the subscription. If your application offers a single subscription, you might call this 'main' or 'primary'
            $plan, // Plan or PlanCombination instance your subscriber is subscribing to
            'Koverae Prime', // Human-readable name for your subscription
            'For small and medium enterprises', // Description
            null, // Start date for the subscription, defaults to now()
            'free' // Payment method service defined in config
        );
    }


}
