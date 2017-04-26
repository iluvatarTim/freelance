@extends('espace.layout')

@section('content')
    <div>
        {{ Html::link('perso/create/project', 'Nouveau projet', ['class' => 'btn btn-info pull-right']) }}
    </div>
    <table class="table">
        <thead class="tab-pane">
            <tr>
                <th>
                    Intitulé
                </th>
                <th>
                    Description
                </th>
                <th>
                    Prix
                </th>
                <th>
                    Date butoire
                </th>
                <th>
                    Cahier des Charges
                </th>
                <th>
                    Offre
                </th>
            </tr>
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
                        {{ $project->price }}
                    </td>
                    <td>
                        {{ $project->deadline }}
                    </td>
                    <td>
                        {!! Html::link($project->url_cdc, 'cahier des charges', ['class' => 'btn btn-info', 'target' => '_blank']) !!}
                    </td>
                    <td>
                        {!! Html::link('offre/'.$project->id, 'Consulter les Offres', ['class' => 'btn btn-success']) !!}
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

@endsection