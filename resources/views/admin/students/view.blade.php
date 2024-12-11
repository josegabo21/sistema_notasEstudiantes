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
                    {{ __("Estudiantes") }}
                </div>
            </div>
        </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="flex justify-center">
                <table class="border-collapse border border-slate-500">
                    <tr>
                        <th class="border border-slate-600 ...">Nombre</th>
                        <th class="border border-slate-600 ...">Apellido</th>
                        <th class="border border-slate-600 ...">Edad</th>
                        <th class="border border-slate-600 ...">Grado</th>
                        <th class="border border-slate-600 ...">Ver</th>
                    </tr>
                    @foreach ($students as $student)
                    <tr>
                        <td class="border border-slate-700 ...">{{$student->nombre}}</td>
                        <td class="border border-slate-700 ...">{{$student->apellido}}</td>
                        <td class="border border-slate-700 ...">{{$student->edad}}</td>
                        <td class="border border-slate-700 ...">{{$student->grado}}</td>
                        <td class="border border-slate-700 ..."><a href="{{route('admin.student.show',$student->id)}}">Mostrar</a></td>                            
                    </tr>
                    @endforeach
                </table>
              </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
