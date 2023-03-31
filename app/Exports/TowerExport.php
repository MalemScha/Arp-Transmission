<?php

namespace App\Exports;

use App\Report;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TowerExport implements FromView,WithStyles,WithEvents,WithTitle,WithCustomStartCell,ShouldAutoSize
{

    protected $reports;
    protected $question;
    protected $tower;
    protected $month;
    protected $year;




    public function __construct($reports,$question,$month,$year,$tower)
    {
        $this->reports = $reports;
        $this->question = $question;
        $this->tower = $tower;
        $this->month = $month;
        $this->year = $year;


    }
    public function startCell(): string
    {
        return 'A2';
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1')->getAlignment()->setWrapText(true);
    }
   /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('pages.file', [
            'reports' => $this->reports,
            'question' => $this->question,
            'month' => $this->month,
            'year' => $this->year,
            'tower'=> $this->tower,
        ]);


        // return $this->id;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->tower->name;
    }

    public function registerEvents(): array
        {
            return [
                AfterSheet::class    => function(AfterSheet $event) {
                    $sheet = $event->sheet;

                $sheet->mergeCells('A1:D1');
                $sheet->setCellValue('A1', "Tower Patrolling Report");

                $styleArray = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ];
                
                $cellRange = 'A1:D1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);

                    $cellRange1      = 'A';
                    $cellRange2     = 'C';
                    $cellRange3     = 'B';
                    // $event->sheet->getDelegate()->getStyle($cellRange1)->applyFromArray($styleArray);
                    $event->sheet->getDelegate()->getStyle($cellRange2)->applyFromArray($styleArray);
                    $event->sheet->getDelegate()->getStyle($cellRange3)->applyFromArray($styleArray);


                    // $event->sheet->getStyle($cellRange)->getAlignment()->setWrapText(true);
                    // $event->sheet->getStyle($cellRange2)->getAlignment()->setWrapText(true);
                    // $event->sheet->getStyle($cellRange3)->getAlignment()->setWrapText(true);


                },
            ];
        }

}

