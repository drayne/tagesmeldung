<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 10.09.2018
 * Time: 8:54 AM
 */

namespace App\Models\Prijstet;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * koliko je dato na placanje (bice i placeno sigurno, jer je u knjigovodstvu
 * @ORM\Entity
 * @ORM\Table(name="vw_prijstet_suma_iznos")
 */
class PrijstetIznosSuma
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