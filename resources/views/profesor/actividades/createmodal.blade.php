{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Añadir Actividad
</button> --}}

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h1 class="modal-title fs-5" >Añadir Actividad</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="title" name="title" placeholder="Titulo">
            <label for="title" class="form-label">Titulo</label>
          </div>
          <div class="form-floating mb-3">
            <textarea class="form-control" id="description" rows="3" name="description" style="height: 100px" placeholder="description"></textarea>
            <label for="description" class="form-label" >Descripci&oacuten</label>
          </div>
          <div class="mb-3">
            <select class="form-select form-select-sm" aria-label="Small select example" id="type" name="type">
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
            <input type="datetime-local" class="form-control" id="start" rows="3" name="start">
            <label for="start" class="form-label">Fecha de Inicio</label>
          </div>
          <div class="form-floating mb-3">
            <input type="datetime-local" class="form-control" id="end" rows="3" name="end">
            <label for="end" class="form-label">Fecha de Finalizaci&oacuten</label>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="allDay" name="allDay">
            <label class="form-check-label" for="allDay">
              Todo el D&iacutea
            </label>
          </div>          
          <div class="mb-3">
            <label for="backgroundColor" class="form-label">Color</label>
            <input type="color" class="form-control form-control-color" id="backgroundColor" value="#563d7c" title="Elige el color" name="backgroundColor">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>

     
    </div>
  </div>
</div>

