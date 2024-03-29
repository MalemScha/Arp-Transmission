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
    protected $period;



    public function __construct($lines,$question,$period)
    {
        $this->lines = $lines;
        $this->question = $question;
        $this->period = $period;


    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        foreach($this->lines as $line) {
            foreach ($this->period as $key => $d) {
                $reports = Report::where('line_id',$line->id)->whereYear('created_at', '=', $d->format('Y'))
                ->whereMonth('created_at', '=', $d->format('m'))
                ->get();
                $date = Carbon::createFromDate($d->format('Y'), $d->format('m'), 1);
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
                $sheets[] = new LinesExport($reports, $this->question,'title',$line->name,$d->format('m'),$d->format('Y'),$line->tower_no,$reports->count(),$count);
        }

        }

        return $sheets;
    }

}
