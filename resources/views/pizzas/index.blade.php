@extends('layout.template')

@section('main')
		<div class="container">

			@if (session('message'))
				<div class="alert alert-success">
						{{ session('message') }}
				</div>
			@endif

			<table class="table table-dark table-striped table-bordered">
				<thead>
					<th>ID</th>
					<th>NOME</th>
					<th>INGREDIENTI</th>
					<th>PREZZO</th>
					<th>VEGETARIANA</th>
					<th>Creato il</th>
					<th>Aggiornato il</th>
				</thead>

				<tbody>
					@foreach ($pizzas as $pizza)
						<tr>
							<td>{{$pizza->id}}</td>
							<td>{{$pizza->name}}</td>
							<td>{{$pizza->ingredients}}</td>
							<td>{{number_format($pizza->price, 2, ",", ".")."€"}}</td>
							<td>{{$pizza->vegetarian ? 'SI' : 'NO'}}</td>
							<td>{{$pizza->created_at}}</td>
							<td>{{$pizza->updated_at}}</td>

							<td>
								<a class="btn btn-outline-light" href="{{ route('pizzas.show', $pizza->id) }}">
									<i class="fas fa-search-plus"></i>
								</a>
							</td>

							<td>
								<a class="btn btn-outline-light" href="{{ route('pizzas.edit', $pizza->id) }}">
									<i class="fas fa-pencil-alt"></i>
								</a>
							</td>

							<td>
								<form action="{{ route('pizzas.destroy', $pizza->id) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questa pizza?')">
									@csrf
									@method('DELETE')
									<button class="btn btn-outline-light"><i class="fas fa-trash-alt"></i></button>
								</form>
							</td>
							
						</tr>	
					@endforeach
				</tbody>
			</table>

			<div class="text-right">
				<a class="btn btn-primary" href="{{ route('pizzas.create') }}">Aggiungi Pizza</a>
			</div>
		</div>
@endsection