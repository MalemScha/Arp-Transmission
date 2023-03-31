@extends('layouts.main') 
@section('title', 'Add Line')
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
                            <h5>{{ __('Add Line')}}</h5>
                            <span>{{ __('Create new line')}}</span>
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
                                <a href="#">{{ __('Add Line')}}</a>
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
                        <h3>{{ __('Add line')}}</h3>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('create-line') }}" >
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="name">{{ __('Name')}}<span class="text-red">*</span></label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" placeholder="Enter line name" required>
                                        <div class="help-block with-errors"></div>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="start">{{ __('Start Location Name')}}<span class="text-red">*</span></label>
                                        <input id="start" type="text" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ old('start') }}" placeholder="Enter start location name" required>
                                        <div class="help-block with-errors" ></div>

                                        @error('start')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="slong">{{ __('Start Location Longitude')}}<span class="text-red">*</span></label>
                                        <input id="slong" step="any" type="number" class="form-control @error('slong') is-invalid @enderror" name="slong" value="{{ old('slong') }}" placeholder="Enter start location longitude" required>
                                        <div class="help-block with-errors" ></div>

                                        @error('slong')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="slat">{{ __('Start Location Latitute')}}<span class="text-red">*</span></label>
                                        <input id="slat" step="any" type="number" class="form-control @error('slat') is-invalid @enderror" name="slat" value="{{ old('slat') }}" placeholder="Enter start location latitute" required>
                                        <div class="help-block with-errors" ></div>

                                        @error('slat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    

                                    <div class="form-group">
                                        <label for="end">{{ __('End Location Name')}}<span class="text-red">*</span></label>
                                        <input id="end" type="text" class="form-control @error('end') is-invalid @enderror" name="end" value="{{ old('end') }}" placeholder="Enter end location name" required>
                                        <div class="help-block with-errors" ></div>

                                        @error('end')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="elong">{{ __('End Location Longitude')}}<span class="text-red">*</span></label>
                                        <input id="elong" step="any" type="number" class="form-control @error('elong') is-invalid @enderror" name="elong" value="{{ old('elong') }}" placeholder="Enter end location longitude" required>
                                        <div class="help-block with-errors" ></div>

                                        @error('elong')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="elat">{{ __('End Location Latitute')}}<span class="text-red">*</span></label>
                                        <input id="elat" step="any" type="number" class="form-control @error('elat') is-invalid @enderror" name="elat" value="{{ old('elat') }}" placeholder="Enter end location latitute" required>
                                        <div class="help-block with-errors" ></div>

                                        @error('elat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>        
                                </div>
                                <div class="col-md-6">
                                    <!-- Assign role & view role permisions -->
                                    <div class="form-group">
                                        <label for="voltage">{{ __('Voltage Level')}}<span class="text-red">*</span></label>
                                        <input id="voltage" step="any" type="number" class="form-control @error('voltage') is-invalid @enderror" name="voltage" value="{{ old('voltage') }}" placeholder="Enter voltage level" required>
                                        <div class="help-block with-errors" ></div>

                                        @error('voltage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="circuit">{{ __('Circuit Type')}}<span class="text-red">*</span></label>

                                        <select id="circuit" class="form-control select2" name="circuit">
                                            <option></option>
                                            <option value="Single Circuit">Single Circuit</option>
                                            <option value="Double Circuit">Double Circuit</option>
                                          </select>
                                        <div class="help-block with-errors" ></div>

                                        @error('circuit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="length">{{ __('Length of Line')}}<span class="text-red">*</span></label>
                                        <input id="length" step="any" type="number" class="form-control @error('length') is-invalid @enderror" name="length" value="{{ old('length') }}" placeholder="Enter line length" required>
                                        <div class="help-block with-errors" ></div>

                                        @error('length')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="conductor">{{ __('Conductor Type')}}<span class="text-red">*</span></label>
                                        <input id="conductor" type="text" class="form-control @error('conductor') is-invalid @enderror" name="conductor" value="{{ old('conductor') }}" placeholder="Enter conductor type" required>
                                        <div class="help-block with-errors" ></div>

                                        @error('conductor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
            $('select').select2({
    placeholder: "Select circuit type"
});
        </script>
    @endpush
@endsection
