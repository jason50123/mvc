<?php
require_once "./mysql.php";
class Supply
{
    public function getSupply(){
        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            if (isset($_POST['supId'])) {
                $supId = $_POST['supId'];
                $sql = "SELECT  *  FROM  `supply` WHERE `supId`=?";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute(array($supId));
            } else {
                $sql = "SELECT  *  FROM  `supply`";
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
    public function newSupply()
    {
        $supId = $_POST['supId'];
        $supName = $_POST['supName'];
        $contact = $_POST['contact'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "INSERT INTO `supply` (`supId`, `supName`, `contact`, `phone`, `address`) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($supId, $supName, $contact, $phone, $address));
            if ($result) {
                $count = $stmt->rowCount();
                return ($count < 1) ? $this->response(204,"新增失敗"):$this->response(200,"新增成功");
            } else {
                return $this->response(400,"SQL錯誤");
            }
        }
        return ($response);

    }
    function removeSupply()
    {
        $supId = $_POST['supId'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "DELETE FROM `supply` WHERE supId=?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($supId));
            if ($result) {
                $count = $stmt->rowCount();
                return ($count < 1) ? $this->response(204,"刪除失敗"):$this->response(200,"刪除成功");
            } else {
                return $this->response(400,"SQL錯誤");
            }
        }
        return ($response);


    }
    function updateSupply()
    {
        $supId = $_POST['supId'];
        $supName = $_POST['supName'];
        $contact = $_POST['contact'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "UPDATE `supply` SET `supName`=?, `contact`=?, `phone`=?, `address`=? WHERE supId=?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($supName, $contact, $phone, $address, $supId));
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
