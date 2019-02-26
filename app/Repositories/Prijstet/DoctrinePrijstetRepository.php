<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 10.09.2018
 * Time: 9:15 AM
 */

namespace App\Repositories\Prijstet;


use App\Models\Prijstet\PrijstetRepository;
use App\Repositories\DoctrineBaseRepository;
use Carbon\Carbon;
use Doctrine\ORM\NonUniqueResultException;

class DoctrinePrijstetRepository extends DoctrineBaseRepository implements PrijstetRepository
{
    public function prijavljeneDnevne(Carbon $startDate, Carbon $endDate)
    {
        $query = $this  ->createQueryBuilder('prijstet')
            ->select('prijstet.datumprijave datum, count(prijstet.prst_brstete) kolicina, sum(prijstet.iznos_rezervacije) rezervacija')
            ->andWhere('prijstet.datumprijave between :startDate and :endDate')
            ->setParameter('startDate', $startDate->format('d.m.Y'))
            ->setParameter('endDate', $endDate->format('d.m.Y'))
            ->groupBy('prijstet.datumprijave')
            ->orderBy('prijstet.datumprijave')
            ->getQuery();
//        try{
//            $stete = $query->getOneOrNullResult();
//        } catch (NonUniqueResultException $e) {
//            $stete = null;
//        }
        $stete = collect($query->getResult());
        return $stete;


//        dd('123');
    }


}