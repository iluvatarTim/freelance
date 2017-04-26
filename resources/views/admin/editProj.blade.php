@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Modifier Le projet</div>
                <div class="panel-body"><br/>
                    <br/>
                    @if(session()->has('error'))
                        <div class="alert alert-danger">{!! session('error') !!}</div>
                    @endif
                    {!! Form::open() !!}
                        <div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
                            {!! Form::label('title', 'Intitulé du projet') !!}
                            {!! Form::text('title', $proj->title, ['class' => 'form-control']) !!}
                            {!! $errors->first('title', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                            {!! Form::label('description', 'description du projet') !!}
                            {!! Form::textarea('description', $proj->description, ['class' => 'form-control']) !!}
                            {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('price') ? 'has-error' : '' !!}">
                            {!! Form::label('price', 'Prix du projet') !!}
                            {!! Form::text('price', $proj->price, ['class' => 'form-control']) !!}
                            {!! $errors->first('price', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('deadline') ? 'has-error' : '' !!}">
                            {!! Form::label('deadline', 'date buttoire') !!}
                            {!! Form::date('deadline', $proj->deadline, ['class' => 'form-control']) !!}
                            {!! $errors->first('deadline', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('message') ? 'has-error' : '' !!}">
                            {!! Form::label('message', 'Message pour l\'entreprise') !!}
                            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('message', '<small class="help-block">:message</small>') !!}
                        </div>
                    {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection