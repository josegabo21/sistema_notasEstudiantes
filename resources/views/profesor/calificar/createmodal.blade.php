<div x-data="{ open: false }">
    <!-- Botón para abrir -->
    
    <button @click="open = true" ><svg class="h-20 w-20 text-slate-400 hover:text-black	"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="5" y1="12" x2="19" y2="12" /></svg></button>
  
    <!-- Modal -->
<div x-show="open" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
  <div class="bg-white p-6 rounded-lg shadow-lg w-96">
    <h2 class="text-xl font-bold mb-4 text-center">Añadir Boletin</h2>
    <form action="{{route('profesor.boletin.show', $student->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-4">
        <label class="block mb-2" for="momento">Lapso:</label>
        <select id="momento" name='momento' class="form-control" required>
                            <option value="" disabled selected>{{ __('Seleccione un Lapso') }}</option>
                            <option value="1">{{ __('1er Lapso') }}</option>
                            <option value="2">{{ __('2do Lapso') }}</option>
                            <option value="3">{{ __('3er Lapso') }}</option>
                        </select>
      </div>
      <div class="mb-4">
        <label class="block mb-2" for="documento">Selecciona un archivo:</label>
        <input type="file" id="documento" name="documento" accept=".pdf" required class="w-full p-2 border border-gray-300 rounded" />
      </div>

      <div class="mt-4 flex justify-end">
        <button type="submit" class="btn btn-info">Subir Documento</button>
        <button @click="open = false" class="ml-2 px-4 py-2 text-white btn btn-secondary rounded">Cerrar</button>
      </div>
    </form>
  </div>
</div>

<style>
    [x-cloak] {
        display: none;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>