<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 10.09.2018
 * Time: 9:15 AM
 */

namespace App\Repositories\Prijstet;


use App\Models\Prijstet\PrijstetIznosSumaRepository;
use App\Repositories\DoctrineBaseRepository;
use Carbon\Carbon;
use Doctrine\ORM\NonUniqueResultException;

class DoctrinePrijstetIznosSumaRepository extends DoctrineBaseRepository implements PrijstetIznosSumaRepository
{
    public function sumaPlaceneDnevne(Carbon $startDate, Carbon $endDate)
    {
        $query = $this  ->createQueryBuilder('prijstetIznosSuma')
            ->select('prijstetIznosSuma.datumdok datum, sum(prijstetIznosSuma.iznos) suma')
            ->andWhere('prijstetIznosSuma.datumdok between :startDate and :endDate')
            ->setParameter('startDate', $startDate->format('d.m.Y'))
            ->setParameter('endDate', $endDate->format('d.m.Y'))
            ->groupBy('prijstetIznosSuma.datumdok')
            ->orderBy('prijstetIznosSuma.datumdok')
            ->getQuery();
//        try{
//            $stete = $query->getOneOrNullResult();
//        } catch (NonUniqueResultException $e) {
//            $stete = null;
//        }
        $stete = collect($query->getResult());
//        $stete = $query->execute();
//        $keyed = $stete->keyBy('datum');
//        dd($keyed->all());
        return $stete;
    }


}