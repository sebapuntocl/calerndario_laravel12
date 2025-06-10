    <!-- Modal para agregar actividad -->
    <div class="modal fade" id="modalActividad" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="formActividad" method="POST" class="modal-content">
                @csrf
                <input type="hidden" id="input_method" name="_method" value="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Agregar Actividad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="fecha" id="modal_fecha">

                    <div class="mb-3">
                        <label for="modal_titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" id="modal_titulo" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="modal_hora" class="form-label">Hora</label>
                        <input type="time" name="hora" id="modal_hora" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="modal_descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="modal_descripcion" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>