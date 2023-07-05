@extends('layouts.main') 
@section('title', 'Dashboard')
@section('content')
@push('head')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
@endpush

    <div class="container-fluid">
    	<div class="row">
    		<!-- page statustic chart start -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-red text-white">
                    <a href="{{url('users')}}" style="color: white;" class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{$userCount}}</h4>
                                <p class="mb-0">{{ __('Users')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="ik ik-user f-30"></i>
                            </div>
                        </div>
                        <div id="Widget-line-chart1" class="chart-line chart-shadow"></div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-blue text-white">
                    <a href="{{url('line')}}" style="color: white;" class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{$linesCount}}</h4>
                                <p class="mb-0">{{ __('Robert')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="ik ik-git-pull-request f-30"></i>
                            </div>
                        </div>
                        <div id="Widget-line-chart2" class="chart-line chart-shadow" ></div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-green text-white">
                    <a href="{{url('tower')}}" style="color: white;" class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{$towersCount}}</h4>
                                <p class="mb-0">{{ __('Towers')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="material-icons f-30">
                                    cell_tower</i>
                            </div>
                        </div>
                        <div id="Widget-line-chart3" class="chart-line chart-shadow"></div>
                    </a>
                </div>
            </div>
            <!-- page statustic chart end -->
    	</div>
    </div>
	
@endsection