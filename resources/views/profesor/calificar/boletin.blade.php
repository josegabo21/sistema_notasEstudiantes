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
                <div class="bg-stone-400 rounded-lg px-8">
                        <div class="text-slate-950 font-semibold text-4xl py-1">
                            {{$boletin->momento}}
                        </div>
                        <div class="py-1">
                            <a href="{{route('profesor.boletin.descarga',$boletin->id)}}">
                                <svg class="h-5 w-5 text-gray-900"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg></a>                              
                        </div>
                </div>
                @endforeach
                <div class="bg-white rounded-lg px-1">
                        <a href="{{route('profesor.boletin.create',$student->id)}}">
                            <svg class="h-20 w-20 text-slate-400 hover:text-black	"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="5" y1="12" x2="19" y2="12" /></svg>                          
                        </a>                             
                </div>
                @else
                    <div class="p-6">
                        No se encuentran Boletines
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center p-8">
                    <form action="{{route('profesor.boletin.show', $student->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label>
                            Momento: 
                            <input type="text" name='momento'>
                        </label>
                        <!-- Campo para seleccionar archivo -->
                        <label for="documento">Selecciona un archivo:</label>
                        <input type="file" id="documento" name="documento" accept=".pdf" required />
                        <br />
                    
                        <!-- Botón para enviar el formulario -->
                        <button type="submit">Subir Documento</button>
                    </form>
                </div>
            </div>       
                @endif

        </div>
    </div>
</x-profesor-app-layout>
