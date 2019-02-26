<?php

namespace App\Http\Controllers;


use App\Collections\TagesmeldungCollection;
use App\Collections\TagesmeldungMonthCollection;
use App\Excels\TagesmeldungExcel;
use App\Exports\TagesmeldungExport;
use App\Facades\AdminNotify;
use App\Models\EmailQueue\EmailQueueRepository;
use App\Models\Polisa\PolisaOstaleSumaRepository;
use App\Models\Polisa\PolisaRepository;
use App\Models\Prijstet\PrijstetIznosSumaRepository;
use App\Models\Prijstet\PrijstetRepository;
use App\Models\Tagesmeldung\TagesmeldungMonthRepository;
use App\Models\Tagesmeldung\TagesmeldungRepository;
use App\Notifications\Tagesmeldung\TagesmeldungGenerated;
use App\Notifications\Tagesmeldung\TagesmeldungNotGenerated;
use App\Notifications\Tagesmeldung\TagesmeldungSent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PolisaController extends Controller
{

    private $polisa;
    private $emailQueue;
    private $prijstet;
    private $placeneIznos;
    private $excel;
    private $poliseOstaleSuma;
    private $tagesmeldung;
    private $tagesmeldungMonth;

    public function __construct(PolisaRepository $polisa, EmailQueueRepository $emailQueue, PrijstetRepository $prijstet, PrijstetIznosSumaRepository $placeneIznos, PolisaOstaleSumaRepository $poliseOstaleSuma, Excel $excel, TagesmeldungRepository $tagesmeldung, TagesmeldungMonthRepository $tagesmeldungMonth)
    {
        $this->polisa = $polisa;
        $this->emailQueue = $emailQueue;
        $this->prijstet = $prijstet;
        $this->placeneIznos = $placeneIznos;
        $this->poliseOstaleSuma = $poliseOstaleSuma;
        $this->excel = $excel;
        $this->tagesmeldung = $tagesmeldung;
        $this->tagesmeldungMonth = $tagesmeldungMonth;
    }

    public function index()
    {
//        $polise = $em->getRepository(Polisa::class)->findOneBy(array('pol_brpol'=> '1348796'));
//        $polise = $this->polisa->findOneBy(array('pol_brpol'=> '1348796'));
//        $emailQueue = ($this->emailQueue->find('1'));

        //dd($emailQueue->getType());
//        dd($this->emailQueue->nextEmail());
//        dd($polise);


//        return $polise = $this->polisa->poliseAoDnevne(Carbon::createFromFormat('Y-m-d', '2018-09-06'), Carbon::today())->all();
//        return $stete = $this->prijstet->prijavljeneDnevne(Carbon::createFromFormat('Y-m-d', '2018-09-06'), Carbon::today())->all();
//        return $stete = $this->placeneIznos->sumaPlaceneDnevne(Carbon::createFromFormat('Y-m-d', '2018-09-06'), Carbon::today())->all();

//        $stete = $this->prijstet->prijavljeneDnevne(Carbon::yesterday());
//        $stete = $this->placeneIznos->sumaPlaceneDnevne(Carbon::yesterday());

//        $polise = $this->polisa->poliseOstaleDnevne(Carbon::createFromFormat('Y-m-d', '2018-09-06'));
//        $polise = $this->poliseOstaleSuma->sumaPlaceneDnevne(Carbon::createFromFormat('Y-m-d', '2018-09-12'));
//        dd($polise);

/*
        $polise = $this->polisa->poliseAoDnevneLista(Carbon::today());

        $excel = new Spreadsheet();
        $sheet = $excel->getActiveSheet();

        $sheet->setCellValue('A1', 'Hello World !');

        $writer = new Xlsx($excel);
        $writer->save('hello world.xlsx');
*/

        $tagesmeldungCollection = new TagesmeldungCollection($this->tagesmeldung);
//        dd($tagesmeldungCollection->all());

//        dd($collection);

//        $this->excel->store(new TagesmeldungExport($tagesmeldungCollection), '123.xlsx');

//        $excel = new TagesmeldungExcel($tagesmeldungCollection);
        $excel= new TagesmeldungExcel();
        $excel->setCollection($tagesmeldungCollection);
        try {
            $excel->export();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

//        return 'done';

//        return $this->excel->download($polise, 'polise.xlsx');



//        dd($polise);
//        dd(Carbon::now()->format('d.m.Y'));
    }

    public function test()
    {
//        echo date('d/m/Y == H:i:s');
//        AdminNotify::send(new TagesmeldungSent());
//        AdminNotify::send(new TagesmeldungGenerated());
//
//        $notification = app()->make('config')->get('eventNotification.tagesmeldung.generated');
//        dd($notification);

        $now = Carbon::now()->addDay(-1);
        echo $now->startOfMonth();
        echo $now->endOfMonth();

//        dd(config('eventNotification.tagesmeldung.generated'));


//        $tagesmeldungCollection = new TagesmeldungMonthCollection($this->tagesmeldungMonth);
//        dd($tagesmeldungCollection);

    }


//Carbon::createFromFormat('Y-m-d H', '1975-05-21 22')->toDateTimeString();

}


