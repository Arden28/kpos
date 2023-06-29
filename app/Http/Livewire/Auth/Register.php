<?php

namespace App\Http\Livewire\Auth;

use App\Models\Company;
use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Modules\Setting\Entities\Setting;
use Ramsey\Uuid\Uuid;

class Register extends Component
{
    public $currentStep = 1;

    public $name, $email, $phone, $password, $password_confirmation, $is_active = true, $company_name, $company_reference, $company_size, $type, $primary_interest;

    public $successMsg = '';


    /**
     * First step is to create the user account
     */
    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'min:8', 'unique:'.User::class],
        ]);

        $this->currentStep = 2;
    }

    /**
     * The second step is to create the user's company
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'company_name' => ['required', 'string',  'max:50'],
            'company_reference' => ['string',  'max:10'],
            'type' => ['required', 'string'],
            'company_size' => ['required', 'string'],
            'primary_interest' => ['required', 'string'],
        ]);

        $this->currentStep = 3;
    }

    /**
     * The third step is to secure the account using the password and others
     */
    public function thirdStepSubmit()
    {
        $validatedData = $this->validate([
            'password' => ['required', 'confirmed', Password::defaults()
                                                    ->letters()
                                                    ->numbers()],
        ]);

        $this->currentStep = 4;
    }

    /**
     * Then we will submit the form
     */
    public function submitForm($decision)
    {

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'is_active' => 1
        ]);


        $superAdmin = 'Super Admin';

        $user->assignRole($superAdmin);

        // Execute team creation
        $this->createTeam($user);

        // Excecute this function

        $company = Company::create([
            'name' => $this->company_name,
            'user_id' => $user->id,
            'personal_company' => true
        ]);
        $company->save();

        $this->addCompany($company, $user);

        // $this->install($user);

        event(new Registered($user));

        $this->successMsg = 'Votre compte a été créé avec succès';

        $this->clearForm();

        $this->currentStep = 1;
        if($decision == 1){

            Auth::login($user);
            redirect()->route('register.pro')->with('success', 'Choisissez le forfait qui vous convient');

        }elseif($decision == 0){

            redirect()->route('login')->with('success', 'Votre compte a été créé avec succès');

        }
    }

    /**
     * Write code on Method
     */
    public function back($step)
    {
        $this->currentStep = $step;
    }

    // Create a new company after user's registration
    public function addCompany($company, User $user){


        $company->reference = $this->company_reference;
        $company->domain = $this->type;
        $company->size = $this->company_size;
        $company->primary_interest = $this->primary_interest;
        $company->save();

        // Setup settings
        $this->settingSetup($company);

        // Excecute this function
        $this->updateUser($user, $company->id);

        // $this->sendMail($user, $company);
    }

    // Create user team account
    public function createTeam($user){

        $code = Uuid::uuid4();

        $team = Team::create([
            'uuid' => $code,
            'user_id' => $user->id,
        ]);
        // $team->save();

        $user->team_id = $team->id;
        $user->save();

    }

    // Change current company id
    public function updateUser(User $user, $company){

        $user->current_company_id = $company;
        $user->save();

    }


    public function settingSetup(Company $company){

        $setting = Setting::create([
            'company_id'   => $company->id,
            'reference'     => $this->company_reference,
            'notification_email' => 'notification@koverae.com',
            'default_currency_id' => 1,
            'default_currency_position' => 'suffix',
            'company_address' => 'Brazzaville'
        ]);
        $setting->save();

    }

    /**
     * Write code on Method
     */
    public function clearForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->password = '';
        $this->company_name = '';
        $this->company_reference = '';
        $this->company_size = '';
        $this->type = '';
        $this->primary_interest = '';
    }

}
