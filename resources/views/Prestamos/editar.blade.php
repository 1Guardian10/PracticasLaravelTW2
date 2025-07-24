@extends('Layouts.plantilla')

@section ('title','Actualizar')

@section('header','Actualizar Prestamo')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-md max-w-xl">
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Registrar nuevo libro</h2>

    <form action="{{ route('prestamos.actualizar',$prestamo) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="fecha_prestamo" class="block text-sm font-medium text-gray-700">Fecha de préstamo</label>
            <input type="date" name="fecha_prestamo" class="mt-1 w-full p-2 border border-gray-300 rounded focus:ring-blue-400" 
            required value="{{$prestamo?$prestamo->fecha_prestamo:date('Y-m-d') }}">
        </div>
        <div>
            <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
            <select name="estado" class="mt-1 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="programacion" {{ $prestamo->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="analisis" {{ $prestamo->estado == 'devuelto' ? 'selected' : '' }}>Devuelto</option>
                <option value="diseño" {{ $prestamo->estado == 'atrasado' ? 'selected' : '' }}>Atrasado</option>
            </select>
        </div>
        
        <div>
            <label for="idcliente" class="block text-sm font-medium text-gray-700">Cliente</label>
            <select name="idcliente" class="mt-1 w-full p-2 border border-gray-300 rounded focus:ring-blue-400" required>
                <option value="">Selecciona un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}"
                        {{ (isset($prestamo) && $cliente->id == $prestamo->idcliente) ? 'selected' : '' }}>
                        {{ $cliente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="idlibros" class="block text-sm font-medium text-gray-700">Libro</label>
            <select name="idlibros" class="mt-1 w-full p-2 border border-gray-300 rounded focus:ring-blue-400" required>
                <option value="">Selecciona un libro</option>
                @foreach($libros as $libro)
                    <option value="{{ $libro->id }}" {{ $libro->id == $prestamo->idlibros ? 'selected' : '' }}>
                        {{ $libro->titulo }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                Actualizar prestamo
            </button>
        </div>
    </form>
</div>
@endsection
