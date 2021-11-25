<?php
require_once "./Controllers/Controller.php";
require_once "./DB.php";

class Role extends Controller
{
    public function getRole(){
        DB::connect();
        if (isset($_POST['ID'])) {
            $ID = $_POST['ID'];
            $sql = "SELECT  *  FROM  `role` WHERE `ID`=?";
            $arg = array($ID);
        }
        else{
            $sql = "SELECT  *  FROM  `role`";
            $arg = NULL;
        }
        return DB::select($sql,$arg);
        
    }

    public function newRole()
    {

        $title = $_POST['title'];

        DB::connect();
        $sql = "INSERT INTO `role` (`title`) VALUES (?)";
        return DB::insert($sql,array($title));
    
    }
    
    function removeRole()
    {
        $ID = $_POST['ID'];

        DB::connect();
        $sql = "DELETE FROM `role` WHERE ID=?";
        return DB::delete($sql,array($ID));

    }
    function updateRole()
    {
        $ID = $_POST['ID'];
        $title = $_POST['title'];
        
        DB::connect();
        $sql = "UPDATE `role` SET `title`=? WHERE ID=?";
        return DB::update($sql,array($title, $ID));
        
    }
}


?>
