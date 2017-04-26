@extends('layout')

@section('style')
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css') !!}
@endsection

@section('content')
    <div class="container">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    {!! Form::open() !!}
                    <div class="form-group {!! $errors->has('username') ? 'has-error' : '' !!}">
                        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Nom d\'utilisateur']) !!}
                        {!! $errors->first('username', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Votre mot de passe']) !!}
                        {!! $errors->first('password', '<small class="help-block">:message</small>') !!}
                    </div>
                    {!! Form::submit('Login', ['class' => 'btn btn-info pull-left']) !!}{{ Html::link('id', 'Nouveau ?', ['class' => 'btn btn-info pull-right']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection