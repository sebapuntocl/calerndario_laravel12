<h2 class="mb-3">Agregar nueva actividad</h2>

<form method="POST" action="{{ route('actividades.store') }}" class="row g-3">
    @csrf
    <div class="col-md-6">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" name="titulo" id="titulo" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label for="hora" class="form-label">Hora</label>
        <input type="time" name="hora" id="hora" class="form-control" required>
    </div>

    <div class="col-12">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-success">Guardar Actividad</button>
    </div>
</form>
