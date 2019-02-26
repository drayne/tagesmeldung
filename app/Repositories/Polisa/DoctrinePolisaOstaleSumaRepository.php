<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 10.09.2018
 * Time: 9:15 AM
 */

namespace App\Repositories\Polisa;


use App\Models\Polisa\PolisaOstaleSumaRepository;
use App\Repositories\DoctrineBaseRepository;
use Carbon\Carbon;
use Doctrine\ORM\NonUniqueResultException;

class DoctrinePolisaOstaleSumaRepository extends DoctrineBaseRepository implements PolisaOstaleSumaRepository
{
    public function sumaPlaceneDnevne(Carbon $dan)
    {
        $query = $this  ->createQueryBuilder('poliseOstaleSuma')
            ->select('sum(poliseOstaleSuma.iznos) suma')
            ->andWhere('poliseOstaleSuma.datumdok = :day')
            ->setParameter(':day', $dan->format('d.m.Y'))
            ->getQuery();
        try{
            $poliseOstale = $query->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
            $stete = null;
        }
        return $poliseOstale;
    }


}