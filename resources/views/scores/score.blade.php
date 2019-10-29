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
                                        <td><input type="number" class="form-control form-control-rounded unity_1" id="s_{{$u1[$key]->id}}" value="{{$u1[$key]->score}}"></td>
                                        <td><input type="number" class="form-control form-control-rounded unity_2" id="s_{{$u2[$key]->id}}" value="{{$u2[$key]->score}}"></td>
                                        <td><input type="number" class="form-control form-control-rounded unity_3" id="s_{{$u3[$key]->id}}" value="{{$u3[$key]->score}}"></td>
                                        <td><input type="number" class="form-control form-control-rounded unity_4" id="s_{{$u4[$key]->id}}" value="{{$u4[$key]->score}}"></td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            <div class="col-md-12">
                                <button id="submit_scores" class="btn btn-success">Guardar</button>
                                <a href="{{ route('scores.index') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
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
    $('#submit_scores').click(function(){
        var unit1 = [];
        var unit2 = [];
        var unit3 = [];
        var unit4 = [];

        $.each($('input.unity_1'), function(key,value){
            var id = value.id;
            id = id.replace('s_','');
            var score = (value.value == '') ? 0: value.value;
            var temp = {'score_id': id, 'score': score};
            unit1.push(temp);
        });

        $.each($('input.unity_2'), function(key,value){
            var id = value.id;
            id = id.replace('s_','');
            var score = (value.value == '') ? 0: value.value;
            var temp = {'score_id': id, 'score': score};
            unit2.push(temp);
        });

        $.each($('input.unity_3'), function(key,value){
            var id = value.id;
            id = id.replace('s_','');
            var score = (value.value == '') ? 0: value.value;
            var temp = {'score_id': id, 'score': score};
            unit3.push(temp);
        });

        $.each($('input.unity_4'), function(key,value){
            var id = value.id;
            id = id.replace('s_','');
            var score = (value.value == '') ? 0: value.value;
            var temp = {'score_id': id, 'score': score};
            unit4.push(temp);
        });

        $.ajax({
                url: "/score/"+JSON.stringify(unit1)+"/"+JSON.stringify(unit2)+"/"+JSON.stringify(unit3)+"/"+JSON.stringify(unit4),
                type: "GET",
                success: function(data) {
                    location.reload();
                },
                error: function(data){
                    console.log(data);
                }
            });

        
            
        
    });
});
</script>

@endsection

@section('bottom-js')
<script src="{{asset('assets/js/form.basic.script.js')}}"></script>


@endsection
