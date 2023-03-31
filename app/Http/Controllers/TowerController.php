<?php

namespace App\Http\Controllers;

use App\Line;
use App\Location;
use App\Question;
use App\Recipient;
use App\Threshold;
use App\Tower;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;


class TowerController extends Controller
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
        $lines = Line::select('id', 'name')->get();
        // $lines = Line::pluck('name','id');
        // dd($lines);
            return view('towers', compact('lines'));
    }

    public function getPrevTower(Request $request){
        if ($request->id) {
             $towers = Tower::where('line_id', $request->id)->select('tower_id', DB::raw("CONCAT(towers.tower_id,'  ---  ',towers.name) as text"))->orderBy('tower_id', 'desc')->get();
             return response([
                'towers'=> $towers,
             ]);
        }
    }

    public function recipients(){
        $userId = Recipient::pluck('user_id')->all();
        $users = User::whereNotIn('id', $userId)->get();
        $recipients = Recipient::all();
        // $lines = Line::pluck('name','id');
        // dd($lines);
            return view('recipients', compact('users','recipients'));
    }

    public function addRecipients(Request $request){
        $r = Recipient::where('user_id',$request->user_id)->first();
        if($r){
        }else{
            $reci = Recipient::create([
                'user_id'=>$request->user_id,
            ]);
        }
        if ($reci or $r) {
            return redirect()->back()->with('success', 'User added!');
        }else{
            return redirect()->back()->with('error', 'Failed to add user! Try again.');
        }
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


    public function test_substr($str, $delimiter = '-') {
        $idx = strrpos($str, $delimiter);
        return $idx === false ? $str : substr($str, $idx + 1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'     => 'required | string ',
                'location'    => 'required | string',
                'long' => 'required | string',
                'lat' => 'required | string',
                'line_id'     => 'required',
                'type' => 'required | string',
                'tension'=> 'required | string',
            ],
            [
                'line_id.required' => 'Select a line.',
                'lat.required' => 'Co-ordinate is required.',
                'long.required' => 'Co-ordinate is required.',
                'type.required' => 'Tower type is required',
                'tension.required' => 'Tension/suspension type is required'
            ]
        );

        $user = Auth::user()->id;

        $rawPrev = (strtok($request->prev,' '));
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
            'tower_id' => "tachak",
            'type' =>$request->type,
            'tension'=>$request->tension,
        ]);

        $towers = Tower::where('line_id',$request->line_id)->orderBy('tower_id', 'desc')->get();
        // dd($this->test_substr($towers->tower_id));
        if($towers){
            $prev = (int)$this->test_substr($rawPrev);
            if($prev>=0){
                // dd($request->prev);
                
                foreach($towers as $t){
                    $id = (int)$this->test_substr($t->tower_id);
                    if($id > $prev){
                        $t->update(['tower_id' => 'TRN-T-' .$request->line_id.'-'. ($id + 1)]);
                    }
                }
                $tower->update(['tower_id' => 'TRN-T-' .$request->line_id.'-'. ($prev + 1)]);
            }
        }else{
            // dd('1');
            $tower->update(['tower_id' => 'TRN-T-' .$request->line_id.'-'. 1]);
            
        }

        $line = Line::where('id',$request->line_id)->first();
        $line->update(['tower_no' => ($line->tower_no+1)]);

        

        if ($tower) {
            return redirect()->back()->with('success', 'Tower added!');
        }else{
            return redirect()->back()->with('error', 'Failed to add tower! Try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tower  $tower
     * @return \Illuminate\Http\Response
     */
    public function show(Tower $tower)
    {
        return view('tower');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tower  $tower
     * @return \Illuminate\Http\Response
     */
    public function showThreshold()
    {
        $question = Question::where('id',1)->first();
        $threshold = Threshold::where('id',1)->first();
        return view('threshold', compact('question','threshold'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tower  $tower
     * @return \Illuminate\Http\Response
     */
    public function editThreshold(Request $request)
    {
        $request->validate(
            [
                'threshold'     => 'required | numeric',
                'q1'     => 'required | numeric',
                'q2'     => 'required | numeric',
                'q3'     => 'required | numeric',
                'q6'     => 'required | numeric',
                'q4'     => 'required | numeric',
                'q5'     => 'required | numeric',
                'q7'     => 'required | numeric',
                'q8'     => 'required | numeric',
                'q9'     => 'required | numeric',
                'q10'     => 'required | numeric',

            ]
        );
        $threshold = Threshold::where('id',1)->first();
        $threshold->update([
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
            'threshold' => $request->threshold,
        ]);
        if ($threshold) {
            return redirect()->back()->with('success', 'Threshold updated!');
        }else{
            return redirect()->back()->with('error', 'Failed to update threshold! Try again.');
        }
    }

    public function getTowerList(Request $request)
    {
        
        $data  = Tower::get();

        return Datatables::of($data)
                ->addColumn('action', function($data){
                        return '<div class="table-actions">
                                <a href="'.url('tower/edit/'.$data->id).'" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function getRecipientList(Request $request)
    {
        
        $userId = Recipient::pluck('user_id')->all();
        $data = User::whereIn('id', $userId)->get();

        return Datatables::of($data)
                ->addColumn('action', function($data){
                        return '<div class="table-actions">
                                <a href="'.url('tower/edit/'.$data->id).'" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tower  $tower
     * @return \Illuminate\Http\Response
     */
    public function edit(Tower $tower)
    {
        $lines = Line::select('id', 'name')->get();
        $towers = Tower::where('line_id', $tower->line_id)->select('tower_id', DB::raw("CONCAT(towers.tower_id,'  ---  ',towers.name) as text"))->orderBy('tower_id', 'desc')->get();
        return view('tower-edit', compact('tower','lines','towers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tower  $tower
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tower $tower)
    {
        $request->validate(
            [
                'name'     => 'required | string ',
                'location'    => 'required | string',
                'long' => 'required | string',
                'lat' => 'required | string',
                'line_id'     => 'required',
                'type' => 'required | string',
                'tension'=> 'required | string',
            ],
            [
                'line_id.required' => 'Select a line.',
                'lat.required' => 'Co-ordinate is required.',
                'long.required' => 'Co-ordinate is required.',
                'type.required' => 'Tower type is required',
                'tension.required' => 'Tension/suspension type is required'
            ]
        );

        $user = Auth::user()->id;

        $rawPrev = (strtok($request->prev,' '));
        $location   = Location::find($tower->location_id);
        $location->update([
            'name'     => $request->location,
            'user_id'    => $user,
            'longitude'    => $request->long,
            'latitude' => $request->lat,
        ]);
        // store user information 
        $tower->update([
            'name'     => $request->name,
            'user_id'    => $user,
            'location_id'    => $location->id,
            'line_id' => $request->line_id,
            'tower_id' => "tachak",
            'type' =>$request->type,
            'tension'=>$request->tension,
        ]);

        $towers = Tower::where('line_id',$request->line_id)->orderBy('tower_id', 'desc')->get();
        // dd($this->test_substr($towers->tower_id));
        if($towers){
            $prev = (int)$this->test_substr($rawPrev);
            if($prev>=0){
                // dd($request->prev);
                
                foreach($towers as $t){
                    $id = (int)$this->test_substr($t->tower_id);
                    if($id > $prev){
                        $t->update(['tower_id' => 'TRN-T-' .$request->line_id.'-'. ($id + 1)]);
                    }
                }
                $tower->update(['tower_id' => 'TRN-T-' .$request->line_id.'-'. ($prev + 1)]);
            }
        }else{
            // dd('1');
            $tower->update(['tower_id' => 'TRN-T-' .$request->line_id.'-'. 1]);
            
        }
        

        if ($tower) {
            return redirect()->back()->with('success', 'Tower updated!');
        }else{
            return redirect()->back()->with('error', 'Failed to update tower! Try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tower  $tower
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tower $tower)
    {
        //
    }

    public function deleteRecipient(Recipient $recipient)
    {
        // dd($recipient);
        if($recipient){
            $recipient->delete();
            return redirect()->back()->with('success', 'Recipient removed!');
        }else{
            return redirect()->back()->with('error', 'Recipient not found');
        }
    }
}
