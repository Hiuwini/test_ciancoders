@extends('layouts.master')
@section('before-css')
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">

@endsection

@section('main-content')
   <div class="breadcrumb">
                <h1>Notas</h1>
                <ul>
                    <li>{{$courses->name}}</li>
                    <li><a href="/">Inicio</a></li>
                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
            
            <div class="col-md-12">
                
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th style="width:120px;">Etapa 1</th>
                                        <th style="width:120px;">Etapa 2</th>
                                        <th style="width:120px;">Etapa 3</th>
                                        <th style="width:120px;">Etapa 4</th>
                                    </tr>
                                </thead>    
                                <tbody>
                                    @foreach ($assignments as $key=>$a)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $a->firstname}}</td>
                                        <td>{{ $a->lastname }}</td>
                                        <td>{{$u1[$key]->score}}</td>
                                        <td>{{$u2[$key]->score}}</td>
                                        <td>{{$u3[$key]->score}}</td>
                                        <td>{{$u4[$key]->score}}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            <div class="col-md-12">
                                <a href="{{ route('dashboard') }}" class="btn btn-info">Regresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection

@section('page-js')
<script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>

@endsection

@section('bottom-js')
<script src="{{asset('assets/js/form.basic.script.js')}}"></script>


@endsection
