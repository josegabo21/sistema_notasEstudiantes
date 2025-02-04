<x-profesor-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profesor Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center p-8">
                    <form action="{{route('profesor.boletin.show', $student->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label>
                            Momento: 
                        </label>
                        <input type="text" name='Momento' placeholder="Ingrese el momento" required>
                        <!-- Campo para seleccionar archivo -->
                        <label for="documento">Selecciona un archivo:</label>
                        <input type="file" id="documento" name="documento" accept=".pdf" required />
                        <br />
                    
                        <!-- Botón para enviar el formulario -->
                        <button type="submit">Subir Documento</button>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</x-profesor-app-layout>
