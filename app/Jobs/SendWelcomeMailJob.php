<?php

namespace App\Jobs;

use App\Mail\NewKover;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendWelcomeMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $request;

    protected $user;

    protected $company;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request, $user, $company)
    {
        $request = $this->request;
        $user = $this->user;
        $company = $this->company;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($request, $user, $company)
    {

        Mail::to($user->email)->send(new NewKover($request, $user, $company));
    }
}
