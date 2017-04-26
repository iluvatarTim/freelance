@extends('admin.layout')

@section('content')

    <h2 class="sub-header">Test List</h2>

    {{ Html::link('admin/test/edit', 'Ajouter', ['class' => 'btn btn-info']) }}

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <th>Description</th>
            <th>URL</th>
            </thead>
            <tbody>
            @foreach($tests as $test)
                <tr>
                    <td>{{ $test->description }}</td>
                    <td>{{ $test->url }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection