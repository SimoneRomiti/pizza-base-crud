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

			<h1>Crea una nuova pizza</h1>

			<form action="{{ route('pizzas.store') }}" method="post">
				@csrf
				@method('POST')

				<div class="form-group">
					<label for="nome">NOME</label>
					<input type="text" class="form-control" id="nome" name="name" value="{{ old('name') }}">
				</div>

				<div class="form-group">
					<label for="ingredienti">INGREDIENTI</label>
					<input type="text" class="form-control" id="ingredienti" name="ingredients" value="{{ old('ingredients') }}">
				</div>

				<div class="form-group">
					<label for="prezzo">PREZZO</label>
					<input type="text" class="form-control" id="prezzo" name="price" value="{{ old('price') }}">
				</div>

				<div class="form-group">
					<label for="immagine">IMMAGINE</label>
					<textarea class="form-control" name="img" id="immagine" cols="30" rows="10">{{ old('img') }}</textarea>
				</div>

				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="vegetariana" name="vegetarian" value="1" {{ old('vegetarian') ? 'checked' : '' }}>
					<label class="form-check-label" for="vegetariana">VEGETARIANA</label>
				</div>

				<button type="submit" class="btn btn-primary">CREA</button>
				<a class="btn btn-danger" href="{{ route('pizzas.index') }}">ANNULLA</a>
			</form>
		</div>
@endsection

