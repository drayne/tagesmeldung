<?php

namespace App\Exports;

use App\Collections\TagesmeldungCollection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCharts;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * Class TagesmeldungExport
 * @package App\Exports
 * nije uradjeno preko ovoga
 * ovo se moze iskoristiti kao primjer po potrebi za eventualni cisti eksport, bez template
 */
class TagesmeldungExport implements FromCollection, WithHeadings, WithColumnFormatting, ShouldAutoSize, WithEvents
{
    protected $tagesmeldungCollection;

    public function __construct(TagesmeldungCollection $tagesmeldungCollection)
    {
        $this->tagesmeldungCollection = $tagesmeldungCollection;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
//        return $this->polisa->poliseAoDnevneLista(Carbon::yesterday());
//        dd($this->polisa->poliseAoDnevneLista(Carbon::yesterday()));
        return $this->tagesmeldungCollection;
    }


    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Tag',
            'Anzahl KFZ-Polizzen',
            'Anzahl Sonstige Polizzen',
            'Pramien(KM) KFZ-Polizzen',
            'Pramien(KM) Sonstige Polizzen',
            'Anzahl gemeldete Schaden',
            'Gemeldete Schaden(KM)',
            'Bezahlte Schaden(KM)'
        ];
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'A' => 'DD.MM.YYYY',
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        $styleArray = [
            'font' => [
                'bold' => true,
            ]
        ];

        return[
            AfterSheet::class => function(AfterSheet $event) use ($styleArray) {
                $event->sheet->getStyle('A1:H1')->applyFromArray($styleArray);
            }
        ];
    }
}
