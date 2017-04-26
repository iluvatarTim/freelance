@extends('layout')

@section('content')

    <div class="container">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">Poster un Message</div>
                <div class="panel-body">
                    {!! Form::open() !!}
                    {{ csrf_field() }}
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Entrez votre nom']) !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('firstname') ? 'has-error' : '' !!}">
                        {!! Form::text('firstname', null, ['class' => 'form-control', 'placeholder' => 'Entrez votre prénom']) !!}
                        {!! $errors->first('firstname', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('mail') ? 'has-error' : '' !!}">
                        {!! Form::text('mail', null, ['class' => 'form-control', 'placeholder' => 'Entrez votre email']) !!}
                        {!! $errors->first('mail', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">
                        {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Ecrire votre message']) !!}
                        {!! $errors->first('content', '<small class="help-block">:message</small>') !!}
                    </div>
                    {!! Form::submit('Poster le message', ['class' => 'btn btn-info pull-right']) !!}
                </div>
            </div>
        </div>
    </div>

@endsection