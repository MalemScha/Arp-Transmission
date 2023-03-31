@extends('layouts.main') 
@section('title', 'Threshold')
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
                            <h5>{{ __('Threshold')}}</h5>
                            <span>{{ __('Edit threshold values')}}</span>
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
                                <a href="#">{{ __('Edit Threshold')}}</a>
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
                        <h3>{{ __('Edit Threshold Values')}}</h3>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('edit-threshold') }}" >
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="threshold">Threshold Value<span class="text-red">*</span></label>
                                        <input id="threshold" step="any" type="number" class="form-control @error('threshold') is-invalid @enderror" name="threshold" value="{{ $threshold->threshold }}" placeholder="Enter threshold" required>
                                        <div class="help-block with-errors"></div>
                                        
                                        @error('threshold')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                        
                                        <div class="form-group">
                                            <label for="q1">{{$question->q1}}<span class="text-red">*</span></label>
                                            <input id="q1" step="any" type="number" class="form-control @error('q1') is-invalid @enderror" name="q1" value="{{ $threshold->q1 }}" placeholder="Enter threshold" required>
                                            <div class="help-block with-errors"></div>
                                            
                                            @error('q1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="q2">{{$question->q2}}<span class="text-red">*</span></label>
                                            <input id="q2" step="any" type="number" class="form-control @error('q2') is-invalid @enderror" name="q2" value="{{ $threshold->q2 }}" placeholder="Enter threshold" required>
                                            <div class="help-block with-errors"></div>
                                            
                                            @error('q2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="q3">{{$question->q3}}<span class="text-red">*</span></label>
                                            <input id="q3" step="any" type="number" class="form-control @error('q3') is-invalid @enderror" name="q3" value="{{ $threshold->q3 }}" placeholder="Enter threshold" required>
                                            <div class="help-block with-errors"></div>
                                            
                                            @error('q3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="q4">{{$question->q4}}<span class="text-red">*</span></label>
                                            <input id="q4" step="any" type="number" class="form-control @error('q4') is-invalid @enderror" name="q4" value="{{ $threshold->q4 }}" placeholder="Enter threshold" required>
                                            <div class="help-block with-errors"></div>
                                            
                                            @error('q4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="q5">{{$question->q5}}<span class="text-red">*</span></label>
                                            <input id="q5" step="any" type="number" class="form-control @error('q5') is-invalid @enderror" name="q5" value="{{ $threshold->q5 }}" placeholder="Enter threshold" required>
                                            <div class="help-block with-errors"></div>
                                            
                                            @error('q5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="q6">{{$question->q6}}<span class="text-red">*</span></label>
                                            <input id="q6" step="any" type="number" class="form-control @error('q6') is-invalid @enderror" name="q6" value="{{ $threshold->q6 }}" placeholder="Enter threshold" required>
                                            <div class="help-block with-errors"></div>
                                            
                                            @error('q6')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="q7">{{$question->q7}}<span class="text-red">*</span></label>
                                            <input id="q7" step="any" type="number" class="form-control @error('q7') is-invalid @enderror" name="q7" value="{{ $threshold->q7 }}" placeholder="Enter threshold" required>
                                            <div class="help-block with-errors"></div>
                                            
                                            @error('q7')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="q8">{{$question->q8}}<span class="text-red">*</span></label>
                                            <input id="q8" step="any" type="number" class="form-control @error('q8') is-invalid @enderror" name="q8" value="{{ $threshold->q8 }}" placeholder="Enter threshold" required>
                                            <div class="help-block with-errors"></div>
                                            
                                            @error('q8')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="q9">{{$question->q9}}<span class="text-red">*</span></label>
                                            <input id="q9" step="any" type="number" class="form-control @error('q9') is-invalid @enderror" name="q9" value="{{ $threshold->q9 }}" placeholder="Enter threshold" required>
                                            <div class="help-block with-errors"></div>
                                            
                                            @error('q9')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="q10">{{$question->q10}}<span class="text-red">*</span></label>
                                            <input id="q10" step="any" type="number" class="form-control @error('q10') is-invalid @enderror" name="q10" value="{{ $threshold->q10 }}" placeholder="Enter threshold" required>
                                            <div class="help-block with-errors"></div>
                                            
                                            @error('q10')
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
    @endpush
@endsection
