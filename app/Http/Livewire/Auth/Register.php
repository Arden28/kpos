<?php

namespace App\Http\Livewire\Auth;

use App\Mail\User\NewKover;
use App\Models\Common\Company;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Modules\Setting\Entities\Setting;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Ramsey\Uuid\Uuid;

class Register extends Component
{

    public $name;
    public $email;

    public $phone;
    public $company_name;

    public $type;
    public $company_size;
    public $primary_interest;

    public $password;
    public $password_confirmation;

    public $acceptPolicies=false;

    // public $user;
    protected $rules = [
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|min:9|unique:users,phone',
        'company_name' => 'required|string|max:255|unique:settings',
        'type' => 'required|string|max:255',
        'company_size' => 'required|string|max:255',
        'primary_interest' => 'required|string|max:255',
        'password' => 'required|min:8|confirmed',
    ];

    public function mount(){
        //
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register(){

        $this->validate();

        $this->createUser();

        redirect()->route('login');
    }

    public function createUser(){

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'is_active' => 1,
        ]);

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
    {
        $user = User::findOrFail($id);
        $company = $user->companies()->latest()->first();
        $user->current_company_id = $company->id;
        $user->save();

        return $user;
    }

    public function sendWelcomeEmail($user, $company){
        Mail::to($user->email)->send(new NewKover($user, $company));
    }

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
