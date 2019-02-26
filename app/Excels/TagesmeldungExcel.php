<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 24.09.2018
 * Time: 12:18 PM
 */

namespace App\Excels;


use App\Collections\TagesmeldungCollection;
use App\Collections\TagesmeldungMonthCollection;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style;

class TagesmeldungExcel
{
    protected $styleArrayLeading = [
        'font' => [
            'bold' => true,
        ],
        'alignment' => [
            'horizontal' => Style\Alignment::HORIZONTAL_LEFT,
        ],
        'borders' => [
            'top' => [
                'borderStyle' => Style\Border::BORDER_THIN,
            ],
            'bottom' => [
                'borderStyle' => Style\Border::BORDER_THIN,
            ],
            'left' => [
                'borderStyle' => Style\Border::BORDER_THIN,
            ],
            'right' => [
                'borderStyle' => Style\Border::BORDER_THIN,
            ],
        ],
    ];

    protected $styleArrayRest = [
        'font' => [
            'bold' => false,
        ],
        'alignment' => [
            'horizontal' => Style\Alignment::HORIZONTAL_RIGHT,
        ],
        'borders' => [
            'top' => [
                'borderStyle' => Style\Border::BORDER_THIN,
            ],
            'bottom' => [
                'borderStyle' => Style\Border::BORDER_THIN,
            ],
            'left' => [
                'borderStyle' => Style\Border::BORDER_THIN,
            ],
            'right' => [
                'borderStyle' => Style\Border::BORDER_THIN,
            ],
        ],
    ];

    protected $collections=[];

//    public function __construct(TagesmeldungCollection $collection)
//    {
//        $this->collection = $collection;
//    }

//    public function setCollection(TagesmeldungCollection $collection)
    public function addCollection(Collection $collection)
    {
        $this->collections[] = $collection;
    }

    /**
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     * napisati try catch blok prilikom instanciranja i pozivanja metode u schedule
     */
    public function export(string $location = 'local')
    {
        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

//        $objPHPExcel = \PhpOffice\PhpSpreadsheet\IOFactory::load(storage_path() . '/excel-template/tagesmeldung_template.xls');

        $objPHPExcel = IOFactory::load(storage_path() . '/excel-template/tagesmeldung_template.xls');
        $baseRow = 5;
        $month_row = 0;

        foreach ($this->collections as $collection) {

            foreach ($collection as $r => $rezultat) {
                //            dd($rezultat);
//                if ($month_row!=0) {
//                    $r = $month_row+1;
//                    $month_row = 0;
//                }
                $row = $baseRow + $r;
                $row = $row + $month_row;

                $objPHPSheet = $objPHPExcel->getActiveSheet();
                $objPHPSheet->insertNewRowBefore($row, 1);

                $objPHPSheet
                            ->setCellValue('A' . $row, $rezultat->getDatum())
                            ->setCellValue('B' . $row, $rezultat->getKolicinaao())
                            ->setCellValue('C' . $row, $rezultat->getKolicinaostale())
                            ->setCellValue('D' . $row, $rezultat->getPremijaao())
                            ->setCellValue('E' . $row, $rezultat->getPremijaostale())
                            ->setCellValue('F' . $row, $rezultat->getSteteprijavljeno())
                            ->setCellValue('G' . $row, $rezultat->getSteterezervisano())
                            ->setCellValue('H' . $row, $rezultat->getSteteplaceno());

                if ($month_row>0) {
                    $objPHPSheet->getStyle('A' . $row)->applyFromArray($this->styleArrayLeading);
                    $objPHPSheet->getStyle('B' . $row)->applyFromArray($this->styleArrayRest);
                    $objPHPSheet->getStyle('C' . $row)->applyFromArray($this->styleArrayRest);
                    $objPHPSheet->getStyle('D' . $row)->applyFromArray($this->styleArrayRest);
                    $objPHPSheet->getStyle('E' . $row)->applyFromArray($this->styleArrayRest);
                    $objPHPSheet->getStyle('F' . $row)->applyFromArray($this->styleArrayRest);
                    $objPHPSheet->getStyle('G' . $row)->applyFromArray($this->styleArrayRest);
                    $objPHPSheet->getStyle('H' . $row)->applyFromArray($this->styleArrayRest);
                }

            }
            $month_row = $row-1;
        }

        $objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);

        if($location == 'local') {
            $this->storeLocally($objPHPExcel);
        } elseif ($location == 'download') {
            $this->download($objPHPExcel);
        }

//        $objWriter = IOFactory::createWriter($objPHPExcel, 'Xlsx');
//        $objWriter->save(storage_path() . '/queued/' . 'tagesmeldung.xlsx');
    }

    public function storeLocally($objPHPExcel)
    {
        $objWriter = IOFactory::createWriter($objPHPExcel, 'Xlsx');
        $objWriter->save(storage_path() . '/queued/' . 'tagesmeldung.xlsx');
    }

    public function download($objPHPExcel)
    {
        $objWriter = IOFactory::createWriter($objPHPExcel, 'Xlsx');
        header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
        header('Content-Disposition: attachment; filename="tagesmeldung.xlsx"');
        $objWriter->save('php://output');
        exit();

    }
}