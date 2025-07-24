@extends('Layouts.plantilla')

@section ('title','Clientes')

@section('header','Listas de clientes')

@section('content')
<div class="conatiner mx-auto p-4 bg-green-200 flex flex-col justify-center items-center">
    <h2 class="text-2xl font-semibold mb-4">Clientes</h2>
    @if ($clientes->isEmpty())
        <p class="text-red-500">No hay clientes con ese nombre</p>
    @else
        <ul class="list-disc pl-5">
        @foreach ($clientes as $cliente)
            <li>{{ $cliente->nombre }}</li>
        @endforeach
        </ul>
    @endif
</div>
@endsection