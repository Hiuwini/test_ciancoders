@extends('layouts.master')
@section('main-content')
<div class="breadcrumb">
    <h1>Bienvenido</h1>
    <ul>
        <li><a href="">Dashboard</a></li>
        <li>Principal</li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row">
    <!-- ICON BG -->
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-MaleFemale"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0">Alumnos</p>
                    <p class="text-primary text-24 line-height-1 mb-2">{{$students}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Professor"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0">Catedraticos</p>
                    <p class="text-primary text-24 line-height-1 mb-2">{{$professors}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Book"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0">Materias</p>
                    <p class="text-primary text-24 line-height-1 mb-2">{{$courses}}</p>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection

@section('page-js')
<script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
<script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
<script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>

@endsection