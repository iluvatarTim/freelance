{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('descriptiton', 'Descriptiton:') !!}
			{!! Form::textarea('descriptiton') !!}
		</li>
		<li>
			{!! Form::label('categorie', 'Categorie:') !!}
			{!! Form::text('categorie') !!}
		</li>
		<li>
			{!! Form::label('id_freelancer', 'Id_freelancer:') !!}
			{!! Form::text('id_freelancer') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}