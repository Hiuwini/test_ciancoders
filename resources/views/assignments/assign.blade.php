@extends('layouts.master')
@section('before-css')
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">

 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">

 <style>thead input {
    width: 100%;
}</style>

@endsection

@section('main-content')
   <div class="breadcrumb">
                <h1>Asignados</h1>
                <ul>
                    <li>{{$courses->name}}</li>
                    <li><a href="/">Inicio</a></li>
                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
            
            <div class="col-md-12">
                
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Listado de Asignados
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".assign">Buscar Alumnos</button>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Matricula</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>    
                                <tbody>
                                    @foreach ($assign as $key=>$a)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $a->firstname}}</td>
                                        <td>{{ $a->lastname }}</td>
                                        <td>{{ $a->matricula }}</td>
                                        <td>
                                        <form action="/assignment/{{$a->id}}/{{$courses->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="color:white;">Desasignar</button>
                                        </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade assign" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Seleccionar beneficiarios</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <table id="example" class="display table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr style="background: #26222a;">
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Matricula</th>
                                        
                                        <th>Agregar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all as $student)
                                    <tr style="background: #26222a;">
                                        <td style="background: #26222a;">{{ $student->firstname }}</td>
                                        <td>{{ $student->lastname }}</td>
                                        <td>{{ $student->matricula }}</td>
                                        <td>
                                            <label class="checkbox checkbox-primary">
                                                <input type="checkbox" class="adding" value="{{$student->id}}">
                                                <span> Agregar </span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                                
                            </table>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="send_items">Agregar a materia</button>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('page-js')
<script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>


<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>

<script>
$(document).ready(function() {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    // Setup - add a text input to each footer cell
    $('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#example').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
    $('#send_items').click(function(){
        //alert();
        //console.log($("input.adding:checkbox"));
        var inputs = $("input.adding:checked");
        var ids = [];
        ids.push({{$courses->id}});
        $.each(inputs,function(i,val){
            ids.push(val.value);
        });
        
        $.ajax({
                url: "/assignment/"+JSON.stringify(ids),
                type: "GET",
                success: function(data) {
                    location.reload();
                },
                error: function(data){
                    console.log(data);
                }
            });
    });
} );
</script>


@endsection

@section('bottom-js')
<script src="{{asset('assets/js/form.basic.script.js')}}"></script>


@endsection
