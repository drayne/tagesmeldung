<?php

namespace App\Console\Commands\Emails;

//use Illuminate\Console\Command;
use App\Utilities\CommandPublisherTrait;
use App\Utilities\SlackNotificationObserver;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;


class SendEmailTagesmeldungCommand extends Command implements \SplSubject
{
    use CommandPublisherTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:emailTagesmeldung';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Tagesmeldung report';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->attach(new SlackNotificationObserver());
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $attach = storage_path() . '/queued/' . 'tagesmeldung.xlsx';
        $receivers = explode(',',env('MAIL_TO_ADDRESS_TAGESMELDUNG'));

        if (is_file($attach)) {
            try{
                Mail::send('emails.tagesmeldung', [
                ],  function ($message) use ($attach, $receivers) {
                        $message->from(env('MAIL_FROM_ADDRESS_GRAWE'), env('MAIL_FROM_NAME_GRAWE'));
                        $message->subject('Tagesmeldung report von ATOS');

                        $message->to($receivers);
                        $message->attach($attach);
                    }
                );
                $this->notify("tagesmeldung.sent");
                \Log::info('tagesmeldung email sent');
            } catch (\Exception $e) {
                $this->notify("tagesmeldung.notSent");
                \Log::info('TAGESMELDUNG EMAIL NOT SENT');
            }

            $archive = storage_path() . '/archive/tagesmeldung/' . 'tagesmeldung-' . Carbon::now()->format('d.m.Y') . '.xlsx';
            File::move($attach, $archive);

        } else {
            /*
             * TODO email it sektoru - kreirati funkciju za izvjestavanje it sektora o problemima sa aplikacijom
             * provjera da li je kreiran fajl je kreirana i poziva se 4 sata prije slanja emaila
             * tagesmeldung izvjestaj nije kreiran
             */

        }
    }
}
