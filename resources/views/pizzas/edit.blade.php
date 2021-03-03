@extends('layout.template')

@section('main')
		<div class="container my-5">

			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<h1>Modifica la pizza</h1>
			<form action="{{ route('pizzas.update', $pizza->id) }}" method="post">
				@csrf
				@method('PUT')

				<div class="form-group">
					<label for="nome">NOME</label>
					<input type="text" class="form-control" id="nome" name="name" value="{{ $pizza->name }}">
				</div>

				<div class="form-group">
					<label for="ingredienti">INGREDIENTI</label>
					<input type="text" class="form-control" id="ingredienti" name="ingredients" value="{{ $pizza->ingredients }}">
				</div>

				<div class="form-group">
					<label for="prezzo">PREZZO</label>
					<input type="text" class="form-control" id="prezzo" name="price" value="{{ $pizza->price }}">
				</div>

				<div class="form-group">
					<label for="immagine">IMMAGINE</label>
					<textarea class="form-control" name="img" id="immagine" cols="30" rows="10">{{ $pizza->img }}</textarea>
				</div>

				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="vegetariana" name="vegetarian" {{$pizza->vegetarian ? 'checked' : ''}} value="1">
					<label class="form-check-label" for="vegetariana">VEGETARIANA</label>
				</div>
				
				<button type="submit" class="btn btn-primary">MODIFICA</button>
				<a class="btn btn-danger" href="{{ route('pizzas.index') }}">ANNULLA</a>
			</form>
		</div>
@endsection

