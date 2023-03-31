<?php

namespace App\Http\Controllers;

use App\Line;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class LineController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lines');
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
        //
    }

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
                'elong'     => 'required | string',
                'voltage' => 'required | string',
                'circuit'=> 'required | in:Single Circuit,Double Circuit',
                'length'=> 'required | string',
                'conductor'=> 'required | string',
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
        // dd(Auth::user()->id);

        $user = Auth::user()->id;
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
            'line_id' => "tachak",
            'voltage' => $request->voltage,
            'circuit'=> $request->circuit,
            'tower_no'=>0,
            'length'=> $request->length,
            'conductor'=> $request->conductor,
        ]);

        $line->update(['line_id' => 'TRN-L-' . $line->id]);

        if($line){ 
            return redirect()->back()->with('success', 'New line added!');
        }else{
            return redirect()->back()->with('error', 'Failed to create new line! Try again.');
        }
    }

    public function getLineList(Request $request)
    {
        
        $data  = Line::get();

        return Datatables::of($data)
                ->addColumn('action', function($data){
                        return '<div class="table-actions">
                                <a href="'.url('line/edit/'.$data->id).'" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('line');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function edit(Line $line)
    {
        return view('line-edit', compact('line'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Line $line)
    {
        if($line){ 
            $request->validate(
                [
                    'name'     => 'required | string ',
                    'start'    => 'required | string',
                    'end' => 'required | string',
                    'slat' => 'required | string',
                    'elat'     => 'required | string',
                    'slong' => 'required | string',
                    'elong'     => 'required | string',
                    'voltage' => 'required | string',
                    'circuit'=> 'required | in:Single Circuit,Double Circuit',
                    'length'=> 'required | string',
                    'conductor'=> 'required | string',
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
            $slocation   = Location::find($line->start_location_id);
            $elocation   = Location::find($line->end_location_id);
            if($slocation){
                $slocation->update([
                    'name'     => $request->start,
                    'longitude'    => $request->slong,
                    'latitude' => $request->slat,
                ]);
            }
            if($elocation){
                $elocation->update([
                    'name'     => $request->end,
                    'longitude'    => $request->elong,
                    'latitude' => $request->elat,
                ]);
            }
            // store user information 
            $line->update([
                'name'     => $request->name,
                'voltage' => $request->voltage,
                'circuit'=> $request->circuit,
                'length'=> $request->length,
                'conductor'=> $request->conductor,
            ]);

        // $line->update(['line_id' => 'TRN-L-' . $line->id]);

        
            return redirect()->back()->with('success', 'Line updated!');
        }else{
            return redirect()->back()->with('error', 'Failed to update line! Try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function destroy(Line $line)
    {
        //
    }
}
