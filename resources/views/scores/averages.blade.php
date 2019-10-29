@extends('layouts.master')
@section('before-css')
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">

 <style>thead input {
    width: 100%;
}</style>

@endsection

@section('main-content')
   <div class="breadcrumb">
                <h1>Promedios</h1>
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
                            <table id="averages" class="display table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr style="background: #26222a;">
                                        <th style="background: #26222a;">No.</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Etapa 1</th>
                                        <th>Etapa 2</th>
                                        <th>Etapa 3</th>
                                        <th>Etapa 4</th>
                                        <th><b>Promedio</b></th>
                                    </tr>
                                </thead>    
                                <tbody>
                                    @foreach ($assignments as $key=>$a)
                                    <tr style="background: #26222a;">
                                        <td style="background: #26222a;">{{ $key+1 }}</td>
                                        <td>{{ $a->firstname}}</td>
                                        <td>{{ $a->lastname }}</td>
                                        <td>{{$u1[$key]->score}}</td>
                                        <td>{{$u2[$key]->score}}</td>
                                        <td>{{$u3[$key]->score}}</td>
                                        <td>{{$u4[$key]->score}}</td>
                                        <td><b>{{(($u1[$key]->score + $u2[$key]->score + $u3[$key]->score +$u4[$key]->score)/4)}}</b></td>

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

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>

<script>
    var table = $('#averages').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
</script>
@endsection

@section('bottom-js')
<script src="{{asset('assets/js/form.basic.script.js')}}"></script>


@endsection
