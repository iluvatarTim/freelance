@extends('espace.layout')

@section('content')

    <table class="table">
        <thead class="tab-pane">
            <th>
                Intitulé du projet
            </th>
            <th>
                Cahier des charges
            </th>
            <th>
                Description du projet
            </th>
            <th>
                Date buttoire
            </th>
            <th>
                Message d'offre
            </th>
        </thead>
        <tbody>
            @foreach($offres as $offre)
                <tr class="tab-content">
                    <td>
                        {{ $offre->title }}
                    </td>
                    <td>
                        {!! Html::link($offre->url_cdc, 'consulter le cahier des charges', ['class' => 'btn btn-info']) !!}
                    </td>
                    <td>
                        {{ $offre->description }}
                    </td>
                    <td>
                        {{ $offre->deadline }}
                    </td>
                    <td>
                        {{ $offre->message }}
                    </td>
                    <td>
                        {!! Html::link('message/'.$offre->freelancer_id.'/'.$offre->project_id.'/'.$offre->company_id, 'Voir les réponses', ['class' => 'btn btn-info']) !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection