<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 17.07.2018
 * Time: 12:39 PM
 */

namespace App\Models\Polisa;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="polisa")
 */
class Polisa
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $pol_brpol;

    /**
     * @ORM\Column(type="string")
     */
    protected $jmbg;

    /**
     * @ORM\Column(type="float")
     */
    protected $ukpremija;

    /**
     * @ORM\Column(type="string")
     */
    protected $datdok;

    /**
     * @ORM\Column(type="integer")
     */
    protected $vsdok;

    /**
     * @ORM\Column(type="integer")
     */
    protected $vros;

    /**
     * @return mixed
     */
    public function getPolBrpol()
    {
        return $this->pol_brpol;
    }

    /**
     * @return mixed
     */
    public function getJmbg()
    {
        return $this->jmbg;
    }
}