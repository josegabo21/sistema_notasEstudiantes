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
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="flex justify-center">
                <table class="border-collapse border border-slate-500">
                    <tr>
                        <th class="border border-slate-600 ...">Nombre</th>
                        <th class="border border-slate-600 ...">Apellido</th>
                        <th class="border border-slate-600 ...">Edad</th>
                        <th class="border border-slate-600 ...">Grado</th>
                        <th class="border border-slate-600 ...">Momentos</th>
                    </tr>
                    @foreach ($students as $student)
                    <tr>
                        <td class="border border-slate-700 ...">{{$student->nombre}}</td>
                        <td class="border border-slate-700 ...">{{$student->apellido}}</td>
                        <td class="border border-slate-700 ...">{{$student->edad}}</td>
                        <td class="border border-slate-700 ...">{{$student->grado}}</td>
                        <td class="border border-slate-700 ..."><a href="{{route('profesor.boletin.show',$student->id)}}"><svg class="h-8 w-8 text-gray-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 4h3l2 2h5a2 2 0 0 1 2 2v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />  <path d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h2" /></svg>
                            </a></td>                            
                    </tr>
                    @endforeach
                </table>
              </div>
            </div>
        </div>
    </div>
</x-profesor-app-layout>
