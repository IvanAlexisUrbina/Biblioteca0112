<?php
require '../vendor/autoload.php';
use Models\Book\BookModel;
use Models\Book\BookUserModel;

use function Helpers\alert;
use function Helpers\dd;
use function Helpers\generateUrl;
use function Helpers\redirect;
use function Helpers\view;

class BookController
{  
   public function listBooks(){
      $obj = new BookModel();
      $books=$obj->getAlls();
        view('book', 'list',$books); 
   }

   public function listBooksOne(){
      $obj = new BookModel();
      $books=$obj->getAllsByUser($_SESSION['idUser']);
        view('book', 'listOne',$books); 
   }

   public function viewCreateBook(){

      view('book', 'modal'); 
   }

   public function viewModalBook(){
      $b_id=$_GET['b_id'];
      $obj = new BookModel();
      $book=$obj->getById($b_id);
      view('book', 'modalUpdate',$book); 
   }

   public function viewModalStatusBook(){
      $b_id=$_GET['b_id'];
      $obj = new BookModel();
      $book=$obj->getById($b_id);
      view('book', 'modalUpdateStatus',$book[0]); 
   }

   public function viewModalReturnBook(){
      $b_id=$_GET['b_id'];
      $obj = new BookModel();
      $book=$obj->getMyBooksById($b_id,$_SESSION['idUser']);
      view('book', 'modalReturnBook',$book[0]); 
   }

   public function viewModalRentBook(){
      $b_id=$_GET['b_id'];
      $obj = new BookModel();
      $book=$obj->getById($b_id);
      view('book', 'modalRentBook',$book[0]); 
   }

   public function returnBook()
   {
       $id = $_GET["b_id"];
       $cantReturn = $_POST["quantity"];
   
       $bookModel = new BookModel();
       $bookUserModel = new BookUserModel();
   
       // Obtener la cantidad actual del libro prestado por el usuario
       $book = $bookModel->getMyBooksById($id, $_SESSION['idUser']);
       $currentQuantity = $book[0]['quantity'];
   
       // Validar si la cantidad a devolver es válida
       if ($cantReturn <= 0 || $cantReturn > $currentQuantity) {
           alert('La cantidad a devolver no es válida');
           redirect(generateUrl("Book", "Book", "listBooksOne"));
       }
   
       // Actualizar la cantidad en el inventario
       $newQuantity = $currentQuantity - $cantReturn;
            // Actualizar la cantidad devuelta en la tabla book_user
       $bookUserModel->updateBookUserQuantity($_SESSION['idUser'], $id, $newQuantity);
       $bookModel->increaseQuantityById($book[0]['id'], $cantReturn);
   
       // Eliminar el registro del libro prestado en la tabla book_user si la cantidad llega a 0
       if ($newQuantity == 0) {
           $bookUserModel->deleteBookUser($_SESSION['idUser'], $id);
       }
       redirect(generateUrl("Book", "Book", "listBooksOne"));
   }
   
   
   public function createBook()
   {
      $title = $_POST["title"];
      $author = $_POST["author"];
      $isbn = $_POST["isbn"];
      $publisher = $_POST["publisher"];
      $publication_year = $_POST["publication_year"];
      $quantity = $_POST["quantity"];
      $obj = new BookModel();
      $obj->createBook($title, $author, $isbn, $publisher, $publication_year, $quantity);
      redirect(generateUrl("Book","Book","listBooks"));
   }

   public function updateBook()
   {  
        $id = $_GET["b_id"]; 
        $title = $_POST["title"];
        $author = $_POST["author"];
        $isbn = $_POST["isbn"];
        $publisher = $_POST["publisher"];
        $publication_year = $_POST["publication_year"];
        $quantity = $_POST["quantity"];
        $bookModel = new BookModel();
        $result = $bookModel->updateBook($id, $title, $author, $isbn, $publisher, $publication_year, $quantity);
        redirect(generateUrl("Book","Book","listBooks"));

   }

   public function changeBookStatus()
   {
      $id = $_GET["b_id"];
      $status = $_POST["status"];
      $bookModel = new BookModel();
      $result = $bookModel->changeBookStatus($id, $status);
      redirect(generateUrl("Book", "Book", "listBooks"));
   }

   public function rentBook()
   {
       $id = $_GET["b_id"];
       $cantRent = $_POST["quantity"];

       $bookModel = new BookModel();
       $BookUserModel = new BookUserModel();
       $book = $bookModel->getById($id);
       $quantity = $book[0]['quantity'];

       if ($quantity <= 0) {
           alert('No hay Inventario de este libro');
           redirect(generateUrl("Book", "Book", "listBooks"));
       }
       $newQuantity = $quantity - $cantRent;

       if ($newQuantity < 0) {
           alert('No hay tantas existencias de este libro');
           redirect(generateUrl("Book", "Book", "listBooks"));
       } else {
         $bookModel->decreaseQuantityById($id, $cantRent);
         $BookUserModel->createBookUser($_SESSION['idUser'],$id,$cantRent);
       }   
       redirect(generateUrl("Book", "Book", "listBooks"));
   }
   



}






?>