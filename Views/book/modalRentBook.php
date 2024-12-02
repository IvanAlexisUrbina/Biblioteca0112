<div class="container mt-5">
    <h2 class="text-center mb-4">Rentar Libro</h2>
    <form action="<?= Helpers\generateUrl("Book", "Book", "rentBook", ['b_id' => $data['id']]) ?>" method="POST">
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
                <label for="cantidad">Cantidad a Alquilar:</label>
                <input type="number" name="quantity" class="form-control" id="cantidad" min="1" required>
            </div>
        </div>
        <div class="col-md-12 text-center mt-2 mb-2">
            <button type="submit" class="btn btn-primary btn-submit">Rentar Libro</button>
        </div>
    </form>
</div>
