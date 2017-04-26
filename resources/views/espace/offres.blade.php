@extends('espace.layout')

@section('content')
    <table class="table">
        <thead class="tab-pane">
            <th>
                intitulé
            </th>
            <th>
                Message d'offre
            </th>
            <th>
                Prénom du freelancer
            </th>
            <th>
                Nom du freelancer
            </th>
        </thead>
        <tbody class="tab-content">
            @if($offres != '')
                @foreach($offres as $offre)
                    <tr>
                        <td>
                            {{ $offre->title }}
                        </td>
                        <td>
                            {{ $offre->message }}<br/>
                            {!! Html::link('message/'.$offre->freelancer_id.'/'.$offre->project_id.'/'.$offre->company_id, 'Voir les messages', ['class' => 'btn btn-info']) !!}
                        </td>
                        <td>
                            {{ $offre->firstname }}
                        </td>
                        <td>
                            {{ $offre->name }}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>
                        Il n'y a aucune offre sur ce projet {!! Html::link('perso/projet', 'revenir à la liste des projets', ['class' => 'btn btn-info']) !!}
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection
