<?php

namespace App\Http\Controllers;

use App\Collections\TagesmeldungCollection;
use App\Collections\TagesmeldungMonthCollection;
use App\Excels\TagesmeldungExcel;
use Illuminate\Http\Request;

/*
 * rucno generisanje fajla za download u browser
 */
class TagesmeldungController extends Controller
{
    protected $tagesmeldungCollection;
    protected $tagesmeldungMonthCollection;
    protected $excel;

    public function __construct(TagesmeldungCollection $tagesmeldungCollection, TagesmeldungMonthCollection $tagesmeldungMonthCollection,  TagesmeldungExcel $excel)
    {
        $this->excel = $excel;
        $this->tagesmeldungCollection = $tagesmeldungCollection;
        $this->tagesmeldungMonthCollection = $tagesmeldungMonthCollection;
    }

    public function createTagesmeldung()
    {
        $this->excel->addCollection($this->tagesmeldungCollection);
        $this->excel->addCollection($this->tagesmeldungMonthCollection);

        try {
            $this->excel->export('download');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
