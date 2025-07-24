@extends('Layouts.plantilla')

@section ('title','Actualizar')

@section('header','Actualizar libro')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-md max-w-xl">
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Registrar nuevo libro</h2>

    <form action="{{ route('libros.update',$libro) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="titulo" class="block text-sm font-medium text-gray-700">Título del libro</label>
            <input type="text" name="titulo" id="titulo" class="mt-1 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" 
            required value="{{$libro?$libro->titulo:""}}">
        </div>

        <div>
            <label for="autor" class="block text-sm font-medium text-gray-700">Autor</label>
            <input type="text" name="autor" id="autor" class="mt-1 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" 
            required value="{{$libro?$libro->autor:""}}">
        </div>

        <div>
            <label for="editorial" class="block text-sm font-medium text-gray-700">Editorial</label>
            <input type="text" name="editorial" id="editorial" class="mt-1 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" 
            required value="{{$libro?$libro->editorial:""}}">
        </div>

        <div>
            <label for="anio" class="block text-sm font-medium text-gray-700">Año</label>
            <input type="number" name="anio" id="anio" class="mt-1 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" 
            required min="0" value="{{$libro?$libro->anio:0}}">
        </div>

        <div>
            <label for="fecha_publicacion" class="block text-sm font-medium text-gray-700">Fecha de publicación</label>
            <input type="date" name="fecha_publicacion" id="fecha_publicacion" class="mt-1 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" 
            required value="{{$libro?$libro->fecha_publicacion:date('Y-m-d') }}">
        </div>

        <div>
            <label for="DOI" class="block text-sm font-medium text-gray-700">DOI</label>
            <input type="text" name="DOI" id="DOI" class="mt-1 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" 
            required value="{{$libro?$libro->DOI:""}}">
        </div>

        <div>
            <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
            <select name="categoria" id="categoria" class="mt-1 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="programacion" {{ $libro->categoria == 'programacion' ? 'selected' : '' }}>Programación</option>
                <option value="analisis" {{ $libro->categoria == 'analisis' ? 'selected' : '' }}>Análisis</option>
                <option value="diseño" {{ $libro->categoria == 'diseño' ? 'selected' : '' }}>Diseño</option>
            </select>
        </div>

        <div>
            <input type="file" name="imagen" value="{{ $libro->imagen }}">
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                Actualizar Libro
            </button>
        </div>
    </form>
</div>
@endsection
