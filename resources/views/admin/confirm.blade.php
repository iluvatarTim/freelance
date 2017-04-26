@extends('admin.layout')

@section('content')
    <p>
        <h1>Voulez-vous vraiment supprimer l'utilisateur "{{ $id->firstname }} {{ $id->name }}" ? </h1>
        {{ Html::link('admin/users/delete/'.$id->id, 'oui', ['class' => 'btn btn-link']) }}&nbsp;{{ Html::link('admin/users', 'non', ['class' => 'btn btn-link']) }}
    </p>