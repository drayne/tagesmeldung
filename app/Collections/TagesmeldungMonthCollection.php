<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 20.09.2018
 * Time: 11:11 AM
 */

namespace App\Collections;

use App\Models\Tagesmeldung\TagesmeldungMonthRepository;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class TagesmeldungMonthCollection  extends Collection
{
    public function __construct(TagesmeldungMonthRepository $tagesmeldung)
    {
        parent::__construct($tagesmeldung->tagesmeldungMonthArray());//vraca zavisno od repository-ja sta vraca

    }
}