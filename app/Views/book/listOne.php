<div class="container mt-5">
    <h2>Listado de mis Libros</h2>

    <!-- Tabla con DataTable -->
    <table id="reservationsTable" class="DataTable table table-striped table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Editorial</th>
                <th>Año de Publicación</th>
                <th>Cantidad</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $book) {?>
            <tr>
                <td><?=$book['title'] ?></td>
                <td><?=$book['author'] ?></td>
                <td><?=$book['isbn'] ?></td>
                <td><?=$book['publisher'] ?></td>
                <td><?=$book['publication_year'] ?></td>
                <td><?=$book['quantity'] ?></td>
                <td>
                    <?php 
                    $status = $book['status'];
                    $color = '';
                    switch ($status) {
                        case 'Activo':
                            $color = 'green'; // verde
                            break;
                        case 'Inactivo':
                            $color = 'red'; // rojo
                            break;
                        case 'Sin inventario':
                            $color = 'grey'; // gris
                            break;
                        default:
                            $color = '';
                            break;
                    }
                    ?>
                    <span style="color: <?= $color ?>"><?= ucfirst($status) ?></span>
                </td> 
                <td>
                    <div class="btn-group">
                        <!-- <button class="btn btn-warning" id="BookRent" data-url="<?= Helpers\generateUrl("Book","Book","viewModalRentBook",['b_id'=>$book['id']],"ajax")?>">
                            <i class="fas fa-book-reader"></i> Alquilar
                        </button>
                        <button class="btn btn-success" id="BookUpdate" data-url="<?= Helpers\generateUrl("Book","Book","viewModalBook",['b_id'=>$book['id']],"ajax")?>">
                            <i class="fas fa-book-reader"></i> Editar
                        </button>
                        <button class="btn btn-primary" id="BookStatus" data-url="<?= Helpers\generateUrl("Book","Book","viewModalStatusBook",['b_id'=>$book['id']],"ajax")?>">
                            <i class="fas fa-book-reader"></i> Cambiar Estado
                        </button> -->
                        <button class="btn btn-primary" id="BookReturnBook" data-url="<?= Helpers\generateUrl("Book","Book","viewModalReturnBook",['b_id'=>$book['b_id']],"ajax")?>">
                            <i class="fas fa-book-reader"></i>Devolver
                        </button>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- <?=var_dump(print_r($data));?> -->