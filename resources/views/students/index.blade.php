@extends('layouts.master')
@section('before-css')
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">


@endsection

@section('main-content')
   <div class="breadcrumb">
                <h1>Alumnos</h1>
                <ul>
                    <li>Alumnos</li>
                    <li><a href="/">Inicio</a></li>
                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
            
            <div class="col-md-12">
                <div class="col-md-4">
                <a href="{{ route('students.create') }}"><button type="button" class="btn btn-primary btn-block m-1 mb-3" >
                        <i class="nav-icon i-Administrator"></i> Nuevo alumno
                    </button></a>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Matricula</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>    
                                <tbody>
                                    @foreach ($students as $key=>$student)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $student->firstname}}</td>
                                        <td>{{ $student->lastname }}</td>
                                        <td>{{ $student->matricula}}</td>
                                        <td>{{ $student->birth_date}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn bg-white _r_btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="_dot _inline-dot bg-primary"></span>
                                                    <span class="_dot _inline-dot bg-primary"></span>
                                                    <span class="_dot _inline-dot bg-primary"></span>
                                                </button>
                                                <div class="dropdown-menu" x-placement="bottom-start">
                                                    <a class="dropdown-item" href="{{ url("/students/edit/$student->id") }}">Actualizar</a>
                                                    <div class="dropdown-divider"></div>
                                                    
                                                    <form action="{{ url("/student/$student->id") }}" method="post">
                                                        <input class="dropdown-item" type="submit" value="Eliminar" />
                                                        <input type="hidden" name="_method" value="delete" />
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    </form>
                                                
                                                </div>
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

@endsection

@section('page-js')
<script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>



@endsection

@section('bottom-js')
<script src="{{asset('assets/js/form.basic.script.js')}}"></script>


@endsection
