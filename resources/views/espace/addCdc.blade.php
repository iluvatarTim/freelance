@extends('espace.layout')

@section('content')

    <div class="container">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">Ajouter un cahier des charges</div>
                <div class="panel-body">
                    {!! Form::open(['files' => true, 'enctype' => 'multipart/form-data']) !!}
                    {{ csrf_field() }}
                    <div class="form-group {!! $errors->has('pdf') ? 'has-error' : '' !!}">
                        {!! Form::label('cdc', 'Choisir un cahier des charges :') !!}
                        {!! Form::file('pdf', ['class' => 'form-control']) !!}
                        {!! $errors->first('pdf', '<small class="help-block">:message</small>') !!}
                    </div>
                    {!! Form::submit('Enreegistrer', ['class' => 'btn btn-info pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection