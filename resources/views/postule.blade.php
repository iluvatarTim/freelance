@extends('layout')

@section('content')

    <div class="container">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">Postuler</div>
                <div class="panel-body">
                    {!! Form::open() !!}
                        {{ csrf_field() }}
                        {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Message']) !!}
                        {!! $errors->first('message', '<small class="help-block">:message</small>') !!}
                        {!! Form::submit('Postuler', ['class' => 'btn btn-info pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection