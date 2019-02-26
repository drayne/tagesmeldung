<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 17.07.2018
 * Time: 12:39 PM
 */

namespace App\Models\Tagesmeldung;
use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="vw_tagesmeldung_month")
 */
class TagesmeldungMonth
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $datum;

    /**
     * @ORM\Column(type="integer")
     */
    protected $kolicinaao;

    /**
     * @ORM\Column(type="integer")
     */
    protected $kolicinaostale;

    /**
     * @ORM\Column(type="float")
     */
    protected $premijaao;

    /**
     * @ORM\Column(type="float")
     */
    protected $premijaostale;

    /**
     * @ORM\Column(type="float")
     */
    protected $steteprijavljeno;

    /**
     * @ORM\Column(type="float")
     */
    protected $steterezervisano;

    /**
     * @ORM\Column(type="float")
     */
    protected $steteplaceno;

    public function getDatum()
    {
        return $this->datum;
    }

    public function getKolicinaao()
    {
        return $this->zeroIfNull($this->kolicinaao);
    }

    public function getKolicinaostale()
    {
        return $this->zeroIfNull($this->kolicinaostale);
    }

    public function getPremijaao()
    {
        return $this->zeroIfNull($this->premijaao);
    }

    public function getPremijaostale()
    {
        return $this->zeroIfNull($this->premijaostale);
    }

    public function getSteteplaceno()
    {
        return $this->zeroIfNull($this->steteplaceno);
    }

    public function getSteteprijavljeno()
    {
        return $this->zeroIfNull($this->steteprijavljeno);
    }

    public function getSteterezervisano()
    {
        return $this->zeroIfNull($this->steterezervisano);
    }

    private function zeroIfNull($value)
    {
        if (!$value) {
            return 0;
        } else {
            return $value;
        }
    }

}