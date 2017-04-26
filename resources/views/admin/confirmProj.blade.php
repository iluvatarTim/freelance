@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="col-sm-offset-4 col-sm-4">
            <div class="panel panel-info">
                <div class="panel-heading">Voulez-vous supprimer le projet intitulé "{{ $proj->title }}" ?</div>
                <div class="panel-body">
                    @if(session()->has('error'))
                        <div class="alert alert-danger">{!! session('error') !!}</div>
                    @endif
                    {!! Form::open() !!}
                    <div class="form-group {!! $errors->has('confirm') ? 'has-error' : '' !!}">
                        {!! Form::select('confirm', ['oui' => 'oui', 'non' => 'non'], null, ['class' => 'form-control']) !!}
                        {!! $errors->first('Confirm', '<small class="help-block">:message</small>') !!}
                    </div>
                    {!! Form::submit('Confirmer', ['class' => 'btn btn-info pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection