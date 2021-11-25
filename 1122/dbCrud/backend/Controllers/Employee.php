<?php
require_once "./Controllers/Controller.php";
require_once "./DB.php";

class Employee extends Controller
{
    public function getUsers(){
        DB::connect();
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $sql = "SELECT * FROM `user` Where `id` = ?";
            $arg = array($id);
        }
        else{
            $sql = "SELECT * FROM `user`";
            $arg = NULL;
        }
        return DB::select($sql,$arg);
    }

    public function newUser(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $entrydate = $_POST['entrydate'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        DB::connect();
        $sql = "INSERT INTO `user`(`id`, `name`, `password`, `entrydate`, `address`, `email`, `phone`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        return DB::insert($sql, array($id, $name, $password, $entrydate, $address, $email, $phone));
    }
    
    public function removeUser(){
        $id = $_POST['id'];

        DB::connect();
        $sql = "DELETE FROM `user` WHERE id=?";
        return DB::delete($sql, array($id));
    }

    public function updateUser(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $entrydate = $_POST['entrydate'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        DB::connect();
        $sql = "UPDATE `user` SET `name`=?, `password`=?, `entrydate`=?, `address`=?, `email`=?, `phone`=? WHERE id=?";
        return DB::update($sql,array($name, $password, $entrydate, $address, $email, $phone, $id));
    }
    


}


?>