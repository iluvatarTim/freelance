@extends('admin.layout')

@section('content')

    <h2 class="sub-header">Projects List</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <th>Prix</th>
            <th>Description</th>
            <th>Cahier des charges</th>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td>{{ $project->price }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{!! Html::link($project->url_cdc, 'Consulter', ['class' => 'btn btn-success']) !!}</td>
                    <td>{!! Html::link('admin/edit/project/'.$project->id, '', ['type' => 'submit', 'class' => 'glyphicon glyphicon-pencil btn btn-warning']) !!}</td>
                    <td>{!! Html::link('admin/delete/project/'.$project->id, '', ['type' => 'submit', 'class' => 'glyphicon glyphicon-remove btn btn-danger']) !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection