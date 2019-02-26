<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 10.09.2018
 * Time: 8:54 AM
 */

namespace App\Models\Polisa;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="VW_PREMIJA_OSTALE_PO_DATUMU")
 */
class PolisaOstaleSuma
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
    * @ORM\Column(type="string")
    */
    protected $datumdok;

    /**
     * @ORM\Column(type="number")
     */
    protected $iznos;

}