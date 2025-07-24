@extends('Layouts.plantilla')

@section('title', 'Libros')
@section('header', 'Lista de prestamo')

@section('content')
<div class="container mx-auto p-6 bg-green-100 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold text-center text-gray-700 mb-6">Libros Disponibles</h2>
    
    <div class="flex justify-end mb-4">
        <a href="{{route('prestamos.registrar')}}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            + Registrar nuevo prestamo
        </a>
    </div>

    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($prestamos as $prestamo)
            <li class="bg-white p-4 rounded-lg shadow flex items-center justify-between">
                <div>
                    <p class="text-lg font-semibold text-gray-800">{{ $prestamo->fecha_prestamo }}</p>
                    <p class="text-sm text-gray-500">estado: {{ $prestamo->estado }}</p>
                    <p class="text-sm text-gray-500">Id cliente: {{ $prestamo->idcliente }}</p>
                    <p class="text-sm text-gray-500">Id Libro: {{ $prestamo->idlibros }}</p><br>
                    
                </div>
                <div class="ml-auto flex gap-2">
                    <a href="{{ route('prestamos.edit', $prestamo->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 transition">
                        Editar
                    </a>
                    <a href="{{ route('prestamos.eliminar', $prestamo->id) }}" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                        Eliminar
                    </a>
                </div>
            </li>

        @endforeach
    </ul>

    <div class="mt-6">
        {{ $prestamos->links() }}
    </div>
</div>
@endsection