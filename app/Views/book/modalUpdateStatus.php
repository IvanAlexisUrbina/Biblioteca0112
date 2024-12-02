<div class="container mt-5">
    <h2 class="text-center mb-4">Editar Estado del Libro</h2>
    <form action="<?= Helpers\generateUrl("Book", "Book", "changeBookStatus", ['b_id' => $data['id']]) ?>" method="POST">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="nombre">Nombre del Libro:</label>
                <input type="text" value="<?= $data['title'] ?>" class="form-control" id="nombre" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="autor">Autor:</label>
                <input type="text" value="<?= $data['author'] ?>" class="form-control" id="autor" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="estado">Estado:</label>
                <select name="status" class="form-select" id="estado">
                    <option value="Activo" <?= $data['status'] == 'Activo' ? 'selected' : '' ?>>Activo</option>
                    <option value="Inactivo" <?= $data['status'] == 'Inactivo' ? 'selected' : '' ?>>Inactivo</option>
                    <option value="Sin inventario" <?= $data['status'] == 'Sin inventario' ? 'selected' : '' ?>>Sin Inventario</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 text-center mt-2 mb-2">
            <button type="submit" class="btn btn-primary btn-submit">Actualizar Estado</button>
        </div>
    </form>
</div>
