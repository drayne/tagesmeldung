<?php

namespace App\Console\Commands\Reports;

use App\Collections\TagesmeldungCollection;
use App\Collections\TagesmeldungMonthCollection;
use App\Excels\TagesmeldungExcel;
use App\Utilities\CommandPublisherTrait;
use App\Utilities\SlackNotificationObserver;
use Illuminate\Console\Command;

//use App\Repositories\Tagesmeldung\DoctrineTagesmeldungRepository;
//use Illuminate\Console\Command;

class GenerateTagesmeldungCommand extends Command implements \SplSubject
{
    use CommandPublisherTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:generateTagesmeldung';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generating report tagesmeldung';

    protected $tagesmeldungCollection;
    protected $tagesmeldungMonthCollection;
    protected $excel;
    protected $repository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(TagesmeldungCollection $tagesmeldungCollection, TagesmeldungMonthCollection $tagesmeldungMonthCollection,  TagesmeldungExcel $excel)
    {
        parent::__construct();
        $this->excel = $excel;
//        $this->collection = $collection;
        $this->tagesmeldungCollection = $tagesmeldungCollection;
        $this->tagesmeldungMonthCollection = $tagesmeldungMonthCollection;
//        $this->repository = $repository;

        $this->attach(new SlackNotificationObserver());
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
//        $this->excel->setCollection($this->collection);
        $this->excel->addCollection($this->tagesmeldungCollection);
        $this->excel->addCollection($this->tagesmeldungMonthCollection);

        try {
            $this->excel->export('local');
            $this->notify("tagesmeldung.generated");
        } catch (\Exception $e) {
            $this->notify("tagesmeldung.notGenerated");
            return $e->getMessage();
        }
    }


}
