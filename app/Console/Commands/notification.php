<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;

use App\User;

use Illuminate\Console\Command;

class notification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send notification to user after 10 miutes automatically';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $emails = User::pluck('email')->toArray();
       $data = ['title'=>'programming','body'=>'php'];
       foreach($emails as $email){
        mail::to($email)->send(new NotifyEmail($data));
       }
    }
}
