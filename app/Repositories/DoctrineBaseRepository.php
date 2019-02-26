<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 18.07.2018
 * Time: 14:18 PM
 */

namespace App\Repositories;


use Doctrine\Common\Util\Inflector;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;
use Doctrine\DBAL\Event\Listeners\OracleSessionInit;


/**
 * Class DoctrineBaseRepository
 * @package App\Repositories
 * Prosirujemo generic EntityRepository (koji nam vraća) EntityManager
 * posto zelimo da imamo vise funkcionalnosti i vecu kontrolu nad Repositories
 * Ovaj DoctrineBaseRepository ce dodatno da prosire pojedinacni Repositories
 */
class DoctrineBaseRepository extends EntityRepository
{
    public function __construct($em, Mapping\ClassMetadata $class)
    {
        $em->getEventManager()->addEventSubscriber(new OracleSessionInit(array(
//                'NLS_DATE_FORMAT' 		=> 'YYYY-MM-DD',
                'NLS_DATE_FORMAT' 		=> 'dd.mm.yyyy HH24:MI:SS',
//                'NLS_TIMESTAMP_FORMAT' 	=> 'YYYY-MM-DD HH24:MI:SS'
                'NLS_TIMESTAMP_FORMAT' 	=> 'dd.mm.yyyy HH24:MI:SS'
            ))
        );
        parent::__construct($em, $class);
    }

    public function create($data)
    {
        $entity= new $this->_entityName();
        return $this->prepare($entity, $data);
    }

    public function prepare($entity, $data)
    {
        $set = 'set';
        $whitelist = $entity->whitelist();

        foreach ($whitelist as $field) {
            if (isset($data[$field])){
                $setter = $set.Inflector::classify($field);
                $entity->$setter($data[$field]);
            }
        }
        return $entity;
    }

    public function update($data, $id)
    {
        $entity = $this->find($id);
        return $this->prepare($entity,$data);
    }

    public function save($object)
    {
        $this->_em->persist($object);
        $this->_em->flush($object);
        return $object;
    }

    public function delete($object)
    {
        $this->_em->remove($object);
        $this->_em->flush($object);
        return true;
    }




}