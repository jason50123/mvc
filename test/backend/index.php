<?php
    require_once "./Router.php";
    //檢查帳密(以後說明)
    //判斷權限(以後說明)
    
    if(isset($_GET['action'])) 
        $action=$_GET['action'];
    else
        $action='no_action';
    
    $router = new Router();
    $router->register('TwoRectArea', 'Controller', 'getTwoArea');
    $response = $router->run($action);
    echo json_encode($response);
?>
