<?php

namespace App\Console\Commands;

use App\Mail\AtosMemoMail;
use App\Models\EmailQueue\EmailQueueRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailQueueCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:emailQueue';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Slanje email-ova iz queue tabele';

    protected $email;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(EmailQueueRepository $emailQueueRepository)
    {
        parent::__construct();

        $this->email = $emailQueueRepository;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        if ($nextEmail = $this->email->nextEmail())
        {
            Mail::send(new AtosMemoMail($nextEmail));
            $this->email->markSent($nextEmail);
        }

    }
}
