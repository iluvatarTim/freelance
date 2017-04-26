{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('freelancer_id', 'Freelancer_id:') !!}
			{!! Form::text('freelancer_id') !!}
		</li>
		<li>
			{!! Form::label('company_id', 'Company_id:') !!}
			{!! Form::text('company_id') !!}
		</li>
		<li>
			{!! Form::label('offre_id', 'Offre_id:') !!}
			{!! Form::text('offre_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}