@extends('layouts.master')
@section('before-css')
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">


@endsection

@section('main-content')
   <div class="breadcrumb">
                <h1>Actualizar</h1>
                <ul>
                    <li>Catedratico</li>
                    <li><a href="/">Inicio</a></li>
                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Actualizar Catedratico</div>
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach                                     
                                </ul>                                  
                            </div> 
                            @endif
                        <form class="needs-validation" novalidate method="POST" action="{{ url('/professor') }}">
                            @csrf
                            @method('PUT')
                                <div class="row">
                                    <input type="hidden" name="id" value="{{$professor->id}}">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="firstName">Nombres</label>
                                        <input type="text" class="form-control form-control-rounded" 
                                            name="firstname" id="firstname" placeholder="Ingrese nombres" value="{{$professor->firstname}}" required>
                                    </div>
                                    
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="lastName">Apellidos</label>
                                        <input type="text" class="form-control form-control-rounded" 
                                            name="lastname" id="lastname" placeholder="Ingrese apellidos" value="{{$professor->lastname}}" required>
                                    </div>

                                    
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="password">Contraseña</label>
                                        <input id="password" class="form-control form-control-rounded" 
                                            name="password" type="password" required>
                                    </div>
                                    
                                    <div class="col-md-12">
                                         <button class="btn btn-success" type="submit">Actualizar Catedratico</button>
                                    <a href="{{ route('professors.index') }}" class="btn btn-danger">Cancelar</a>
                                    </div>
                                </div>
                            </form>
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
<script src="{{asset('assets/js/form.validation.script.js')}}"></script>

@endsection