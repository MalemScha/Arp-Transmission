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

class LinesExport implements FromView,WithStyles,WithEvents,WithTitle,WithCustomStartCell,ShouldAutoSize
{

    protected $reports;
    protected $question;
    protected $title;
    protected $lineName;
    protected $month;
    protected $year;
    protected $t_no;
    protected $vis;
    protected $count;




    public function __construct($reports,$question,$title,$lineName,$month,$year,$t_no,$vis,$count)
    {
        $this->reports = $reports;
        $this->question = $question;
        $this->title = $title;
        $this->lineName = $lineName;
        $this->month = $month;
        $this->year = $year;
        $this->t_no = $t_no;
        $this->vis = $vis;
        $this->count = $count;


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
        return view('pages.lines', [
            'reports' => $this->reports,
            'question' => $this->question,
            'lineName' => $this->lineName,
            'month' => $this->month,
            'year' => $this->year,
            't_no' => $this->t_no,
            'vis' => $this->vis,
            'count' => $this->count,


        ]);


        // return $this->id;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->lineName;
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

