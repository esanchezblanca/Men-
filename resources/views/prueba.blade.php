@extends('layout')
@section('title', 'Mi pagina de prueba')


@section('content')
    <p>Esto es mi body</p>

    @foreach ($plateIngredients as $plateIngredient)
    <ul>
        <li>Titulo: {{ $plateIngredient['plate']->title }}</li>
        <li>Comenzales: {{ $plateIngredient['plate']->diners }}</li>
        <li>Tipo: {{ $plateIngredient['plate']->type }}</li>
        <ul>
            @foreach ($plateIngredient['ingredients'] as $ingredient)
                <li> {{ $ingredient['quantity'] }} {{ $ingredient['name'] }}</li>
            @endforeach
        </ul>
    </ul>
@endforeach
@endsection
