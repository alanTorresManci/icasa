@extends('admin.layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('admin_projects.index') }}">Proyectos</a></li>
        <li class="active"><a href="#">Crear</a></li>
    </ol>
@stop
@section('header')
    Crear Proyecto <small>Completa para creat un proyecto</small>
@endsection
@section('content')
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
                <h4 class="panel-title">Crear Proyecto</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" data-parsley-validate enctype="multipart/form-data" action="{{ route('admin_projects.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nombre</label>
                        <div class="col-md-9">
                            <input
                                data-parsley-type="text"
                                required
                                class="form-control"
                                placeholder="Nombre del proyecto"
                                name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Cliente</label>
                        <div class="col-md-9">
                            <select class="form-control" required name="user_id">
                                <option selected="" disabled="">Selecciona un cliente</option>
                                @foreach ($clients as $key => $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
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
