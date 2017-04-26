@extends('espace.layout')

@section('style')
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css') !!}
@endsection

@section('content')

    <div class="container">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">Créer un Projet</div>
                <div class="panel-body">
                    {!! Form::open() !!}
                    {{ csrf_field() }}
                        <div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Intitulé du projet']) !!}
                            {!! $errors->first('title', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description du projet']) !!}
                            {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('price') ? 'has-error' : '' !!}">
                            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Prix du projet']) !!}
                            {!! $errors->first('price', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('deadline') ? 'has-error' : '' !!}">
                            {!! Form::label('deadline', 'Date Butoire :') !!}
                            {!! Form::date('deadline', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('deadline', '<small class="help-block">:message</small>') !!}
                        </div>
                        {!! Form::submit('Ajouter Cahier des charges', ['class' => 'btn btn-info pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection