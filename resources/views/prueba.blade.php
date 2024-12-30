<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modal con Tailwind CSS</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen">

  <!-- Botón para abrir el modal -->
  <button id="openModal" class="px-4 py-2 text-white bg-blue-600 rounded">Abrir Modal</button>

  <!-- Modal -->
  <div id="modal" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
      <h2 class="text-xl font-bold mb-4">Ventana Emergente</h2>
      <p>Este es un modal creado con Tailwind CSS.</p>
      <div class="mt-4 flex justify-end">
        <button id="closeModal" class="px-4 py-2 text-white bg-red-600 rounded">Cerrar</button>
      </div>
    </div>
  </div>
 
  <script>
    const modal = document.getElementById('modal');
    const openModal = document.getElementById('openModal');
    const closeModal = document.getElementById('closeModal');

    openModal.addEventListener('click', () => {
      modal.classList.remove('hidden'); // Mostrar modal
    });

    closeModal.addEventListener('click', () => {
      modal.classList.add('hidden'); // Ocultar modal
    });
  </script>
</body>
</html>
