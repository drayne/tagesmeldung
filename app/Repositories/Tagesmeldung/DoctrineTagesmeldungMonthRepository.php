<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 16.10.2018
 * Time: 14:06 PM
 */

namespace App\Repositories\Tagesmeldung;


use App\Models\Tagesmeldung\TagesmeldungMonthRepository;
use App\Repositories\DoctrineBaseRepository;

class DoctrineTagesmeldungMonthRepository extends DoctrineBaseRepository implements TagesmeldungMonthRepository
{
    public function tagesmeldungMonthArray()
    {
        $query = $this  ->createQueryBuilder('tagesmeldungMonth')
            ->select('tagesmeldungMonth')
            ->getQuery();
//        $result = $query->getArrayResult();
        $result = $query->getResult();
        return $result;
    }
}