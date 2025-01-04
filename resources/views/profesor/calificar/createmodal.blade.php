<div x-data="{ open: false }">
    <!-- Botón para abrir -->
    
    <button @click="open = true" ><svg class="h-20 w-20 text-slate-400 hover:text-black	"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="5" y1="12" x2="19" y2="12" /></svg></button>
  
    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
      <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4">Ventana Emergente</h2>
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
        <div class="mt-4 flex justify-end">
          <button @click="open = false" class="px-4 py-2 text-white bg-red-600 rounded">Cerrar</button>
        </div>
      </div>
    </div>
</div>