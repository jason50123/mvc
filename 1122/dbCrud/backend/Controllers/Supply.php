<?php
require_once "./Controllers/Controller.php";
require_once "./DB.php";

class Supply extends Controller
{
    public function getSupply(){
        DB::connect();
        if (isset($_POST['supId'])) {
            $supId = $_POST['supId'];
            $sql = "SELECT  *  FROM  `supply` WHERE `supId`=?";
            $arg = array($supId);
        }
        else{
            $sql = "SELECT  *  FROM  `supply`";
            $arg = NULL;
        }
        return DB::select($sql,$arg);
        
    }

    public function newSupply()
    {
        $supName = $_POST['supName'];
        $contact = $_POST['contact'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        DB::connect();
        $sql = "INSERT INTO `supply` (`supName`, `contact`, `phone`, `address`) VALUES (?, ?, ?, ?)";
        return DB::insert($sql,array($supName, $contact, $phone, $address));

    }
    function removeSupply()
    {
        $supId = $_POST['supId'];

        DB::connect();
        $sql = "DELETE FROM `supply` WHERE supId=?";
        return DB::delete($sql, array($supId));

    }
    function updateSupply()
    {
        $supId = $_POST['supId'];
        $supName = $_POST['supName'];
        $contact = $_POST['contact'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        
        DB::connect();
        $sql = "UPDATE `supply` SET `supName`=?, `contact`=?, `phone`=?, `address`=? WHERE supId=?";
        return DB::update($sql,array($supName, $contact, $phone, $address, $supId));

    }
}


?>
