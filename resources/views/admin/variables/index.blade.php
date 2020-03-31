@extends('admin.layouts.app')
@section('breadcrumb')
    <ol class="breadcrumb pull-right">
        <li class="active"><a href="javascript:;">Variables</a></li>
    </ol>
@endsection
@section('header')
    Variables <small>Ver todas las variables</small>
    <a class="btn btn-success btn-icon btn-circle btn-sm" href="{{ route('variables.create') }}">
        <i class="fa fa-plus"></i>
    </a>
@endsection
@section('content')
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
                <h4 class="panel-title">Variables Existentes</h4>
            </div>
            <div class="panel-body">
                <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Proyecto</th>
                            <th>Unidades</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($variables as $key => $variable)
                            <tr class=" gradeC">
                                <td>
                                    <a href="{{ route('variables.show', $variable) }}">
                                        {{ $variable->name }}
                                    </a>
                                </td>
                                <td>{{ $variable->project->name }}</td>
                                <td>{{ $variable->units }}</td>
                                <td>
                                    <p>
                                        <a class="btn btn-danger btn-icon btn-circle btn-sm delete" product="{{ $variable->id }}">
                                            <i class="fa fa-times"></i>
                                        </a>
                                        <form class="form{{ $variable->id }}" action="{{ route('variables.destroy', $variable->id) }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end panel -->
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $('#data-table').DataTable({
            responsive: true
        });
        $('.delete').click(function(){
            var user = $(this).attr('product');
            var form = $('.form'+user);
            swal({
                title: '¿Seguro?',
                text: "No hay manera de revertir esta acción",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: "Cancelar",
                confirmButtonText: 'Si, eliminar'
            }).then(function () {
                form.submit();
            })

        });

    </script>
@endsection
