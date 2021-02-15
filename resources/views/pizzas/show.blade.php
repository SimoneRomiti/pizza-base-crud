@extends('layout.template')

@section('css')
	<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
@endsection

@section('main')
	<div class="container my-5">

		@if (session('message'))
			<div class="alert alert-success">
					{{ session('message') }}
			</div>
		@endif

		<div class="card animate__animated animate__bounceInDown" style="width: 18rem;">
			<img src="{{ $pizza->img }}" class="card-img-top" alt="immagine pizza">
			<div class="card-body">
				<h2 class="card-title">{{$pizza->name}}</h2>
				<p class="card-text"><span style="font-weight: 700">Ingredienti: </span>{{$pizza->ingredients}}</p>
				<p class="card-text"><span style="font-weight: 700">Vegetariana: </span> {{ $pizza->vegetarian ? 'SI' : 'NO' }}
				
				</p>
				<p class="card-text"><span style="font-weight: 700">Prezzo: </span>{{number_format($pizza->price, 2, ",", ".")."€"}}</p>
				<a href="{{ route('pizzas.index') }}" class="btn btn-primary">FATTO</a>
			</div>
		</div>
	</div>

@endsection

	