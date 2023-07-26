<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendWelcomeMailJob;
use App\Mail\NewUser;
use App\Models\Company;
use App\Models\User;
use App\Mail\NewKover;
use App\Models\CompanyInvitation;
use App\Models\InstalledModule;
use App\Models\Module;
use App\Models\Team;
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
use Ramsey\Uuid\Uuid;

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
    public function createGuest(Request $request)
    {
        $invitation_token = $request->input('invitation_token');

        if (!$invitation_token || !$invitation = CompanyInvitation::where('token', $invitation_token)->first()) {
            abort(404);
        }

        return view('auth.company.guest-register', [
            'email' => $invitation->email,
            'invitation_token' => $invitation_token
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeGuest(Request $request): RedirectResponse
    {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'phone' => ['required', 'string', 'max:20', 'unique:users,phone'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'invitation_token' => ['required', 'string']
            ]);

            $invitation = CompanyInvitation::where('token', $request->input('invitation_token'))->first();

            if (!$invitation) {
                abort(404);
            }

            $user = User::create([
                'team_id' => $invitation->team_id,
                'current_company_id' => $invitation->company_id,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => Hash::make($request->input('password')),
                'is_active' => true,
            ]);

            $user->assignRole($invitation->role);

            $invitation->delete();

            // Auth::login($user);

            return redirect()->route('login')->with('success', 'Votre compte a bien été créé.');
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
                                                    ->numbers()],
            'company_name' => ['required', 'string',  'max:50'],
            'company_reference' => ['string',  'max:10'],
            'type' => ['required', 'string'],
            'company_size' => ['required', 'string'],
            'primary_interest' => ['required', 'string'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_active' => 1
        ]);


        $superAdmin = 'Super Admin';

        $user->assignRole($superAdmin);

        // Execute team creation
        $this->createTeam($user);

        // Excecute this function

        $company = Company::create([
            'name' => $request->company_name,
            'user_id' => $user->id,
            'personal_company' => true
        ]);
        $company->save();

        $this->addCompany($request, $company, $user);

        // $this->install($user);

        event(new Registered($user));

        // Auth::login($user);

        toast("Votre compte a été créé! Veuillez vous connecter", 'success');

        return redirect()->route('login');
    }

    // Create a new company after user's registration
    public function addCompany($request, $company, User $user){


        $company->reference = $request->company_reference;
        $company->domain = $request->type;
        $company->size = $request->company_size;
        $company->primary_interest = $request->primary_interest;
        $company->save();

        // Setup settings
        $this->settingSetup($company);

        // Excecute this function
        $this->updateUser($user, $company->id);

        $this->sendMail($request, $user, $company);
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
            'reference'     => 'ETS',
            'notification_email' => 'notification@koverae.com',
            'default_currency_id' => 1,
            'default_currency_position' => 'suffix',
            'company_address' => 'Brazzaville'
        ]);
        $setting->save();

    }


    public function install($user){

        $module = Module::where('slug', 'finance')->first();

        $team = Team::where('id', $user->team->id)->where('uuid', $user->team->uuid)->first();

        // Check if the module is already installed
        if ($module->isInstalledBy($team)) {

            toast("L'application {$module->name} est déjà installée.", 'info');

            return redirect()->back();
        }

        // Check if a similar InstalledModule exists
        $existingInstalledModule = InstalledModule::where('team_id', Auth::user()->team->id)
            ->where('module_slug', $module->slug)
            ->first();

        if ($existingInstalledModule) {
            // An existing installed module with similar values already exists
            toast("Cette application est déjà installée pour votre entreprise.", 'info');
            return redirect()->back();
        }

        // Install the module
        $installedModule = new InstalledModule([
            'team_id' => Auth::user()->team->id,
            'module_slug' => $module->slug,
        ]);
        $installedModule->save();

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
