@extends('admin.layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('clients.index') }}">Clientes</a></li>
        <li class="active"><a href="#">Editar</a></li>
    </ol>
@stop
@section('header')
    Editar Clientes <small>Completa para editar un cliente</small>
@endsection
@section('content')
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
                <h4 class="panel-title">Editar Cliente</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" data-parsley-validate enctype="multipart/form-data" action="{{ route('clients.update', $client) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nombre</label>
                        <div class="col-md-9">
                            <input
                                data-parsley-type="text"
                                required
                                class="form-control"
                                placeholder="Nombre del cliente"
                                value="{{ $client->name }}"
                                name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Correo Electrónico</label>
                        <div class="col-md-9">
                            <p class="form-control"> {{ $client->email }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Contraseña</label>
                        <div class="col-md-9">
                            <input
                                data-parsley-type="secret"
                                required
                                type="password"
                                class="form-control"
                                placeholder="Contraseña del cliente"
                                name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Confirmación Contraseña</label>
                        <div class="col-md-9">
                            <input
                                data-parsley-type="password"
                                required
                                type="password"
                                class="form-control"
                                placeholder="Contraseña del cliente"
                                name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Guardar</label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-sm btn-success">Crear Cliente</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
