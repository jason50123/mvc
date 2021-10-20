<?php
    if(isset($_GET["action"]))
        $action = $_GET["action"];
    else
        $action = "_no_action";
        
    switch($action){
        case "TwoRectArea":
            require_once "./Controller.php";
            $controller = new Controller();
            $response = $controller -> getTwoArea();
            break;
        default:
            $response['status'] = 404;
            $response['message'] = "action not found";
            break;
    }
    echo json_encode($response);
?>