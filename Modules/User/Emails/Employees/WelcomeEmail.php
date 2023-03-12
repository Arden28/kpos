<?php

namespace Modules\User\Emails\Employees;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $request;

    protected $user;

    protected $company;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request, $user, $company)
    {
        $this->request = $request;
        $this->user = $user;
        $this->company = $company;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('user::mail.employees.welcome')
        ->subject(__('Bienvenue Chez Koverae'))
        ->with(['request' =>$this->request, 'user' => $this->user, 'company' => $this->company])
        // ->attach(public_path('/assets/images/logo/logo.png'), [
        //     'as' => 'logo.png',
        //     'mime' => 'image/png',
        // ])
        ;
    }
}
