@extends('layouts.main') 
@section('title', 'Email Scheduling')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/jquery-minicolors/jquery.minicolors.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datedropper/datedropper.min.css') }}">
    @endpush

    
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Email Scheduling')}}</h5>
                            <span>{{ __('Scheduling email to recipients')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Add email schedule')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h3>{{ __('Add email schedule')}}</h3>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('create-schedule') }}" >
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="sel">{{ __('Select tower or lines')}}<span class="text-red">*</span></label>

                                        <select id="sel"  class="form-control @error('sel') is-invalid @enderror" select2" name="sel">
                                            <option></option>
                                            <option value="line">Line</option>
                                            <option value="tower">Tower</option>
                                          </select>  
                                          <div class="help-block with-errors"></div>
                                          @error('sel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror   
                                        @error('line_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                    @error('tower_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror                                   
                                    </div> 

                                    <div id="tower" class="form-group hide">
                                        <label for="tower_id">{{ __('Select Tower')}}<span class="text-red">*</span></label>

                                        <select id="user-select" class="form-control select2" name="tower_id">
                                            <option></option>
                                            @foreach ($towers as $tower)
                                                <option value="{{$tower->id}}">{{$tower->tower_id.' -- '.$tower->name}}</option>
                                            @endforeach
                                            
                                          </select> 
                                                                                 
                                    </div> 
                                    
                                    <div id="line" class="form-group hide">
                                        <label for="line_id">{{ __('Select Line')}}<span class="text-red">*</span></label>

                                        <select id="line-select" class="form-control select2" name="line_id">
                                            <option></option>
                                            <option value="all">All</option>
                                            @foreach ($lines as $line)
                                                <option value="{{$line->id}}">{{$line->line_id.' -- '.$line->name}}</option>
                                            @endforeach
                                            
                                          </select>  
                                                                               
                                    </div> 

                                    <div class="form-group">
                                        <label for="month">{{ __('Select Month')}}<span class="text-red">*</span></label>
                                     
                                        <input name="month" class="form-control @error('month') is-invalid @enderror" type="month" />
                                        <div class="help-block with-errors"></div>
                                        @error('month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                    </div>

                                    <div class="form-group">
                                        <label for="schedule">{{ __('Schedule Time')}}<span class="text-red">*</span></label>
                                        <input name="schedule" class="form-control @error('schedule') is-invalid @enderror" type="datetime-local" />
                                        <div class="help-block with-errors"></div>
                                        @error('schedule')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                    </div>
                                    
                                </div>
                                      
                            </div>
                                
                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">{{ __('Submit')}}</button>
                                    </div>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-header"><h3>{{ __('Schedules')}}</h3></div>
                    <div class="card-body">
                        <table id="user_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Schedule Time')}}</th>
                                    <th>{{ __('Data')}}</th>
                                    <th>{{ __('Month')}}</th>
                                    <th>{{ __('Status')}}</th>
                                    <th>{{ __('Action')}}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>
                                            {{\Carbon\Carbon::parse($schedule->schedule)->toCookieString() }}
                                        </td>
                                        <td>
                                            {{$schedule->tower_id ? ($schedule->tower->tower_id."-".$schedule->tower->name):(($schedule->line_id=="all") ? ("All Lines"):($schedule->line->line_id."-".$schedule->line->name))}}
                                        </td>
                                        <td>
                                            {{$schedule->month}}
                                        </td>
                                        <td>
                                            {{$schedule->sent ? "Sent":"Not Sent"}}
                                        </td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="{{url('email/schedule/delete/'.$schedule->id)}}"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script') 
        <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
        <script src="{{ asset('plugins/moment/moment.js') }}"></script>
        <script src="{{ asset('plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-minicolors/jquery.minicolors.min.js') }}"></script>
        <script src="{{ asset('plugins/datedropper/datedropper.min.js') }}"></script>
        <script src="{{ asset('js/form-picker.js') }}"></script>
         <!--get role wise permissiom ajax script-->
        {{-- <script src="{{ asset('js/get-role.js') }}"></script> --}}
        <script>

                $('#sel').select2({
                    placeholder: "Select line"
                });
                $('#user-select').select2({
                        placeholder: "Select tower"
                    }); 
                $('#line-select').select2({
                    placeholder: "Select line"
                });
                $eventSelect = $('#sel');
                $eventSelect.on("select2:select", function (e) {
                    
                    var data = e.params.data;
                    if (data.id == "tower") {
                        $("#tower").removeClass("hide");
                        $("#line").addClass("hide");

                    } else {
                        $("#line").removeClass("hide");
                        $("#tower").addClass("hide");
                    }
                        
                    });      
        </script>
    @endpush
@endsection
