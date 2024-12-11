<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="flex justify-left">
                <div class="p-6 text-gray-900">
                    Estudiante
                </div>
            </div>
            <div class="p-6">
                {{$student->nombre}} {{$student->apellido}} de {{$student->grado}}
            </div>
            <div class="p-6">
                <a href="{{route('admin.student.edit',$student)}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    Editar
                </a>
            </div>

        </div>
    </div>
</x-profesor-app-layout>
