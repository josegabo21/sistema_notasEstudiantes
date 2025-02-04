<x-profesor-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profesor Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center">
                @if ($boletines->count())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-center">
                      <table class="border-collapse border border-slate-500">
                          <tr>
                              <th class="border border-slate-600 ...">Boletin</th>
                              <th class="border border-slate-600 ...">Descargar</th>
                          </tr>
                          @foreach ($boletines as $boletin)
                          <tr>
                              <td class="border border-slate-700 ...">{{$boletin->momento}}</td>
                              <td class="border border-slate-700 ..."><a href="{{route('profesor.boletin.descarga',$boletin->id)}}">LINK</a></td>
                            
                          </tr>
                          @endforeach
                          <tr>
                            <td align="center" colspan="2">
                                <a href="{{route('profesor.boletin.create',$student->id)}}">
                                    <svg class="h-6 w-6 text-gray-900"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>                           
                                </a>
                            </td>
                          </tr>
                      </table>
                    </div>
                  </div>

                @else
                    <div class="p-6">
                        No se encuentran Boletines
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center p-8">
                    @include("profesor.calificar.createmodal")
                </div>
            </div>       
                @endif

        </div>
    </div>
</x-profesor-app-layout>
