<?php
require_once "./mysql.php";
class Product
{
    public function getProd(){
        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            if (isset($_POST['prodid'])) {
                $prodid = $_POST['prodid'];
                $sql = "SELECT  *  FROM  `product` WHERE `prodid`=?";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute(array($prodid));
            } else {
                $sql = "SELECT  *  FROM  `product`";
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
    public function newProd()
    {
        $prodid = $_POST['prodid'];
        $prodname = $_POST['prodname'];
        $cost = $_POST['cost'];
        $unitprice = $_POST['unitprice'];
        $qty = $_POST['qty'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "INSERT INTO `product` (`prodid`, `prodname`, `cost`, `unitprice`, `qty`) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($prodid, $prodname, $cost, $unitprice, $qty));
            if ($result) {
                $count = $stmt->rowCount();
                return ($count < 1) ? $this->response(204,"新增失敗"):$this->response(200,"新增成功");
            } else {
                return $this->response(400,"SQL錯誤");
            }
        }
        return ($response);

    }
    function removeProd()
    {
        $prodid = $_POST['prodid'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "DELETE FROM `product` WHERE prodid=?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($prodid));
            if ($result) {
                $count = $stmt->rowCount();
                return ($count < 1) ? $this->response(204,"刪除失敗"):$this->response(200,"刪除成功");
            } else {
                return $this->response(400,"SQL錯誤");
            }
        }
        return ($response);


    }
    function updateProd()
    {
        $prodid = $_POST['prodid'];
        $prodname = $_POST['prodname'];
        $cost = $_POST['cost'];
        $unitprice = $_POST['unitprice'];
        $qty = $_POST['qty'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "UPDATE `product` SET `prodname`=?, `cost`=?, `unitprice`=?, `qty`=? WHERE prodid=?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($prodname, $cost, $unitprice, $qty, $prodid));
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
