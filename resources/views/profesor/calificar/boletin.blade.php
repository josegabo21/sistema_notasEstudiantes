<x-profesor-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profesor Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="flex flex-wrap gap-2 p-4">
                @if ($boletines->count())
                @foreach ($boletines as $boletin)
                <div class="relative bg-white hover:bg-sky-600/25 h-30 rounded-lg px-8">
                    <div class="absolute top-2 right-2">
                        <a href="{{route('profesor.boletin.descarga',$boletin->id)}}">
                            <svg class="h-5 w-5 text-gray-900"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg></a>                              
                    </div>
                    <div class=" flex flex-col justify-center items-center h-full">
                        <svg class="h-20 w-20 text-slate-800"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />  <polyline points="14 2 14 8 20 8" />  <line x1="16" y1="13" x2="8" y2="13" />  <line x1="16" y1="17" x2="8" y2="17" />  <polyline points="10 9 9 9 8 9" /></svg>
                        <div class="text-slate-950 font-semibold">
                            Momento {{$boletin->momento}}
                        </div>
                    </div>


                </div>
                @endforeach
                <div class="flex justify-center items-center bg-white h-30 rounded-lg px-1">
                    @include("profesor.calificar.createmodal")                            
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
