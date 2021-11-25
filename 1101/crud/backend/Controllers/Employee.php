<?php
require_once "./mysql.php";
class Employee
{
    public function getUsers(){
        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $sql = "SELECT  *  FROM  `user` WHERE `id`=?";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute(array($id));
            } else {
                $sql = "SELECT  *  FROM  `user`";
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
    public function newUser()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $entrydate = $_POST['entrydate'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "INSERT INTO `user` (`id`, `name`, `password`, `entrydate`, `address`, `email`, `phone`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($id, $name, $password, $entrydate, $address, $email, $phone));
            if ($result) {
                $count = $stmt->rowCount();
                return ($count < 1) ? $this->response(204,"新增失敗"):$this->response(200,"新增成功");
            } else {
                return $this->response(400,"SQL錯誤");
            }
        }
        return ($response);

    }
    function removeUser()
    {
        $id = $_POST['id'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "DELETE FROM `user` WHERE id=?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($id));
            if ($result) {
                $count = $stmt->rowCount();
                return ($count < 1) ? $this->response(204,"刪除失敗"):$this->response(200,"刪除成功");
            } else {
                return $this->response(400,"SQL錯誤");
            }
        }
        return ($response);


    }
    function updateUser()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $entrydate = $_POST['entrydate'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "UPDATE `user` SET `name`=?, `password`=?, `entrydate`=?, `address`=?, `email`=?, `phone`=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($name, $password, $entrydate, $address, $email, $phone, $id));
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
