@extends('Layouts.plantilla')

@section('title', 'Login')
@section('header', 'Login')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-md max-w-xl">
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Iniciar sesion</h2>

    <form action="{{ url('/login') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
            <input type="email" name="email" class="mt-1 w-full p-2 border border-gray-300 rounded focus:ring-blue-400" required>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">contraseña</label>
            <input type="password" name="password" class="mt-1 w-full p-2 border border-gray-300 rounded focus:ring-blue-400" required>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                Iniciar
            </button>
        </div>
    </form>

</div>
@endsection
