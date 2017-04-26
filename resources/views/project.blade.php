@extends('layout')

@section('content')

    <table class="table">
        <thead class="tab-pane">
        <th>titre</th>
        <th>description</th>
        <th>Date buttoire</th>
        <th>Cahier des Charges</th>
        @if($user != 'empty')
            <th class="hidden"></th>
        @endif
        </thead>
        <tbody class="tab-content">
            @foreach($projects as $project)
                    <tr>
                        <td>
                            {{ $project->title }}
                        </td>
                        <td>
                            {{ $project->description }}
                        </td>
                        <td>
                            {{ $project->deadline }}
                        </td>
                        <td>
                            {!! Html::link($project->url_cdc, 'Consulter le cahier des charges', ['class' => 'btn btn-info', 'target' => '_blank']) !!}
                        </td>
                        @if($user != 'empty')
                            @if($user->role == 'freelancer')
                                <td>{!! Html::link('postule/'.$project->id, 'Postuler', ['class' => 'btn btn-info']) !!}</td>
                            @else
                                <td class="hidden"></td>
                            @endif
                        @endif
                    </tr>
            @endforeach
        </tbody>
    </table>

@endsection