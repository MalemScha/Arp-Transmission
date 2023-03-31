<?php

namespace App\Http\Controllers;

use App\Line;
use App\Schedule;
use App\Tower;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lines = Line::all();
        $towers = Tower::all();
        $schedules = Schedule::orderBy('schedule', 'desc')->get();
        return view('schedule', compact('towers','lines','schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate(
            [
                'sel'     => 'required',
                'schedule' => 'required',
                'month' => 'required',
            ],
            [
                'sel.required' => 'Select either line or tower.',
                ]
            );

            $time = str_replace("T"," ",$request->schedule);
            $t = Carbon::createFromFormat('Y-m-d H:i:s',  $time.':00'); 
            $dateTime = $t->toDateTimeString();

            if ($request->sel == "tower") {
                $request->validate(
                    [
                        'tower_id'    => 'required',
                    ]
                    );

                    $s = Schedule::create([
                        'tower_id' => $request->tower_id,
                        'month' => $request->month,
                        'schedule' => $dateTime,
                        'line_id' => 0,
                        'sent' => 0,
                    ]);
            } else if($request->sel == "line"){
                $request->validate(
                    [
                        'line_id'    => 'required',
                    ]
                    );
                    $s = Schedule::create([
                        'line_id' => $request->line_id,
                        'month' => $request->month,
                        'schedule' => $dateTime,
                        'tower_id' => 0,
                        'sent' => 0,
                    ]);
            }
            
            if ($s) {
                return redirect()->back()->with('success', 'Schedule added!');
            }else{
                return redirect()->back()->with('error', 'Failed to add schedule! Try again.');
            }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        // dd($recipient);
        if($schedule){
            $schedule->delete();
            return redirect()->back()->with('success', 'Schedule removed!');
        }else{
            return redirect()->back()->with('error', 'Schedule not found');
        }
    }
}
