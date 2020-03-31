@extends('admin.layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('variables.index') }}">Variables</a></li>
        <li class="active"><a href="#">Crear</a></li>
    </ol>
@stop
@section('header')
    Crear Variables <small>Completa para crear una variable</small>
@endsection
@section('content')
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
                <h4 class="panel-title">Crear Variable</h4>
            </div>
            <div class="panel-body">
                <form id="form" class="form-horizontal" data-parsley-validate enctype="multipart/form-data" action="{{ route('variables.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nombre</label>
                        <div class="col-md-9">
                            <input
                                data-parsley-type="text"
                                required
                                class="form-control"
                                placeholder="Nombre de variable"
                                name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Proyecto</label>
                        <div class="col-md-9">
                            <select class="form-control" required name="project_id">
                                <option selected="" disabled="">Selecciona un proyecto</option>
                                @foreach ($projects as $key => $project)
                                    <option value="{{ $project->id }}">{{ $project->name }} - {{ $project->client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Unidades</label>
                        <div class="col-md-9">
                            <input
                                data-parsley-type="text"
                                required
                                class="form-control"
                                placeholder="Unidades"
                                name="units">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">En vivo</label>
                        <div class="col-md-1">
                            <input id="live" type="checkbox" class="form-control" value="0">
                            <input id="liveHidden" type="hidden" class="form-control" name="live" value="0">
                        </div>
                        <label class="col-md-3 control-label">Escritura</label>
                        <div class="col-md-1">
                            <input id="write_only" type="checkbox" class="form-control" value="0">
                            <input id="write_onlyHidden" type="hidden" class="form-control" name="write_only" value="0">
                        </div>
                        <label class="col-md-3 control-label">Lectura</label>
                        <div class="col-md-1">
                            <input id="read_only" type="checkbox" class="form-control" value="0">
                            <input id="read_onlyHidden" type="hidden" class="form-control" name="read_only" value="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Guardar</label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-sm btn-success">Crear Variable</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $('#form').on('submit', function() {
            $('#liveHidden').val($('#live').is(':checked') ? 1:0);
            $('#write_onlyHidden').val($('#write_only').is(':checked') ? 1:0);
            $('#read_onlyHidden').val($('#read_only').is(':checked') ? 1:0);

        });
    </script>
@endsection
