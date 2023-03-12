<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewKover extends Mailable
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
        return $this->markdown('emails.new-kover')
        ->subject(__('New Kover'))
        ->with(['request' =>$this->request, 'user' => $this->user, 'company' => $this->company])
        // ->attach(public_path('/assets/images/logo/logo.png'), [
        //     'as' => 'logo.png',
        //     'mime' => 'image/png',
        // ])
        ;
    }
}
