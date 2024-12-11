<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Editar 
                </div>
                @if($errors->any())
                <div class="p-6">
                    Datos Incorrectos
                </div>
                @endif
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.student.show',$student) }}">
                        @csrf
                        @method('PUT')
                        <label>
                            Nombre: 
                            <input type="text" name='nombre' value="{{old('nombre',$student->nombre)}}">
                        </label>
                        <br>
                        <br>
                        <label>
                            Apellido: 
                            <input type="text" name='apellido' value="{{old('apellido',$student->apellido)}}">
                        </label>
                        <br>
                        <br>
                        <label>
                            Edad: 
                            <input type="number" name='edad' min="5" max="12" value="{{old('edad',$student->edad)}}">
                        </label>
                        <br>
                        <br>
                        <label>
                            Grado: 
                            <input type="text" name='grado' maxlength="8" value="{{old('grado',$student->grado)}}">
                        </label>
                        <br>
                        <button type="submit">Actualizar Datos</button>
                        </form>

                </div>
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.student.destroy',$student) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar Estudiante</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-admin-app-layout>
