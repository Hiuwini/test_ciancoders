@extends('layouts.master')
@section('before-css')
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">


@endsection

@section('main-content')
   <div class="breadcrumb">
                <h1>Nuevo</h1>
                <ul>
                    <li>Catedraticos</li>
                    <li><a href="/">Inicio</a></li>
                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Nuevo Catedratico</div>
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach                                     
                                </ul>                                  
                            </div> 
                            @endif
                        <form id="form_professor" class="needs-validation" novalidate method="POST" onsubmit="return false;" action="{{ url('/professor') }}">
                            {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="firstName">Nombres</label>
                                        <input type="text" class="form-control form-control-rounded" 
                                            name="firstname" id="firstname" placeholder="Ingrese nombres" required>
                                    </div>
                                    
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="lastName">Apellidos</label>
                                        <input type="text" class="form-control form-control-rounded" 
                                            name="lastname" id="lastname" placeholder="Ingrese apellidos" required>
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="password">Contraseña</label>
                                        <input id="password" class="form-control form-control-rounded" 
                                            name="password" type="password" required>
                                        <a id="generate_pass" class="btn btn-info">Generar</a>
                                    </div>
                                    
                                    <div class="col-md-12">
                                         <button id="submit_form" class="btn btn-success" type="submit">Crear Catedratico</button>
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

<script>
$(document).ready(function() {
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#generate_pass').click(function(){
    $('#password').val(randomPassword(10));
});
$('#submit_form').click(function(){
    var credentials = [];
    var user = $('#firstname').val() + $('#lastname').val();
    var pass = $('#password').val();
    
    var username = $.trim(user.toLowerCase());
    var txt = "Username: "+username+"\nPassword: "+pass;

    download('credentials.txt',txt);
    
    $('#form_professor').prop('onsubmit','');
    $('#form_professor').submit();

});

function randomPassword(length) {
    var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    return pass;
}

});

function download(filename, text) {
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);

    element.style.display = 'none';
    document.body.appendChild(element);

    element.click();

    document.body.removeChild(element);
}
       
</script>


@endsection

@section('bottom-js')

<script src="{{asset('assets/js/form.basic.script.js')}}"></script>
<script src="{{asset('assets/js/form.validation.script.js')}}"></script>

@endsection