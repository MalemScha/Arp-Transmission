<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Line;
use App\Location;
use App\Question;
use App\Report;
use App\Tower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;

class TowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tower = Tower::with('line:id,name')->latest()->paginate(10);

        return $tower;
        if ($tower) {
            return response([
                'message' => 'Tower Loaded',
                'tower'    => $tower,
                'success' => 1
            ]);
        }
        return response([
            'message' => 'Sorry! Failed to add Line',
            'success' => 0
        ]);
    }

    public function allReports()
    {
        $tower = Report::with('tower:id,name')->latest()->paginate(10);

        return $tower;
    }

    public function allLines()
    {
        $lines = Line::latest()->paginate(10);

        return $lines;
    }

    public function lines()
    {
        $towers = Line::select('id as key', 'name as value')->get();
        foreach ($towers as $tower) {
            $tower->key = (string)$tower->key;
        }
        return $towers;
        if ($tower) {
            return response([
                'message' => 'Tower Loaded',
                'tower'    => $tower,
                'success' => 1
            ]);
        }
        return response([
            'message' => 'Sorry! Failed to add Line',
            'success' => 0
        ]);
    }

    public function towers()
    {
        $towers = Tower::select('id as key', 'name as value', 'tower_id')->get();
        foreach ($towers as $tower) {
            $tower->key = (string)$tower->key;
            $tower->value = $tower->tower_id . " - " . $tower->value;
        }
        return $towers;
        if ($tower) {
            return response([
                'message' => 'Tower Loaded',
                'tower'    => $tower,
                'success' => 1
            ]);
        }
        return response([
            'message' => 'Sorry! Failed to add Line',
            'success' => 0
        ]);
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
    public function storeLine(Request $request)
    {
        $request->validate(
            [
                'name'     => 'required | string ',
                'start'    => 'required | string',
                'end' => 'required | string',
                'slat' => 'required | string',
                'elat'     => 'required | string',
                'slong' => 'required | string',
                'elong'     => 'required | string'
            ],
            [
                'start.required' => 'Start location name is required.',
                'end.required' => 'End location name is required.',
                'elat.required' => 'End co-ordinate is required.',
                'slat.required' => 'Start co-ordinate is required.',
                'elong.required' => 'End co-ordinate is required.',
                'slong.required' => 'Start co-ordinate is required.',
            ]
        );
        // dd($request);

        $user = 1;
        $slocation = Location::create([
            'name'     => $request->start,
            'user_id'    => $user,
            'longitude'    => $request->slong,
            'latitude' => $request->slat,
        ]);
        $elocation = Location::create([
            'name'     => $request->end,
            'user_id'    => $user,
            'longitude'    => $request->elong,
            'latitude' => $request->elat,
        ]);
        // store user information 
        $line = Line::create([
            'name'     => $request->name,
            'user_id'    => $user,
            'start_location_id'    => $slocation->id,
            'end_location_id' => $elocation->id,
            'line_id' => "tachak"
        ]);

        $line->update(['line_id' => 'TRN-L-' . $line->id]);

        if ($line) {
            return response([
                'message' => 'Line added succesfully!',
                'line'    => $line,
                'slocation'    => $slocation,
                'elocation'    => $elocation,
                'success' => 1
            ]);
        }

        return response([
            'message' => 'Sorry! Failed to add Line',
            'success' => 0
        ]);
    }

    public function generate(Request $request)
    {

        $request->validate(
            [
                'lat'     => 'required | string',
                'long' => 'required | string',
                'q1'     => 'required | boolean',
                'q2'     => 'required | boolean',
                'q3'     => 'required | numeric',
                'q6'     => 'required | numeric',
                'q4'     => 'required | boolean',
                'q5'     => 'required | boolean',
                'q7'     => 'required | boolean',
                'q8'     => 'required | boolean',
                'q9'     => 'required | boolean',
                'q10'     => 'required | boolean',

            ],
            [
                'q1.required' => 'Question mark * is required.',
                'q2.required' => 'Question mark * is required.',
                'q3.required' => 'Question mark * is required.',
                'q4.required' => 'Question mark * is required.',
                'q5.required' => 'Question mark * is required.',
                'q6.required' => 'Question mark * is required.',
                'q7.required' => 'Question mark * is required.',
                'q8.required' => 'Question mark * is required.',
                'q9.required' => 'Question mark * is required.',
                'q10.required' => 'Question mark * is required.',
                'lat.required' => 'Co-ordinate is required.',
                'long.required' => 'Co-ordinate is required.',
            ]
        );
        // dd($request); image

        $user = 1;
        //get tower
        $tower = Tower::where('id', $request->tower_id)->first();


        //handle image

        $report = Report::create([
            'tower_id'     => $request->tower_id,
            'user_id'    => $user,
            'location_id' => $tower->location->id,
            'image' => "default",
            'q1' => $request->q1,
            'q2' => $request->q2,
            'q3' => $request->q3,
            'q4' => $request->q4,
            'q5' => $request->q5,
            'q6' => $request->q6,
            'q7' => $request->q7,
            'q8' => $request->q8,
            'q9' => $request->q9,
            'q10' => $request->q10,
        ]);
        // dd($report);
        // $report->update(['line_id' => 'TRN-L-' . $line->id]);

        if ($request->q11) {
            $request->validate(
                [
                    'q11'     => 'numeric',
                ],
                [
                    'q11.numeric' => 'Question 11 should be numeric.',
                ]
            );
            $report->update(['q11' => $request->q11]);
        }

        if ($request->q12) {
            $request->validate(
                [
                    'q12'     => 'numeric',
                ],
                [
                    'q12.numeric' => 'Question 12 should be numeric.',
                ]
            );
            $report->update(['q12' => $request->q12]);
        }

        if ($request->q13) {
            $request->validate(
                [
                    'q13'     => 'numeric',
                ],
                [
                    'q13.numeric' => 'Question 13 should be numeric.',
                ]
            );
            $report->update(['q13' => $request->q13]);
        }
        if ($request->q14) {
            $request->validate(
                [
                    'q14'     => 'numeric',
                ],
                [
                    'q14.numeric' => 'Question 14 should be numeric.',
                ]
            );
            $report->update(['q14' => $request->q14]);
        }
        if ($request->q15) {
            $request->validate(
                [
                    'q15'     => 'numeric',
                ],
                [
                    'q15.numeric' => 'Question 15 should be numeric.',
                ]
            );
            $report->update(['q15' => $request->q15]);
        }
        if ($request->q16) {
            $request->validate(
                [
                    'q16'     => 'numeric',
                ],
                [
                    'q16.numeric' => 'Question 16 should be numeric.',
                ]
            );
            $report->update(['q16' => $request->q16]);
        }
        if ($request->q17) {
            $request->validate(
                [
                    'q17'     => 'numeric',
                ],
                [
                    'q17.numeric' => 'Question 17 should be numeric.',
                ]
            );
            $report->update(['q17' => $request->q17]);
        }
        if ($request->q18) {
            $request->validate(
                [
                    'q18'     => 'numeric',
                ],
                [
                    'q18.numeric' => 'Question 18 should be numeric.',
                ]
            );
            $report->update(['q18' => $request->q18]);
        }
        if ($request->q19) {
            $request->validate(
                [
                    'q19'     => 'numeric',
                ],
                [
                    'q19.numeric' => 'Question 19 should be numeric.',
                ]
            );
            $report->update(['q19' => $request->q19]);
        }
        if ($request->q20) {
            $request->validate(
                [
                    'q20'     => 'numeric',
                ],
                [
                    'q20.numeric' => 'Question 20 should be numeric.',
                ]
            );
            $report->update(['q20' => $request->q20]);
        }


        if ($report) {
            return response([
                'message' => 'Report generated succesfully!',
                'report'    => $report,
                'success' => 1
            ]);
        }

        return response([
            'message' => 'Sorry! Failed to generate report.',
            'success' => 0
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'     => 'required | string ',
                'location'    => 'required | string',
                'long' => 'required | string',
                'lat' => 'required | string',
                'line_id'     => 'required | string'
            ],
            [
                'line_id.required' => 'Select a line.',
                'lat.required' => 'Co-ordinate is required.',
                'long.required' => 'Co-ordinate is required.',
            ]
        );
        // dd($request);

        $user = 1;
        $location = Location::create([
            'name'     => $request->location,
            'user_id'    => $user,
            'longitude'    => $request->long,
            'latitude' => $request->lat,
        ]);
        // store user information 
        $tower = Tower::create([
            'name'     => $request->name,
            'user_id'    => $user,
            'location_id'    => $location->id,
            'line_id' => $request->line_id,
            'tower_id' => "tachak"
        ]);

        $tower->update(['tower_id' => 'TRN-T-' . $tower->id]);

        if ($tower) {
            return response([
                'message' => 'Tower added succesfully!',
                'tower'    => $tower,
                'location'    => $location,
                'success' => 1
            ]);
        }

        return response([
            'message' => 'Sorry! Failed to add Tower',
            'success' => 0
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tower $tower)
    {
        return $tower->load('user:id,name','reports' ,'location', 'line:id,line_id,name');
    }

    public function showLine(Line $line)
    {
        return $line->load('user:id,name');
    }
    public function showReport(Report $report)
    {
        return $report->load('user:id,name', 'tower');
    }
    public function getQuestions(){
        $q = Question::where('id',1)->first();
        return $q;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
