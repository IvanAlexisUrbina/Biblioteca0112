<div class="container mt-5">
    <h2 class="text-center mb-4">Crear Libro</h2>
    <form action="<?=Helpers\generateUrl("Book","Book","CreateBook")?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="titulo">Título:</label>
                <input type="text" name="title" class="form-control" id="titulo" placeholder="Ingrese el título del libro">
            </div>
            <div class="form-group col-md-6">
                <label for="autor">Autor:</label>
                <input type="text" name="author" class="form-control" id="autor" placeholder="Ingrese el autor del libro">
            </div>
            <div class="form-group col-md-6">
                <label for="isbn">ISBN:</label>
                <input type="text" name="isbn" class="form-control" id="isbn" placeholder="Ingrese el ISBN del libro">
            </div>
            <div class="form-group col-md-6">
                <label for="editorial">Editorial:</label>
                <input type="text" name="publisher" class="form-control" id="editorial" placeholder="Ingrese la editorial del libro">
            </div>
            <div class="form-group col-md-6">
                <label for="anio_publicacion">Año de Publicación:</label>
                <input type="number" name="publication_year" class="form-control" id="anio_publicacion"
                    placeholder="Ingrese el año de publicación">
            </div>
            <div class="form-group col-md-6">
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="quantity" class="form-control" id="cantidad" placeholder="Ingrese la cantidad de ejemplares">
            </div>
            <div class="col-md-12 text-center mt-2 mb-2">
                <button type="submit" class="btn btn-primary btn-submit">Crear Libro</button>
            </div>
        </div>
    </form>
</div>