<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 18.07.2018
 * Time: 15:06 PM
 */

namespace App\Repositories\Polisa;

use App\Models\Polisa\PolisaRepository;
use App\Repositories\DoctrineBaseRepository;
use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\NonUniqueResultException;

/**
 * Class DoctrinePolisaRepository
 * @package App\Repositories\Polisa
 * Implementira interfejs PolisaRepository,
 * međutim samim prosirenjem osnovne DoctrineBaseRepository, vec je implementirana vecina metoda
 */
class DoctrinePolisaRepository extends DoctrineBaseRepository implements PolisaRepository
{
    public function poliseAoDnevne(Carbon $startDate, Carbon $endDate)
    {
        $query = $this  ->createQueryBuilder('polisa')
                        ->select('polisa.datdok datum, sum(polisa.ukpremija) premijaAo, count(polisa.ukpremija) kolicinaAo')
                        ->andWhere('polisa.datdok between :startDate and :endDate')
                        ->setParameter('startDate', $startDate->format('d.m.Y'))
                        ->setParameter('endDate', $endDate->format('d.m.Y'))
                        ->andWhere('polisa.vros=800')
                        ->groupBy('polisa.datdok')
                        ->orderBy('polisa.datdok')
                        ->getQuery();
        $polise = $query->getResult();
        return collect($polise);
    }

    public function poliseOstaleDnevne(Carbon $startDate, Carbon $endDate)
    {
        $query = $this  ->createQueryBuilder('polisa')
            ->select('polisa.datdok datum, count(polisa.ukpremija) kolicinaOstale')
            ->andWhere('polisa.datdok between :startDate and :endDate')
            ->setParameter('startDate', $startDate->format('d.m.Y'))
            ->setParameter('endDate', $endDate->format('d.m.Y'))
            ->andWhere('polisa.vros!=800')
            ->groupBy('polisa.datdok')
            ->orderBy('polisa.datdok')
            ->getQuery();
//        try{
//            $polise = $query->getOneOrNullResult();
//        } catch (NonUniqueResultException $e) {
//            $polise = null;
//        }
        $polise = $query->getResult();
        return collect($polise);
    }

    public function poliseAoDnevneLista(Carbon $dan)
    {
        $query = $this  ->createQueryBuilder('polisa')
            ->select('polisa.ukpremija premija, polisa.pol_brpol broj_polise')
            ->andWhere('polisa.datdok = :today')
//            ->setParameter('today', Carbon::now()->format('d.m.Y'))
            ->setParameter('today', $dan->format('d.m.Y'))

            ->getQuery();
//        try{
//            $polise = $query->getOneOrNullResult();
//        } catch (NonUniqueResultException $e) {
//            $polise = null;
//        }
        $polise = $query->getResult();
        $poliseCollection = collect($polise);
        return $poliseCollection;

//        return new ArrayCollection($polise);

    }

}