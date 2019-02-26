<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 20.09.2018
 * Time: 11:11 AM
 */

namespace App\Collections;

use App\Models\Tagesmeldung\TagesmeldungRepository;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class TagesmeldungCollection  extends Collection
{
    public function __construct(TagesmeldungRepository $tagesmeldung)
    {
        parent::__construct($tagesmeldung->tagesmeldungArray());//vraca zavisno od repository-ja sta vraca


//        dd($tagesmeldung->findAll()); ovo vraca niz objekata
    }
}