<?php
namespace Models\Book;
require '../vendor/autoload.php';
use Models\MasterModel;

use function Helpers\dd;

Class BookUserModel extends MasterModel
{

    public function getAllBookUser(){

        $sql="SELECT * FROM book_user";
        $params = []; 
        $result = $this->select($sql, $params);

        return $result;
    }
    
    public function getById($id)
    {
        $sql = "SELECT * FROM book_user WHERE id = :id";
        $params = [':id' => $id];
        $result = $this->select($sql, $params);
        return $result;
    }

    public function createBookUser($user_id, $book_id, $quantity)
    {
        $sql = "INSERT INTO book_user (user_id, book_id, quantity) 
                VALUES (:user_id, :book_id, :quantity)";
        
        $params = [
            ':user_id' => $user_id,
            ':book_id' => $book_id,
            ':quantity' => $quantity
        ];
        
        return $this->insert($sql, $params);
    }


    public function updateBookUser($id, $user_id, $book_id, $quantity)
    {
        $sql = "UPDATE book_user 
                SET user_id = :user_id, book_id = :book_id, quantity = :quantity
                WHERE id = :id";
        
        $params = [
            ':id' => $id,
            ':user_id' => $user_id,
            ':book_id' => $book_id,
            ':quantity' => $quantity
        ];
        
        return $this->update($sql, $params);
    }

    public function deleteBookUser($user_id, $b_id)
    {
        $sql = "DELETE FROM book_user WHERE user_id = :user_id AND b_id = :b_id";
        $params = [':user_id' => $user_id, ':b_id' => $b_id];

        return $this->delete($sql, $params);
    }

    public function updateBookUserQuantity($user_id, $b_id, $returned_quantity)
    {
        $sql = "UPDATE book_user 
                SET quantity = quantity - :returned_quantity
                WHERE user_id = :user_id AND b_id = :b_id";
        
        $params = [
            ':user_id' => $user_id,
            ':b_id' => $b_id,
            ':returned_quantity' => $returned_quantity
        ];
        
        return $this->update($sql, $params);
    }
} 
