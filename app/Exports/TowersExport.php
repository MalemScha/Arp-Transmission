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

class TowersExport implements WithMultipleSheets
{

    protected $tower;
    protected $question;
    protected $period;



    public function __construct($tower,$question,$period)
    {
        $this->tower = $tower;
        $this->question = $question;
        $this->period = $period;


    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

            foreach ($this->period as $key => $d) {
                $reports = Report::where('tower_id',$this->tower->id)->whereYear('created_at', '=', $d->format('Y'))
                ->whereMonth('created_at', '=', $d->format('m'))
                ->get();
                $date = Carbon::createFromDate($d->format('Y'), $d->format('m'), 1);
                // dd($count);
                // Excel::download(new TowerExport($reports,$question,$exploreDate[1],$exploreDate[0],$tower),'Report for '.$tower->name.'('.$request->time.').xlsx');
                $sheets[] = new TowerExport($reports, $this->question,$d->format('m'),$d->format('Y'),$this->tower);
        }

        return $sheets;
    }

}
