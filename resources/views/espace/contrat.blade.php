@extends('espace.layout')

@section('content')
    <div class="container">
        <div class="col-sm-offset-4 col-sm-4">
            <div class="panel panel-info">
                <div class="panel-heading">Choisir un contrat</div>
                <div class="panel-body">
                    @if(session()->has('error'))
                        <div class="alert alert-danger">{!! session('error') !!}</div>
                    @endif
                        {!! Form::open(['files' => true, 'url' => 'contrat/create/'.$fUser->id.'/'.$offre->id.'/'.$cUser->id.'/'.$proj->id]) !!}
                        <div class="form-group {!! $errors->has('pdf') ? 'has-error' : '' !!}">
                            {!! Form::file('pdf', ['class' => 'form-control']) !!}
                            {!! $errors->first('pdf', '<small class="help-block">:message</small>') !!}
                        </div>
                        {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection