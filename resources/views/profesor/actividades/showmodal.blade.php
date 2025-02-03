{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Añadir Actividad
</button> --}}

<div class="modal fade" id="ShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content " style=" max-height: 6rem;">
      <div class="card text-white mb-3 container" id="Content">
        <div class=" modal-header card-header row d-flex flex-nowrap justify-content-between" >
         

            <!-- Columna principal que ocupa el espacio disponible -->
            <div class="col"  style="min-width: 0;">
              <h1 id="eventModalTitle" class="modal-title font-monospace fs-2 mb-0"></h1>
            </div>
        
            <div class="col-auto">
                  <button type="button" data-bs-toggle="modal" data-bs-target="#editModal">
                    <svg class="h-8 w-8 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    </button>
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

