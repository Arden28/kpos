<?php

namespace App\Http\Livewire\Company;

use App\Mail\Company\Invitation as MailCompanyInvitation;
use App\Models\CompanyInvitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Str;

class Invitation extends Component
{
    public $email;

    public function inviteUser()
    {
        // Validate the form data
        $this->validate([
            'email' => 'required|email|unique:users,email',
        ]);
        
        // Generate a unique invitation token
        $token = Str::random(32);

        // Create a new invitation record
        $invitation = CompanyInvitation::create([
            'team_id' => Auth::user()->team->id,
            'company_id' => Auth::user()->currentCompany->id,
            'email'     => $this->email,
            'token' => $token,
            'role' => 'Super Admin',
            // 'role' => 'admin',
            'expire_at' => now()->addDays(7),
        ]);

        // Send the invitation email with a link to the registration page
        Mail::to($this->email)->send(new MailCompanyInvitation($invitation));

        // Empty field
        $this->email = '';
        toast("L'invitation a bien été envoyée.", 'success');

        // Return a success response
        session()->flash('message', 'Invitation envoyée !');
        return response()->json(['message' => 'Invitaion envoyée !.']);
    }
    public function render()
    {
        return view('livewire.company.invitation');
    }
}
