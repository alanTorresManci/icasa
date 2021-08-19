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
        <li class="active"><a href="#">Ver</a></li>
    </ol>
@stop
@section('header')
    Ver Variables <small>Mueve el mouse para ver una variable</small>
@endsection
@section('content')
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
                <h4 class="panel-title">Ver Variables</h4>
            </div>
            <div class="panel-body">
                <form id="form" class="form-horizontal" data-parsley-validate enctype="multipart/form-data" action="{{ route('variables.update', 2) }}" method="POST">
                    <div class="form-group">
                        <div class="col-md-12" id="my-interactive-image2">
                            <div id="my-interactive-image"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/interactiveimagejs@2.7.1/dist/interactive-image.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/interactiveimagejs@2.7.1/dist/interactive-image.min.js"></script>
    <script type="text/javascript">
    // Items collection
        items = {!! $project->listVariableValues !!};
        var options = {
            shareBox: false
        };
        // Plugin activation
        $(document).ready(function() {
            $("#my-interactive-image").interactiveImage(items, options);
        });

    </script>
@endsection
