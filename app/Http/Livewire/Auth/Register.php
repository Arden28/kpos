<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class Register extends Component
{
    public $name;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;
    public $company_name;
    public $loading = false;

    public function mount() {
    }
    // protected $rules = [
    //     'name' => ['required', 'string', 'max:255'],
    //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //     'phone' => ['required', 'string', 'min:9', 'max:255', 'unique:users'],
    //     'password' => ['required', 'confirmed',  Password::default()
    //                                             ->letters()
    //                                             ->mixedCase()
    //                                             ->numbers()
    //                                             ->symbols()
    //                                             ->uncompromised()],
    //     'company_name' => ['required', 'string', 'max:100', 'unique:companies'],
    // ];


    public function store()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:9', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed',  Password::default()
                                                        ->letters()
                                                        ->mixedCase()
                                                        ->numbers()
                                                        ->symbols()
                                                        ->uncompromised()],
            'company_name' => ['required', 'string', 'max:100', 'unique:companies'],
            'domain' => ['required', 'string', 'max:100'],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'is_active' => 1,
        ]);

<<<<<<< HEAD
        $this->loading = true;
        // Assign the owner role to the user
        $role = 'owner';
        $user->assignRole($role);

        // The event
        event(new Registered($user, $this->request));
        Auth::login($user);

        // $this->emit('registered');
        $this->loading = false;
        $this->redirect(route('dashboard'));
    }

    public function render()
=======
        // Assign the owner role to the user
        $role = 'Super Admin';
        $user->assignRole($role);

        // $this->otpRepository->sendWelcomeOtp($user->phone);

        // The event
        $this->createCompany($user);

        // // Récupérer l'utilisateur fraîchement créé
        $user = $this->connected($user->id);

        // Auth::login($user);
    }

    public function createCompany($user){

        $api_key = Uuid::uuid4();

        $company = Company::create([
            'api_key' => $api_key,
            // 'domain' => $this->domain,
            'created_by' => $user->id
        ]);

        $company->save();


        $settings = Setting::create([
            'company_id' => $company->id,
            'company_name' => $this->company_name,
            'default_currency_id' => 1,
            'default_currency_position' => 'suffix',
            'created_by' => $user->id
        ]);
        $settings->save();

        // Send a welcome mail
        $this->sendWelcomeEmail($user, $settings);

    }
    public function connected($id)
>>>>>>> 68148aefd8ad231f9ce4c88aaece1bed137f337e
    {
        $user = User::findOrFail($id);
        $company = $user->companies()->latest()->first();
        $user->current_company_id = $company->id;
        $user->save();

        return $user;
    }

<<<<<<< HEAD
=======
    public function sendWelcomeEmail($user, $company){
        Mail::to($user->email)->send(new NewKover($user, $company));
    }

>>>>>>> 68148aefd8ad231f9ce4c88aaece1bed137f337e
}


// {
//     public $currentStep = 1;
//     public $personalInfo = [];
//     public $professionalInfo = [];
//     public $securityInfo = [];

//     protected $listeners = ['goToStep'];

//     public function goToStep($step)
//     {
//         $this->currentStep = $step;
//     }

//     public function submitForm()
//     {
//         // Handle form submission
//     }

//     public function render()
//     {
//         return view('livewire.auth.register', [
//             'currentStep' => $this->currentStep,
//             'personalInfo' => $this->personalInfo,
//             'professionalInfo' => $this->professionalInfo,
//             'securityInfo' => $this->securityInfo,
//         ]);
//     }

// }
