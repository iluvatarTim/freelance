@extends('admin.layout')

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
                        <div class="form-group {!! $errors->has('freelancer') ? 'has-error' : '' !!}">
                            {!! Form::label('freelancer', 'Freelancer') !!}
                            <select class="form-control" name="freelancer">
                                @foreach($u as $user)
                                    @if($user->role == 'freelancer')
                                        <option value="{{ $user->username }}">{{ $user->username }}</option>
                                    @endif
                                @endforeach
                            </select>
                            {!! $errors->first('freelancer', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('company') ? 'has-error' : '' !!}">
                            {!! Form::label('company', 'Entreprise') !!}
                            <select class="form-control" name="company">
                                @foreach($u as $user)
                                    @if($user->role == 'company')
                                        <option value="{{ $user->username }}">{{ $user->username }}</option>
                                    @endif
                                @endforeach
                            </select>
                            {!! $errors->first('company', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('project') ? 'has-error' : '' !!}">
                            {!! Form::label('project', 'Projet') !!}
                            <select class="form-control" name="project">
                                @foreach($proj as $p)
                                    <option value="{{ $p->title }}">{{ $p->title }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('project', '<small class="help-block">:message</small>') !!}
                        </div>
                        {!! Form::submit('Rechercher', ['class' => 'btn btn-info pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
