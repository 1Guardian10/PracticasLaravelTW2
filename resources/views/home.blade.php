@extends('Layouts.plantilla')

@section ('title','Home')

@section ('header','Bienvenido a mi Home')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Contenido Principal</h2>
    <p class="mb-4">Este es el contenido principal de la página de inicio.</p>
    <p>Utiliza las rutas definidas para navegar por la aplicación.</p>
    <a href="{{ route('libros.index') }}" class="text-blue-500 hover:underline">Ver libros</a>
    <a href="{{ route('clientes.index') }}" class="text-blue-500 hover:underline">Ver Clientes</a>
    <a href="{{ route('prestamos.index') }}" class="text-blue-500 hover:underline">Ver Prestamos</a>
</div>
@endsection

@push('scripts')
<script>
    console.log('Home cargado con exito');
<script>
@endpush