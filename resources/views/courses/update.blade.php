@extends('layouts.master')
@section('before-css')
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />


@endsection

@section('main-content')
   <div class="breadcrumb">
                <h1>Actualizar</h1>
                <ul>
                    <li>Materia</li>
                    <li><a href="/">Inicio</a></li>
                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Actualizar Materia</div>
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach                                     
                                </ul>                                  
                            </div> 
                            @endif
                        <form class="needs-validation" novalidate method="POST" action="{{ url('/course') }}">
                            @csrf
                            @method('PUT')
                                <div class="row">
                                    <input type="hidden" name="id" value="{{$course->id}}">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control form-control-rounded" 
                                            name="name" id="name" placeholder="Ingrese de materia" required value="{{$course->name}}">
                                    </div>

                                    <div class="col-md-6 form-group mb-3">                                    
                                        <label for="professor_id">Catedratico</label>
                                        <select class="form-control form-control-rounded" id="professor_id" name="professor_id" required>
                                            <option selected disabled>-- Elegir catedratico --</option>
                                            @foreach ($professors as $professor)
                                                <option value="{{ $professor->id }}" {{ ($professor->id == $course->professor_id) ? 'selected':''  }}>
                                                    {{ $professor->firstname }} {{ $professor->lastname }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
 
                                    <div class="col-md-12">
                                         <button class="btn btn-success" type="submit">Actualizar Materia</button>
                                    <a href="{{ route('courses.index') }}" class="btn btn-danger">Cancelar</a>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('#professor_id').select2();
});
</script>

@endsection

@section('bottom-js')

<script src="{{asset('assets/js/form.basic.script.js')}}"></script>
<script src="{{asset('assets/js/form.validation.script.js')}}"></script>

@endsection