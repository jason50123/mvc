<?php
require_once "./Controllers/Controller.php";
class DB extends Controller{
    private static $dbHost = 'localhost';
    private static $dbName = 'erp';
    private static $dbUser = 'root';
    private static $dbPassword = '';
    private static $conn = NULL;
    
    static function connect(){
        //判斷$conn是否存在，如果不存在，連結資料庫，產生$conn
        if(self::$conn != NULL)return;
        $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", self::$dbHost, self::$dbName);
        try{
            self::$conn = new PDO($dsn, self::$dbUser, self::$dbPassword);
        }
        catch(PDOException $e){
            self::$conn = NULL;
        }
    }
    static function select($sql,$args){
        //執行查詢動作
        if(self::$conn == NULL)return self::response(14, "無法開啟DB");
        $stmt = self::$conn->prepare($sql);
        $result = $stmt->execute($args);
        if($result){
            $rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return self::response(200,"查詢成功",$rows);
        }
        else{
            return self::response(400,"SQl錯誤");
        }
    }
    static function insert($sql, $args){
        //執行新增動作
        if (self::$conn==NULL) return self::response(14, "無法開啟DB");
        $stmt = self::$conn->prepare($sql);
        $result = $stmt->execute($args);
        if ($result) {
            $count = $stmt->rowCount();
            return ($count < 1) ? self::response(204, "新增失敗") : self::response(200, "新增成功");
        } else {
            return self::response(400, "SQL錯誤");
        }

    }
    static function delete($sql, $args){
        //執行刪除動作
        if (self::$conn==NULL) return self::response(14, "無法開啟DB");
        $stmt = self::$conn->prepare($sql);
        $result = $stmt->execute($args);
        if ($result) {
            $count = $stmt->rowCount();
            return ($count < 1) ? self::response(204, "刪除失敗") : self::response(200, "刪除成功");
        } else {
            return self::response(400, "SQL錯誤");
        }

    }
    static function update($sql, $args){
        //執行更新動作
        if (self::$conn==NULL) return self::response(14, "無法開啟DB");
        $stmt = self::$conn->prepare($sql);
        $result = $stmt->execute($args);
        if ($result) {
            $count = $stmt->rowCount();
            return ($count < 1) ? self::response(204, "更新失敗") : self::response(200, "更新成功");
        } else {
            return self::response(400, "SQL錯誤");
        }

    }
}

?>