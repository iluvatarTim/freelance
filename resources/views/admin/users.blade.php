@extends('admin.layout')

@section('content')
    <h2 class="sub-header">Users List</h2>
    {{ Html::link('admin/users/freelancer', 'Freelancer', ['class' => 'btn btn-info']) }} &nbsp;&nbsp;&nbsp;&nbsp; {{ Html::link('admin/users/company', 'Company', ['class' => 'btn btn-info']) }} &nbsp;&nbsp;&nbsp;&nbsp; {{ Html::link('admin/users', 'All', ['class' => 'btn btn-info']) }} &nbsp;&nbsp;&nbsp;&nbsp; {{ Html::link('id', 'New', ['class' => 'btn btn-info']) }}
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Nom D'utilisateur</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Catégorie</th>
            </thead>
            <tbody>
                @foreach($users as $user )
                <tr>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->mail}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{ Html::link('admin/users/'.$user->id.'','', ['type' => 'submit', 'class' => 'glyphicon glyphicon-pencil btn btn-warning']) }}</td>
                    <td>{{ Html::link('admin/confirm/delete/'.$user->id,'', ['type' => 'submit', 'class' => 'glyphicon glyphicon-remove btn btn-danger']) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection