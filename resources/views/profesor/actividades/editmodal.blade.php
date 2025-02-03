{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
  Añadir Actividad
</button> --}}

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h1 class="modal-title fs-5" >Editar Actividad</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('profesor.calendar.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="hidden" id="usuario_id" name="id" >
            <input type="text" class="form-control" id="title2" name="title" placeholder="Titulo">
            <label for="title2" class="form-label">Titulo</label>
          </div>
          <div class="form-floating mb-3">
            <textarea class="form-control" id="description2" rows="3" name="description" style="height: 100px" placeholder="description"></textarea>
            <label for="description2" class="form-label" >Descripci&oacuten</label>
          </div>
          <div class="mb-3">
            <select class="form-select form-select-sm" aria-label="Small select example" id="type2" name="type">
              <option selected>Seleccione tipo  de actividad</option>
                  <option value="Clase teórica">Clase teórica</option>
                  <option value="Clase práctica">Clase práctica</option>
                  <option value="Examen">Examen</option>
                  <option value="Tarea">Tarea</option>
                  <option value="Proyecto grupal">Proyecto grupal</option>
                  <option value="Actividad artística">Actividad artística</option>
                  <option value="Actividad deportiva">Actividad deportiva</option>
                  <option value="Excursión o salida escolar">Excursión o salida escolar</option>
                  <option value="Otro">Otro</option>
            </select>
          </div>
          <div class="form-floating mb-3">
            <input type="datetime-local" class="form-control" id="start2" rows="3" name="start">
            <label for="start2" class="form-label">Fecha de Inicio</label>
          </div>
          <div class="form-floating mb-3">
            <input type="datetime-local" class="form-control" id="end2" rows="3" name="end">
            <label for="end2" class="form-label">Fecha de Finalizaci&oacuten</label>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="allDay2" name="allDay">
            <label class="form-check-label" for="allDay2">
              Todo el D&iacutea
            </label>
          </div>          
          <div class="mb-3">
            <label for="backgroundColor2" class="form-label">Color</label>
            <input type="color" class="form-control form-control-color" id="backgroundColor2" value="#563d7c" title="Elige el color" name="backgroundColor">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#deleteModal">Eliminar</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>

     
    </div>
  </div>
</div>

