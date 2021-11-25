<?php
require_once "./mysql.php";
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
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        DB::connect();
        $sql = "INSERT INTO `user`(`id`, `password`, `email`, `phone`) VALUES (?, ?, ?, ?)";
        return DB::insert($sql, array($id, $password, $email, $phone));
    }
    
    function removeUser(){
        $id = $_POST['id'];

        DB::connect();
        $sql = "UPDATE `user` SET `password` = ?, `email` = ?, `phone` = ? WHERE `id` = ?";
        return DB::delete($sql, array($id));
    }

    function updateUser(){
        $id = $_POST['id'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        DB::connect();
        $sql = "UPDATE `user` SET `password` = ?, `email` = ?, `phone` = ? WHERE id = ?";
        return DB::update($sql,array($id, $password, $email, $email));
    }
    


}


?>