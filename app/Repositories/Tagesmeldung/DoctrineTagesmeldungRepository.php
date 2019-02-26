<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 21.09.2018
 * Time: 11:36 AM
 */

namespace App\Repositories\Tagesmeldung;


use App\Models\Tagesmeldung\TagesmeldungMonthRepository;
use App\Models\Tagesmeldung\TagesmeldungRepository;
use App\Repositories\DoctrineBaseRepository;
use Carbon\Carbon;

class DoctrineTagesmeldungRepository extends DoctrineBaseRepository implements TagesmeldungRepository
{

    public function tagesmeldungArray()
    {
//        $now = Carbon::now()->addDay(-1);

        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

//        $startDate = $now->startOfMonth();
//        $endDate = $now->endOfMonth();

        $query = $this  ->createQueryBuilder('tagesmeldung')
//            ->select(
//                'tagesmeldung.datum,
//                        tagesmeldung.kolicinaao,
//                        tagesmeldung.kolicinaostale,
//                        tagesmeldung.premijaao,
//                        tagesmeldung.premijaostale,
//                        tagesmeldung.steteprijavljeno,
//                        tagesmeldung.steterezervisano,
//                        tagesmeldung.steteplaceno') na ovaj nacin, rezultat je niz nizova, meni treba niz objekata, pa  selektujem sve, jer svakako kasnije filtriram
            ->select('tagesmeldung')
            ->andWhere('tagesmeldung.datum between :startDate and :endDate')
            ->setParameter('startDate', $startDate->format('d.m.Y'))
            ->setParameter('endDate', $endDate->format('d.m.Y'))
//            ->setParameter('startDate', '01.01.2019')
//            ->setParameter('endDate', '31.01.2019')
            ->getQuery();
//        $result = $query->getArrayResult();
        $result = $query->getResult();

        return $result;
    }


}