<div class="container mt-5">
    <h2 class="text-center mb-4">Editar Libro</h2>
    <?php foreach ($data as $b) {?>
    <form action="<?=Helpers\generateUrl("Book","Book","UpdateBook",['b_id'=>$b['id']])?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="titulo">Título:</label>
                <input type="text" value="<?=$b['title']?>" name="title" class="form-control" id="titulo" placeholder="Ingrese el título del libro">
            </div>
            <div class="form-group col-md-6">
                <label for="autor">Autor:</label>
                <input type="text" value="<?=$b['author']?>" name="author" class="form-control" id="autor" placeholder="Ingrese el autor del libro">
            </div>
            <div class="form-group col-md-6">
                <label for="isbn">ISBN:</label>
                <input type="text" value="<?=$b['title']?>" name="isbn" class="form-control" id="isbn" placeholder="Ingrese el ISBN del libro">
            </div>
            <div class="form-group col-md-6">
                <label for="editorial">Editorial:</label>
                <input type="text" value="<?=$b['publisher']?>" name="publisher" class="form-control" id="editorial" placeholder="Ingrese la editorial del libro">
            </div>
            <div class="form-group col-md-6">
                <label for="anio_publicacion">Año de Publicación:</label>
                <input type="number" value="<?=$b['publication_year']?>" name="publication_year" class="form-control" id="anio_publicacion"
                    placeholder="Ingrese el año de publicación">
            </div>
            <div class="form-group col-md-6">
                <label for="cantidad">Cantidad:</label>
                <input type="number" value="<?=$b['quantity']?>" name="quantity" class="form-control" id="cantidad" placeholder="Ingrese la cantidad de ejemplares">
            </div>
            <?php  } ?>
            <div class="col-md-12 text-center mt-2 mb-2">
                <button type="submit" class="btn btn-primary btn-submit">Editar Libro</button>
            </div>
        </div>
   

    </form>
</div>