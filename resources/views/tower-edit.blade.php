@extends('layouts.main') 
@section('title', 'Add Tower')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    @endpush

    
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Edit Tower')}}</h5>
                            <span>{{'Edit '.$tower->name}}</span>
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
                                <a href="#">{{ __('Edit Tower')}}</a>
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
                        <h3>{{ __('Edit tower')}}</h3>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ url('tower/update/'.$tower->id) }}" >
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="line_id">{{ __('Select Line')}}<span class="text-red">*</span></label>

                                        <select id="line-select" class="form-control select2" name="line_id">
                                            <option></option>
                                            @foreach ($lines as $line)
                                                <option value="{{$line->id}}"
                                                    @if ($tower->line_id == $line->id)
                                                        selected="selected"
                                                    @endif                 
                                                    >{{$line->name}}</option>
                                            @endforeach
                                            
                                          </select>                                        
                                    </div>

                                    <div id="prev-tower" class="form-group">
                                        <label for="prev">{{ __('Previous Tower')}}</label>

                                        <select id="prev" class="form-control select2" name="prev">
                                            <option></option>
                                          </select>
                                        <div class="help-block with-errors" ></div>

                                        @error('prev')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="name">{{ __('Tower Name')}}<span class="text-red">*</span></label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ clean($tower->name, 'titles')}}" placeholder="Enter tower name" required>
                                        <div class="help-block with-errors"></div>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="location">{{ __('Location Name')}}<span class="text-red">*</span></label>
                                        <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ clean($tower->location->name, 'titles')}}" placeholder="Enter location name" required>
                                        <div class="help-block with-errors"></div>

                                        @error('location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="long">{{ __('Longitude')}}<span class="text-red">*</span></label>
                                        <input id="long" step="any" type="number" class="form-control @error('long') is-invalid @enderror" name="long" value="{{ clean($tower->location->longitude, 'titles')}}" placeholder="Enter longitude" required>
                                        <div class="help-block with-errors" ></div>

                                        @error('long')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="lat">{{ __('Latitute')}}<span class="text-red">*</span></label>
                                        <input id="lat" step="any" type="number" class="form-control @error('lat') is-invalid @enderror" name="lat" value="{{ clean($tower->location->latitude, 'titles')}}" placeholder="Enter latitute" required>
                                        <div class="help-block with-errors" ></div>

                                        @error('lat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="type">{{ __('Tower Type')}}<span class="text-red">*</span></label>
                                        <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ clean($tower->type, 'titles')}}" placeholder="Enter tower type" required>
                                        <div class="help-block with-errors" ></div>
    
                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> 

                                    <div class="form-group">
                                        <label for="tension">{{ __('Tension/Suspension Type')}}<span class="text-red">*</span></label>
                                        <input id="tension" tension="text" class="form-control @error('tension') is-invalid @enderror" name="tension" value="{{ clean($tower->tension, 'titles')}}" placeholder="Enter tower tension/suspension type" required>
                                        <div class="help-block with-errors" ></div>
    
                                        @error('tension')
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
    </div>
    <!-- push external js -->
    @push('script') 
        <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
         <!--get role wise permissiom ajax script-->
        {{-- <script src="{{ asset('js/get-role.js') }}"></script> --}}
        <script>
                $('#line-select').select2({
                        placeholder: "Select line"
                    });

                    $.ajax({
                        url : "{{ route('get-prev-tower') }}",
                        type: 'get',
                        data: {
                            id : '{{$tower->line_id}}',
                        },
                        success: function(res)
                        {
                            var towers = res.towers;
                        
                            towers.unshift({id: 0, text: 'None'});
                            // towers.unshift({id: -1, text: 'Add to last'});
                            towers.unshift({id: '', text: ''});
                            // console.log(towers);
                            $("#prev").select2({data: towers});
                            // $("#prev").val("val2").change();

                        $('#prev').select2({
                        placeholder: "Select previous tower"
                    });
                        },
                        error: function()
                        {
                            alert('failed...');

                        }
                    });

                $eventSelect = $('#line-select');
                $eventSelect.on("select2:select", function (e) {
                    $('#prev').empty();
                    
                    var data = e.params.data;

                    $.ajax({
                        url : "{{ route('get-prev-tower') }}",
                        type: 'get',
                        data: {
                            id : data.id,
                        },
                        success: function(res)
                        {
                            var towers = res.towers;
                        
                            towers.unshift({id: 0, text: 'None'});
                            // towers.unshift({id: -1, text: 'Add to last'});
                            towers.unshift({id: '', text: ''});
                            // console.log(towers);
                            $("#prev").select2({data: towers});

                        $('#prev').select2({
                        placeholder: "Select previous tower"
                    });
                        },
                        error: function()
                        {
                            alert('failed...');

                        }
                    });

                    
                    
                    });
        </script>
    @endpush
@endsection
