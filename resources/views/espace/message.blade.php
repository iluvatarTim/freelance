@extends('espace.layout')

@section('content')
    <div class="container">
        {!! dd($messages) !!}
        @foreach($messages as $message)
            <div class="row">
                <div class="col-sm-2">
                    <div class="thumbnail">
                        @if($message->role == 'freelancer')
                            {!! Html::image($message->photo_url, null, ['class' => 'img-responsive user-photo']) !!}
                        @else
                            {!! Html::image($message->pic_url, null, ['class' => 'img-responsive user-photo']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>{{ $message->firstname }}&nbsp;{{ $message->name }}</strong>&nbsp;&nbsp;<span class="text-muted">{{ $message->mail }}</span>
                        </div>
                        <div class="panel-body">
                            {{ $message->content }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @if($user->role == 'company')
            <div class="row">
                {!! Html::link('contrat/'.$offre->freelancer_id.'/'.$offre->id.'/'.$user->id, 'Valider l\'offre', ['class' => 'btn btn-success pull-right']) !!}
            </div>
        @endif
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">Poster un Message</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'message/post/'.$user->id.'/'.$messages[0]->freelancer_id.'/'.$messages[0]->project_id.'/'.$messages[0]->comp_id]) !!}
                    {{ csrf_field() }}
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Entrez votre nom']) !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('firstname') ? 'has-error' : '' !!}">
                        {!! Form::text('firstname', $user->firstname, ['class' => 'form-control', 'placeholder' => 'Entrez votre prénom']) !!}
                        {!! $errors->first('firstname', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('mail') ? 'has-error' : '' !!}">
                        {!! Form::text('mail', $user->mail, ['class' => 'form-control', 'placeholder' => 'Entrez votre email']) !!}
                        {!! $errors->first('mail', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('message') ? 'has-error' : '' !!}">
                        {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Ecrire votre message']) !!}
                        {!! $errors->first('message', '<small class="help-block">:message</small>') !!}
                    </div>
                    {!! Form::submit('Poster le message', ['class' => 'btn btn-info pull-right']) !!}
                </div>
            </div>
        </div>
    </div>

@endsection