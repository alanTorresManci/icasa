@extends('admin.layouts.app')
@section('breadcrumb')
    <ol class="breadcrumb pull-right">
        <li class="active"><a href="javascript:;">Proyectos</a></li>
    </ol>
@endsection
@section('header')
    Proyectos <small>Ver todos los proyectos</small>
    <a class="btn btn-success btn-icon btn-circle btn-sm" href="{{ route('admin_projects.create') }}">
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
                <h4 class="panel-title">Proyectos Existentes</h4>
            </div>
            <div class="panel-body">
                <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cliente</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $key => $project)
                            <tr class=" gradeC">
                                <td>
                                    <a href="{{ route('admin_projects.show', $project) }}">
                                        {{ $project->name }}
                                    </a>
                                </td>
                                <td>{{ @optional($project->client)->name }}</td>
                                <td>
                                    <p>
                                        <a class="btn btn-danger btn-icon btn-circle btn-sm delete" product="{{ $project->id }}">
                                            <i class="fa fa-times"></i>
                                        </a>
                                        <form class="form{{ $project->id }}" action="{{ route('admin_projects.destroy', $project->id) }}" method="post">
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
