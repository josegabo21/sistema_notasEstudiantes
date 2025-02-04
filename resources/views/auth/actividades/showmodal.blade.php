{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Añadir Actividad
</button> --}}

<div class="modal fade" id="ShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style=" max-height: 6rem;">
      <div class="card text-white mb-3" id="Content">
        <div class=" modal-header card-header container" >
         

          <div class="row">
            <!-- Columna principal que ocupa el espacio disponible -->
            <div class="col text-left p-0   ms-auto">
              <h1 id="eventModalTitle" class="font-monospace fs-2"></h1>
            </div>
        
            <!-- Grupo de dos columnas pegadas -->
            
          </div>        

        </div>
        <div class="modal-body card-body">
          <h5 class="card-title fst-italic fs-5" id="eventModalType"></h5>
          <p class="card-text fw-light" id="eventModaldescription"></p>
        </div>
      </div>     
    
    </div>
  </div>
</div>

