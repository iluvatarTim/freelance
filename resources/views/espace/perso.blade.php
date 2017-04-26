@extends('espace.layout')

@section('content')
    <section class="services wrapper">
        <ul class="clearfix">
            <li class="animated wow fadeInDown"  data-wow-delay=".2s">
                {{ Html::image(session('photo_url'), null, ['class' => 'icon']) }}
            </li>
            @if($user->role == 'freelancer')
                <li class="animated wow fadeInDown">
                    <h2>Mon CV</h2><br>
                    @if($typeUser != null)
                        <div>
                            {{ Html::image('cv/default.png', null, ['class' => 'icon']) }}
                            <br/>
                            {!! Html::link($typeUser->cv_url, 'voir Le CV', ['class' => 'btn btn-link', 'target' => '_blank']) !!}
                            <br/>
                        </div>
                        {!! Html::link('add/cv', 'Changer le CV', ['class' => 'btn btn-info']) !!}
                    @else
                        <br/>
                        {!! Html::link('add/cv', 'Ajouter un CV', ['class' => 'btn btn-success']) !!}
                    @endif
                </li>
            @endif
        </ul>
        <ul class="clearfix">
            <li class="animated wow fadeInDown">
                <span class="separator"></span>
                <h2>{{ $user->firstname.' '.$user->name }}</h2>
                @if(session('photo_url') == 'uploads/default.jpg')
                    <p>{{ Html::link('perso/pic', 'ajouter une photo', ['class' => 'btn btn-link']) }}</p>
                @else
                    <p>{{ Html::link('perso/pic', 'changer de photo', ['class' => 'btn btn-link']) }}</p>
                @endif
            </li>
            <li class="animated wow fadeInDown"  data-wow-delay=".2s">
                <span class="separator"></span>
                <h2>Mes Informations</h2>
                <p>{{ Html::link('perso/info/'.$user->id, $user->firstname, ['class' => 'btn btn-link']) }}</p>
            </li>
            <li class="animated wow fadeInDown"  data-wow-delay=".4s">
                <span class="separator"></span>
                @if($user->role == 'freelancer')
                    <h2>Mes offres</h2>
                    <p>{{ Html::link('perso/offres', 'Mes Offres', ['class' => 'btn btn-link']) }}</p>
                @elseif($user->role == 'company')
                    <h2>Mes projets</h2>
                    <p>{{ Html::link('perso/projet', 'Mes Projets', ['class' => 'btn btn-link']) }}</p>
                @endif

            </li>
        </ul>
    </section>
@endsection