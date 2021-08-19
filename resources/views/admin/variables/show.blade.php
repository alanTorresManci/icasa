@extends('admin.layouts.app')

@section('css')
<style>
    .interactive-image {
        width: 100%;
        height: 600px;
        background: url("{{ \Storage::url($project->image) }}");
    }
</style>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('variables.index') }}">Variables</a></li>
        <li class="active"><a href="#">Editar</a></li>
    </ol>
@stop
@section('header')
    Editar Variables <small>Click para crear una variable</small>
@endsection
@section('content')
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
                <h4 class="panel-title">Editar Variable</h4>
            </div>
            <div class="panel-body">
                <form id="form" class="form-horizontal" data-parsley-validate enctype="multipart/form-data" action="{{ route('variables.update', 2) }}" method="POST">
                    <div class="form-group">
                        <div class="col-md-12" id="my-interactive-image2">
                            <div id="my-interactive-image"></div>
                    </div>
                    {{-- <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nombre</label>
                        <div class="col-md-9">
                            <input
                                data-parsley-type="text"
                                required
                                class="form-control"
                                placeholder="Nombre de variable"
                                value="{{ $variable->name }}"
                                name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Proyecto</label>
                        <div class="col-md-9">
                            <select class="form-control" required name="project_id">
                                <option selected="" disabled="">Selecciona un proyecto</option>
                                @foreach ($projects as $key => $project)
                                    <option {{ $variable->project_id == $project->id ? "selected" : "" }} value="{{ $project->id }}">{{ $project->name }} - {{ $project->client->name }}</option>
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
                                value="{{ $variable->units }}"
                                name="units">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Referencia de equipo</label>
                        <div class="col-md-9">
                            <input
                                data-parsley-type="text"
                                required
                                class="form-control"
                                placeholder="Referencia de equipo"
                                value="{{ $variable->reference }}"
                                name="reference">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">En vivo</label>
                        <div class="col-md-1">
                            <input id="live" type="checkbox" {{ $variable->live == 0 ? "":"checked" }} class="form-control" value="0">
                            <input id="liveHidden" type="hidden" class="form-control" name="live" value="0">
                        </div>
                        <label class="col-md-3 control-label">Escritura</label>
                        <div class="col-md-1">
                            <input id="write_only" type="checkbox" {{ $variable->write_only == 0 ? "":"checked" }} class="form-control" value="0">
                            <input id="write_onlyHidden" type="hidden" class="form-control" name="write_only" value="0">
                        </div>
                        <label class="col-md-3 control-label">Lectura</label>
                        <div class="col-md-1">
                            <input id="read_only" type="checkbox" {{ $variable->read_only == 0 ? "":"checked" }} class="form-control" value="0">
                            <input id="read_onlyHidden" type="hidden" class="form-control" name="read_only" value="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Guardar</label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-sm btn-success">Actualizar Variable</button>
                        </div>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addVariableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva variable</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
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
                                name="name"
                                id="name">
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
                                name="units"
                                id="units">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Referencia de equipo</label>
                        <div class="col-md-9">
                            <input
                                data-parsley-type="text"
                                required
                                class="form-control"
                                placeholder="Referencia de equipo"
                                name="reference"
                                id="reference">
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
                        <input type="hidden" name="position_x" value="" id="position_x">
                        <input type="hidden" name="position_y" value="" id="position_y">
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-sm btn-success">Guardar Variable</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/interactiveimagejs@2.7.1/dist/interactive-image.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/interactiveimagejs@2.7.1/dist/interactive-image.min.js"></script>
    <script type="text/javascript">
    // Items collection
        items = {!! $project->listVariables !!};
        var options = {
            shareBox: false
        };
        // Plugin activation
        $(document).ready(function() {
            $("#my-interactive-image").interactiveImage(items, options);
            $('#my-interactive-image2').click(function(e) {
                $('#my-interactive-image').off();
                let rect = e.target.getBoundingClientRect();
                let x = e.clientX - rect.left; //x position within the element.
                let y = e.clientY - rect.top;  //y position within the element.
                $('#position_x').val(x);
                $('#position_y').val(y);
                $('#addVariableModal').modal();
            });
        });
        $('#form').on('submit', function() {
            $('#liveHidden').val($('#live').is(':checked') ? 1:0);
            $('#write_onlyHidden').val($('#write_only').is(':checked') ? 1:0);
            $('#read_onlyHidden').val($('#read_only').is(':checked') ? 1:0);

        });
    </script>
@endsection
