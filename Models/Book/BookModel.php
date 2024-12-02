<?php
namespace Models\Book;
require '../vendor/autoload.php';
use Models\MasterModel;

use function Helpers\dd;

Class BookModel extends MasterModel
{

    public function getAlls(){

        $sql="SELECT * FROM books";
        $params = []; 
        $result = $this->select($sql, $params);

        return $result;
    }

    public function getAllsByUser($user_id){
        $sql = "SELECT books.*,book_user.*
                FROM books 
                INNER JOIN book_user 
                ON books.id = book_user.book_id
                WHERE book_user.user_id = :user_id"; 
        $params = [':user_id' => $user_id]; 
        $result = $this->select($sql, $params);
        return $result;
    }
    
    
    public function getById($id)
    {
        $sql = "SELECT * FROM books WHERE id = :id";
        $params = [':id' => $id];
        $result = $this->select($sql, $params);
        return $result;
    }

    public function getMyBooksById($b_id,$user_id)
    {
     
        $sql = "SELECT books.*,book_user.*
                FROM books 
                INNER JOIN book_user 
                ON books.id = book_user.book_id
                WHERE book_user.user_id = :user_id AND book_user.b_id =:b_id"; 
        $params = [':user_id'=>$user_id,':b_id' => $b_id];
        $result = $this->select($sql, $params);
        return $result;
    }



    public function createBook($title, $author, $isbn, $publisher, $publication_year, $quantity)
    {
        $sql = "INSERT INTO books (title, author, isbn, publisher, publication_year, quantity) 
                VALUES (:title, :author, :isbn, :publisher, :publication_year, :quantity)";
        
        $params = [
            ':title' => $title,
            ':author' => $author,
            ':isbn' => $isbn,
            ':publisher' => $publisher,
            ':publication_year' => $publication_year,
            ':quantity' => $quantity
        ];
        
        return $this->insert($sql, $params);
    }


    public function updateBook($id, $title, $author, $isbn, $publisher, $publication_year, $quantity)
    {
        $sql = "UPDATE books 
                SET title = :title, author = :author, isbn = :isbn, publisher = :publisher, 
                    publication_year = :publication_year, quantity = :quantity 
                WHERE id = :id";
        
        $params = [
            ':id' => $id,
            ':title' => $title,
            ':author' => $author,
            ':isbn' => $isbn,
            ':publisher' => $publisher,
            ':publication_year' => $publication_year,
            ':quantity' => $quantity
        ];
        
        return $this->update($sql, $params);
    }

    public function changeBookStatus($id, $status)
    {
        $sql = "UPDATE books 
                SET status = :status
                WHERE id = :id";
        
        $params = [
            ':id' => $id,
            ':status' => $status
        ];
        
        return $this->update($sql, $params);
    }


    public function decreaseQuantityById($id, $quantity)
    {
        $sql = "SELECT quantity FROM books WHERE id = :id";
        $params = [':id' => $id];

        $currentQuantity = $this->select($sql, $params)[0]['quantity'];

        if ($currentQuantity - $quantity >= 0) {
            
            $newQuantity = $currentQuantity - $quantity;
            // var_dump($newQuantity);
            // die;
            $sql = "UPDATE books 
                    SET quantity = :new_quantity
                    WHERE id = :id";
            
            $params = [
                ':new_quantity' => $newQuantity,
                ':id' => $id,
            ];
            
            $this->update($sql, $params);
    
            if ($newQuantity == '0') {
                 // Actualización del estado a "Sin inventario"
                $sql = "UPDATE books 
                SET `status` = 'Sin inventario'
                WHERE id = :id";  
                $params = [
                    ':id' => $id 
                ];

                $this->update($sql,$params);
                    
            } 
            return true; 
        } else {
            return "No hay inventario suficiente.";
        }
        
    }
    
    public function increaseQuantityById($id, $quantity)
    {
        $sql = "UPDATE books 
                SET quantity = quantity + :quantity"; 
        // Verificar si el libro estaba en estado "Sin inventario"
        $book = $this->getById($id);
        if ($book && $book[0]['status'] == 'Sin inventario') {
            // Cambiar el estado a "Activo" ya que se incrementó el inventario
            $sql .= ", status = 'Activo'";
        }
    
        $sql .= " WHERE id = :id";
    
        $params = [
            ':id' => $id,
            ':quantity' => $quantity
        ];
    
        return $this->update($sql, $params);
    }
    
    

    
} 


?>