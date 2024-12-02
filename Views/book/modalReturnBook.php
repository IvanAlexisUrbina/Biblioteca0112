<div class="container mt-5">
    <h2 class="text-center mb-4">Devolver Libro</h2>
    <form action="<?= Helpers\generateUrl("Book", "Book", "returnBook", ['b_id' => $data['b_id']]) ?>" method="POST">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="nombre">Nombre del Libro:</label>
                <input type="text" value="<?= $data['title'] ?>" class="form-control" id="nombre" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="cantidad">Cantidad a Devolver:</label>
                <input type="number" class="form-control" id="cantidad" name="quantity" min="1" max="<?= $data['quantity'] ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="cantidad_actual">Cantidad Actual:</label>
                <input type="text" value="<?= $data['quantity'] ?>" class="form-control" id="cantidad_actual" readonly>
            </div>
        </div>
        <div class="col-md-12 text-center mt-2 mb-2">
            <button type="submit" class="btn btn-primary btn-submit">Devolver</button>
        </div>
    </form>
</div>
<!-- <?=var_dump($data);?> -->
