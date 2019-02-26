<?php

namespace App\Http\Controllers;

use App\Models\EmailQueue\EmailQueueRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Polisa;

class ProbaController extends Controller
{
    private $emailQueue;

    public function __construct(EmailQueueRepository $emailQueueRepository)
    {
        $this->emailQueue = $emailQueueRepository;
    }

    public function index()
    {
        //print_r(Polisa::find($polisa));
        dd(Carbon::now()->format('d.m.Y H:i:s'));
//        dd($this->emailQueue->nextEmail());
    }

}
