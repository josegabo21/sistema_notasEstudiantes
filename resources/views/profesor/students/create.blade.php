<x-profesor-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profesor Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Registrar Estudiante
                </div>
                <div class="p-6">
                    <form method="POST" action="{{ route('profesor.dashboard') }}">
                        @csrf
                        <label>
                            Nombre: 
                            <input type="text" name='nombre'>
                        </label>
                        <br>
                        <br>
                        <label>
                            Apellido: 
                            <input type="text" name='apellido'>
                        </label>
                        <br>
                        <br>
                        <label>
                            Edad: 
                            <input type="number" name='edad' min="5" max="12">
                        </label>
                        <br>
                        <br>
                        <label>
                            Grado: 
                            <input type="text" name='grado' maxlength="8">
                        </label>
                        <br>
                        <button type="submit">Registrar</button>
                        <button type="reset">Borrar</button>
                </div>
            </div>
        </div>
    </div>
</x-profesor-app-layout>
