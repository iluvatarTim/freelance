@extends('layout')

@section('style')
	{!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css') !!}
	{!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}
	{!! Html::style('css/bootstrap-responsive.min.css') !!}
@endsection

@section('content')
	<div class="container">
		<div class="col-sm-offset-3 col-sm-6">
			<div class="panel panel-info">
				<div class="panel-heading">Nouvel Administrateur</div>
				<div class="panel-body">
					{!! Form::open() !!}
					{{ csrf_field() }}
					<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
						{!! Form::label('nom', 'Nom : ') !!}
						{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
						{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('prenom') ? 'has-error' : '' !!}">
						{!! Form::label('prenom', 'Prénom :') !!}
						{!! Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => 'Prénom']) !!}
						{!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('pseudo') ? 'has-error' : '' !!}">
						{!! Form::label('pseudo', 'Pseudo :') !!}
						{!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Pseudo']) !!}
						{!! $errors->first('username', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('mail') ? 'has-error' : '' !!}">
						{!! Form::label('mail', 'Mail :') !!}
						{!! Form::email('mail', null, ['class' => 'form-control', 'placeholder' => 'exemple@exemple.com']) !!}
						{!! $errors->first('mail', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('secret') ? 'has-error' : '' !!}">
						{!! Form::label('secret', 'Mot de passe :') !!}
						{!! Form::password('secret', ['class' => 'form-control', 'placeholder' => 'mot de passe']) !!}
						{!! $errors->first('secret', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('confirm') ? 'has-error' : '' !!}">
						{!! Form::label('confirm', 'Confirmation mot de passe :') !!}
						{!! Form::password('confirm', ['class' => 'form-control', 'placeholder' => 'confirmation']) !!}
						{!! $errors->first('confirm', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('phone') ? 'has-error' : '' !!}">
						{!! Form::label('phone', 'Téléphone :') !!}
						{!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '0606060606']) !!}
						{!! $errors->first('phone', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('adresse') ? 'has-error' : '' !!}">
						{!! Form::label('adresse', 'Adresse :') !!}
						{!! Form::text('adresse', null, ['class' => 'form-control', 'placeholder' => '53 chemin du puit']) !!}
						{!! $errors->first('adress', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('postal') ? 'has-error' : '' !!}">
						{!! Form::label('postal', 'Code Postal :') !!}
						{!! Form::text('postal', null, ['class' => 'form-control', 'placeholder' => '11230']) !!}
						{!! $errors->first('postal', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('ville') ? 'has-error' : '' !!}">
						{!! Form::label('ville', 'Ville :') !!}
						{!! Form::text('ville', null, ['class' => 'form-control', 'placeholder' => 'Le Puys']) !!}
						{!! $errors->first('ville', '<small class="help-block">:message</small>') !!}
					</div>
					{!! Form::submit('inscription', ['class' => 'btn btn-info pull-left']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection