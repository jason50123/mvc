<?php
require_once "./mysql.php";
class Role
{
    public function getRole(){
        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            if (isset($_POST['ID'])) {
                $ID = $_POST['ID'];
                $sql = "SELECT  *  FROM  `role` WHERE `ID`=?";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute(array($ID));
            } else {
                $sql = "SELECT  *  FROM  `role`";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute();
            }
            if ($result) {
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $this->response(200,"查詢成功",$rows);
            } else {
                return $this->response(400,"SQL錯誤");
            }
        }
        return ($response);

    }
    public function newRole()
    {

        $title = $_POST['title'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "INSERT INTO `role` (`title`) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($title));
            if ($result) {
                $count = $stmt->rowCount();
                return ($count < 1) ? $this->response(204,"新增失敗"):$this->response(200,"新增成功");
            } else {
                return $this->response(400,"SQL錯誤");
            }
        }
        return ($response);

    }
    function removeRole()
    {
        $ID = $_POST['ID'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "DELETE FROM `role` WHERE ID=?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($ID));
            if ($result) {
                $count = $stmt->rowCount();
                return ($count < 1) ? $this->response(204,"刪除失敗"):$this->response(200,"刪除成功");
            } else {
                return $this->response(400,"SQL錯誤");
            }
        }
        return ($response);


    }
    function updateRole()
    {
        $ID = $_POST['ID'];
        $title = $_POST['title'];
        
        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "UPDATE `role` SET `title`=? WHERE ID=?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($title));
            if ($result) {
                $count = $stmt->rowCount();
                return ($count < 1) ? $this->response(204,"更新失敗"): $this->response(200,"更新成功");
            } else {
                return $this->response(400,"SQL錯誤");
            }
        }
        return ($response);


    }
    private function response($status,$message,$result = NULL){
        $resp['status'] = $status;
        $resp['message'] = $message;
        $resp['result'] = $result;
        return $resp;
    }
}


?>
