{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('tarif', 'Tarif:') !!}
			{!! Form::text('tarif') !!}
		</li>
		<li>
			{!! Form::label('deadline', 'Deadline:') !!}
			{!! Form::text('deadline') !!}
		</li>
		<li>
			{!! Form::label('company_id', 'Company_id:') !!}
			{!! Form::text('company_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}