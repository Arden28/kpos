<?php

namespace App\Mail\Company;

use App\Models\Company;
use App\Models\CompanyInvitation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Invitation extends Mailable
{
    use Queueable, SerializesModels;

    public $invitation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CompanyInvitation $invitation)
    {
        $this->invitation = $invitation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = url('/auth/guest-register?invitation_token=' . $this->invitation->token);
        $company = Company::find($this->invitation->company_id)->first();
        return $this->markdown('emails.company.invitation')
        ->subject('Invitation à rejoindre '.$company->name)
        ->with([
            'url' => $url,
            'company'   => $company->name
        ]);
    }
}
