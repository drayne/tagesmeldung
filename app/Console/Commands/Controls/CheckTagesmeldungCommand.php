<?php

namespace App\Console\Commands\Controls;

//use Illuminate\Console\Command;
use App\Utilities\CommandPublisherTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CheckTagesmeldungCommand extends Command implements \SplSubject
{
    use CommandPublisherTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:checkTagesmeldung';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Provjera da li je tagesmeldung izvjestaj automatski generisan';

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
     * @return mixed
     */
    public function handle()
    {
        $file = storage_path() . '/queued/' . 'tagesmeldung.xlsx';
        if (!is_file($file)) {

            Mail::raw('Generisanje Tagesmeldung fajla nije uspjelo. Molimo preuzmite fajl sa http://192.168.101.246/generate/tagesmeldung i u 9:00 dostavite na sledece adrese:
                othmar.ederer@grawe.at
                dragan.sumatic@atososiguranje.com
                veselin.petkovic@grawe.at
                marko.mikic@grawe.si
                irhad.mehelic@grawe.hr
                zeljko.stjepanovic@grawe.hr
                dijana.vulic@grawe.at
                ',
                function($message)
                {
                   $message->from('reports@atososiguranje.com', 'Atos osiguranje reports');
                   $message->subject('Tagesmeldung problem');
                   $message->to('it@atososiguranje.com');
                });
        }
    }
}
