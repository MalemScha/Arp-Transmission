<?php

namespace App\Exports;

use App\Line;
use App\Report;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ReportsExport implements WithMultipleSheets
{

    protected $lines;
    protected $question;
    protected $year;
    protected $month;



    public function __construct($lines,$question,$year,$month)
    {
        $this->lines = $lines;
        $this->question = $question;
        $this->year = $year;
        $this->month = $month;


    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        foreach($this->lines as $line) {
            $reports = Report::where('line_id',$line->id)->whereYear('created_at', '=', $this->year)
            ->whereMonth('created_at', '=', $this->month)
            ->get();
            // dd($line);
            $date = Carbon::createFromDate($this->year, $this->month, 1);
            $c = ($date->subMonths(2)->toDateTimeString());
            $count = 0;
            foreach ($reports as $report) {
                $res = Report::where('tower_id',$report->tower_id)->where(
                    'created_at', '>', $c)->get();
                    if($res->count() == 1){
                        $count++;
                    }
            }
            // dd($count);
            $sheets[] = new LinesExport($reports, $this->question,'title',$line->name,$this->month,$this->year,$line->tower_no,$reports->count(),$count);

        }

        return $sheets;
    }

}
