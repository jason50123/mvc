<?php
require_once "./Controllers/Controller.php";
require_once "./DB.php";

class Product extends Controller
{
    public function getProd(){
        DB::connect();
        if(isset($_POST['prodid'])){
            $prodid = $_POST['prodid'];
            $sql = "SELECT  *  FROM  `product` WHERE `prodid`=?";
            $arg = array($prodid);
        }
        else{
            $sql = "SELECT * FROM `product`";
            $arg = NULL;
        }
        return DB::select($sql,$arg);
        
    }
    public function newProd()
    {
        $prodid = $_POST['prodid'];
        $prodname = $_POST['prodname'];
        $cost = $_POST['cost'];
        $unitprice = $_POST['unitprice'];
        $qty = $_POST['qty'];

        DB::connect();
        $sql = "INSERT INTO `product` (`prodid`, `prodname`, `cost`, `unitprice`, `qty`) VALUES (?, ?, ?, ?, ?)";
        return DB::insert($sql,array($prodid, $prodname, $cost, $unitprice, $qty));

    }
    
    function removeProd()
    {
        $prodid = $_POST['prodid'];

        DB::connect();
        $sql = "DELETE FROM `product` WHERE prodid=?";
        return DB::delete($sql,array ($prodid));

    }
    function updateProd()
    {
        $prodid = $_POST['prodid'];
        $prodname = $_POST['prodname'];
        $cost = $_POST['cost'];
        $unitprice = $_POST['unitprice'];
        $qty = $_POST['qty'];

        DB::connect();
        $sql = "UPDATE `product` SET `prodname`=?, `cost`=?, `unitprice`=?, `qty`=? WHERE prodid=?";
        return DB::update($sql, array($prodname, $cost, $unitprice, $qty, $prodid));

        
    }
    
}


?>
