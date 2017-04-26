@extends('espace.layout')

@section('content')
    <div class="container">
        <div class="col-sm-offset-4 col-sm-4">
            <div class="panel panel-info">
                <div class="panel-heading">Modifier mes informations</div>
                <div class="panel-body">
                    @if(session()->has('error'))
                        <div class="alert alert-danger">{!! session('error') !!}</div>
                    @endif
                    {!! Form::open() !!}
                        <div class="form-group {!! $errors->has('firstname') ? 'has-error' : '' !!}">
                            {!! Form::label('firstname', 'Prénom') !!}
                            {!! Form::text('firstname', $user->firstname, ['class' => 'form-control']) !!}
                            {!! $errors->first('firstname', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                            {!! Form::label('name', 'Nom') !!}
                            {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                            {!! $errors->first('name', '<small class="halp-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('username') ? 'has-error' : '' !!}">
                            {!! Form::label('username', 'Pseudo') !!}
                            {!! Form::text('username', $user->username, ['class' => 'form-control']) !!}
                            {!! $errors->first('username', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('mail') ? 'has-error' : '' !!}">
                            {!! Form::label('mail', 'Email') !!}
                            {!! Form::text('mail', $user->mail, ['class' => 'form-control']) !!}
                            {!! $errors->first('mail', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('address') ? 'has-error' : '' !!}">
                            {!! Form::label('address', 'Adresse') !!}
                            {!! Form::text('address', $user->address, ['class' => 'form-control']) !!}
                            {!! $errors->first('address', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('phone') ? 'has-error' : '' !!}">
                            {!! Form::label('phone', 'Téléphone') !!}
                            {!! Form::text('phone', $user->phone, ['class' => 'form-control']) !!}
                            {!! $errors->first('phone', '<small class="help-block">:message</small>') !!}
                        </div>
                        @if($user->role == 'company')
                            <div class="form-group {!! $errors->has('denomination') ? 'has-error' : '' !!}">
                                {!! Form::label('deno', 'Dénomination') !!}
                                {!! Form::text('denomination', $userCompany->denomination, ['class' => 'form-control']) !!}
                                {!! $errors->first('denomination', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group {!! $errors->has('siret') ? 'has-error' : '' !!}">
                                {!! Form::label('siret', 'SIRET') !!}
                                {!! Form::text('siret', $userCompany->siret, ['class' => 'form-control']) !!}
                                {!! $errors->first('siret', '<small class="help-block">:message</small>') !!}
                            </div>
                        @endif
                        {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                        {!! Html::link('perso/forgot/password', 'changer de mot de passe', ['class' => 'btn btn-info pull-left']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection