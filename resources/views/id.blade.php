@extends('layout')

@section('title')
    Login
@stop

@section('style')
    {!! Html::style('css/bootstrap.css') !!}
@endsection

@section('content')
    <div class="container">
        <h1>Who are you ?</h1>
        <h3>{!! Html::link('register/freelance', 'Freelancer') !!} or {!! Html::link('register/company', 'Company') !!}</h3>
    </div>
@endsection
