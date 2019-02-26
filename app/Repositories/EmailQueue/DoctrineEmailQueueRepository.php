<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 19.07.2018
 * Time: 14:13 PM
 */

namespace App\Repositories\EmailQueue;


use App\Models\EmailQueue\EmailQueueRepository;
use App\Repositories\DoctrineBaseRepository;
use Carbon\Carbon;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping;
use Doctrine\ORM\NonUniqueResultException;
use Illuminate\Support\Facades\Log;


class DoctrineEmailQueueRepository extends DoctrineBaseRepository implements EmailQueueRepository
{

    public function nextEmail()
    {
        $query = $this  ->createQueryBuilder('next')
                        ->setMaxResults(1)
                        ->andWhere('next.time_sent IS NULL')
                        ->andWhere('next.time_scheduled <= :now')
                        ->setParameter('now', Carbon::now()->format('d.m.Y H:i:s'))
                        ->getQuery();
        try{
            $emailQueue = $query->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
            $emailQueue = null;
        }

        return $emailQueue;
    }

    public function markSent($sentEmail)
    {
        $sentEmail->setTimeSent(Carbon::now());
        $this->_em->persist($sentEmail);
        $this->_em->flush();
    }

    public function testEmail()
    {
        $query = $this  ->createQueryBuilder('next')
            ->setMaxResults(1)
//            ->andWhere('next.time_sent IS NULL')
            ->andWhere('next.time_scheduled <= :now')
            ->setParameter('now', Carbon::now()->format('d.m.Y H:i:s'))
            ->getQuery();
        try{
            $emailQueue = $query->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
            $emailQueue = null;
        }

        return $emailQueue;
    }
}