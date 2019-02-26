<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

/**
 * App\Polisa
 *
 * @property string $POL_BRPOL
 * @property int $OJ
 * @property string|null $BROSK
 * @property string|null $ZAMPOL
 * @property int|null $STATUS
 * @property int $VROS
 * @property int $VSDOK
 * @property int $PTTM
 * @property bool|null $SEKTOR Pravno lice = 1; Fizicko lice = 2; tabela: SEKTOR
 * @property string $DATPOC
 * @property string $DATIST
 * @property string $DATDOK
 * @property string|null $DATPRIP
 * @property float|null $PREMIJA
 * @property float|null $IZNPOREZ
 * @property float|null $UKPREMIJA
 * @property float|null $IZNODM
 * @property int|null $BRRATA
 * @property string|null $NAP1
 * @property string|null $NAP2
 * @property string|null $NAP3
 * @property string|null $NAP4
 * @property int $MBRZASTUP
 * @property int $VRSTAPLAC
 * @property int|null $JMBG
 * @property string|null $NAZIVUGOV
 * @property int|null $PTTMUG
 * @property string|null $ADRESA
 * @property string|null $OSTALAADRESA
 * @property string $DATUMOBRADE
 * @property string|null $SIFOPERAT
 * @property string|null $LISTPOKR
 * @property string|null $OSNPOL
 * @property int|null $SIFOSIG
 * @property int|null $PTTMOSIG
 * @property string|null $KLOPAS
 * @property string|null $KLOPP
 * @property string|null $KLZM
 * @property int|null $NACOS
 * @property int|null $TRAJOS
 * @property string|null $DATDOS
 * @property string|null $BROJ_PASOSA
 * @property string|null $ZEMLJA_PASOSA
 * @property int|null $TAR
 * @property string|null $GRA_KAT
 * @property string|null $SIF_DEL
 * @property string|null $STAT_BR
 * @property string|null $NAZIVOSIG
 * @property float|null $IZNPOREZ0
 * @property string|null $KORISNIKSMRT
 * @property bool|null $STROGA
 * @property string|null $PASOS
 * @property string|null $DATROD
 * @property string|null $BIRO_DATUM
 * @property string|null $DATUM_PLACANJA
 * @property int|null $MBR
 * @property int|null $DEL_KASKO_RBR
 * @property int|null $LOM_STAKLA_RBR
 * @property int|null $KOMADA
 * @property string|null $BROJTEL
 * @property string|null $BROJ_ZK
 * @property string|null $DATPOC_VREME
 * @property string|null $DATIST_VREME
 * @property string|null $E_MAIL
 * @property string|null $TELEFON_MOBILNI
 * @property string|null $MESTOUG_GRAN
 * @property string|null $ZA_STORNIRANJE Označava dokumente koji su uneti i treba da se ponište.
 * @property string|null $NAZIV_FORME
 * @property string|null $BRPOL_OSTALI
 * @property int|null $OSIG_OSTALI
 * @property string|null $AZORS_SLANJE_ID
 * @property int|null $BM_PRENOS_POLISA
 * @property int|null $BM_PRENOS_PROCENAT
 * @property int|null $BM_PRENOS_OSIG_KUCA
 * @property string|null $TEGLJAC
 * @property string|null $VREME_IZDAVANJA
 * @property string|null $DATUM_PRESTANKA_VAZENJA
 * @property string|null $LICNA_KARTA
 * @property float|null $IZNOS_POPUSTA
 * @property string|null $ZIRO_RACUN
 * @property string|null $NAZIV_BANKE
 * @property string|null $POL
 * @property string|null $BRACNI_STATUS
 * @property string|null $DATUM_VOZACKE Ako je null za fizicko lice, prilikom izvjestavanja agenciji 'Ne posjeduje'.
 * Za pravna lica se ne unosi.
 * @property int|null $KOMITENT_AO
 * @property string|null $KB
 * @property string|null $KBPP
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereADRESA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereAZORSSLANJEID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereBIRODATUM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereBMPRENOSOSIGKUCA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereBMPRENOSPOLISA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereBMPRENOSPROCENAT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereBRACNISTATUS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereBROJPASOSA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereBROJTEL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereBROJZK($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereBROSK($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereBRPOLOSTALI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereBRRATA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereDATDOK($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereDATDOS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereDATIST($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereDATISTVREME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereDATPOC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereDATPOCVREME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereDATPRIP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereDATROD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereDATUMOBRADE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereDATUMPLACANJA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereDATUMPRESTANKAVAZENJA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereDATUMVOZACKE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereDELKASKORBR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereEMAIL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereGRAKAT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereIZNODM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereIZNOSPOPUSTA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereIZNPOREZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereIZNPOREZ0($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereJMBG($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereKB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereKBPP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereKLOPAS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereKLOPP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereKLZM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereKOMADA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereKOMITENTAO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereKORISNIKSMRT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereLICNAKARTA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereLISTPOKR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereLOMSTAKLARBR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereMBR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereMBRZASTUP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereMESTOUGGRAN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereNACOS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereNAP1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereNAP2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereNAP3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereNAP4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereNAZIVBANKE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereNAZIVFORME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereNAZIVOSIG($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereNAZIVUGOV($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereOJ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereOSIGOSTALI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereOSNPOL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereOSTALAADRESA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa wherePASOS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa wherePOL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa wherePOLBRPOL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa wherePREMIJA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa wherePTTM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa wherePTTMOSIG($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa wherePTTMUG($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereSEKTOR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereSIFDEL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereSIFOPERAT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereSIFOSIG($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereSTATBR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereSTATUS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereSTROGA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereTAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereTEGLJAC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereTELEFONMOBILNI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereTRAJOS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereUKPREMIJA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereVREMEIZDAVANJA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereVROS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereVRSTAPLAC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereVSDOK($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereZAMPOL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereZASTORNIRANJE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereZEMLJAPASOSA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Polisa whereZIRORACUN($value)
 * @mixin \Eloquent
 */
class Polisa extends Model
{
    protected $table = 'polisa';
    protected $primaryKey = 'pol_brpol';
}


//id tip receiver subject body queued sent

