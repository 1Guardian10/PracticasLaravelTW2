@extends('Layouts.plantilla')

@section('title', 'Libros')
@section('header', 'Lista de Libros')

@section('content')
<div class="container mx-auto p-6 bg-green-100 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold text-center text-gray-700 mb-6">Libros Disponibles</h2>
    
    <div class="flex justify-end mb-4">
        <a href="{{ route('libros.crear') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            + Registrar nuevo libro
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($libros as $libro)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col">
                <div class="w-full flex justify-center bg-gray-100">
                    <img
                        src="{{asset('storage/'. $libro->imagen)}}"
                        alt="Portada del libro"
                        class="w-full h-50 object-cover hover:scale-105 transition-transform duration-300"
                    />
                </div>

                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 mb-2 leading-tight">{{ $libro->titulo }}</h2>

                        <div class="flex items-center mb-3">
                            <svg class="w-4 h-4 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700 font-medium">{{ $libro->autor }}</span>
                        </div>

                        <div class="flex items-center mb-4">
                            <svg class="w-4 h-4 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <span class="text-gray-600">Publicado en {{ $libro->anio }}</span>
                        </div>

                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full">
                            {{ $libro->categoria }}
                        </span>
                    </div>

                    <div class="mt-4 flex justify-end gap-2">
                        <a href="{{ route('libros.editar', $libro->id) }}"
                           class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 transition">
                            Editar
                        </a>
                        <form action="{{ route('libros.eliminar', $libro->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este libro?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $libros->links() }}
    </div>
</div>
@endsection