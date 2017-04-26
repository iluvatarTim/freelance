@extends('espace.layout')

@section('content')
    <div class="container">

    </div>
    <table class="table">
        <thead>
            <th>
                prénom
            </th>
            <th>
                Nom
            </th>
            <th>
                Email
            </th>
            <th>
                adresse
            </th>
            <th>
                Numéro de téléphone
            </th>
            <th>
                CV
            </th>
            <th>
                Photo
            </th>
        </thead>
        <tbody>
            <tr>
               <td>
                   {{ $info->firstname }}
               </td>
                <td>
                    {{ $info->name }}
                </td>
                <td>
                    {{ $info->mail }}
                </td>
                <td>
                    {{ $info->address }}
                </td>
                <td>
                    {{ $info->phone }}
                </td>
                <td>
                    {!! Html::link($uFree->cv_url, 'Consulter le CV', ['class' => 'btn btn-info']) !!}
                </td>
                <td>
                    {!! Html::image($uFree->photo_url, null, ['class' => 'col-sm-4']) !!}
                </td>
            </tr>

        </tbody>
    </table>
@endsection