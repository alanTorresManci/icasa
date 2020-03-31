@extends('admin.layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('admin_projects.index') }}">Proyectos</a></li>
        <li class="active"><a href="#">Editar</a></li>
    </ol>
@stop
@section('header')
    Editar Proyecto <small>Completa para editar un proyecto</small>
@endsection
@section('content')
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
                <h4 class="panel-title">Editar Proyecto</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" data-parsley-validate enctype="multipart/form-data" action="{{ route('admin_projects.update', $project) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nombre</label>
                        <div class="col-md-9">
                            <input
                                data-parsley-type="text"
                                required
                                value="{{ $project->name }}"
                                class="form-control"
                                placeholder="Nombre del proyecto"
                                name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Cliente</label>
                        <div class="col-md-9">
                            <select class="form-control" required name="user_id">
                                <option value="" disabled="">Selecciona un cliente</option>
                                @foreach ($clients as $key => $client)
                                    <option {{ $project->client_id == $client->id ? "selected" : "" }} value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Guardar</label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-sm btn-success">Guardar Proyecto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
