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
 * prijstet prosiren sa iznosima rezervacije po prijavljenim stetama
 * @ORM\Entity
 * @ORM\Table(name="vw_prijstet_pos_rez")
 */
class Prijstet
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $prst_brstete;

    /**
     * @ORM\Column(type="integer")
     */
    protected $prst_godina;

    /**
     * @ORM\Column(type="integer")
     */
    protected $vros;

    /**
     * @ORM\Column(type="integer")
     */
    protected $prst_vrsta;

    /**
     * @ORM\Column(type="integer")
     */
    protected $status_stete;

    /**
 * @ORM\Column(type="string")
 */
    protected $datumprijave;

    /**
     * @ORM\Column(type="number")
     */
    protected $iznos_rezervacije;



    /**
     * @return mixed
     */
    public function getBrojStete()
    {
        return $this->prst_brstete . '/' . $this->prst_godina;
    }
}