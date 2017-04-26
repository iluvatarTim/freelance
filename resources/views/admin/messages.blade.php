@extends('admin.layout')

@section('content')
    <div class="container">
        {!! dd($mess) !!}
        @if($mess =! '')
            @foreach($mess as $message)
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
            <div class="row">
                {!! Html::link('admin/delete/conv/'.$messages[0]->freelancer_id.'/'.$messages[0]->project_id.'/'.$messages[0]->comp_id, 'Supprimer la conversation', ['class' => 'btn btn-danger pull-right']) !!}
            </div>
        @else
            <h1>Aucune conversation enregistrée</h1>
        @endif
    </div>
@endsection