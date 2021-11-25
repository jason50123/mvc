<?php
    require_once './Router.php';

    if(isset($_GET['action']))
        $action = $_GET['action'];
    else
        $action = "no_action";
    
    $router = new Router();
    $router->register('getUsers', 'Employee', 'getUsers');
    $router->register('newUser', 'Employee', 'newUser');
    $router->register('removeUser', 'Employee', 'removeUser');
    $router->register('updateUser', 'Employee', 'updateUser');
    $router->register('getProd', 'Product', 'getProd');
    $router->register('newProd', 'Product', 'newProd');
    $router->register('removeProd', 'Product', 'removeProd');
    $router->register('updateProd', 'Product', 'updateProd');
    $router->register('getRole', 'Role', 'getRole');
    $router->register('newRole', 'Role', 'newRole');
    $router->register('removeRole', 'Role', 'removeRole');
    $router->register('updateRole', 'Role', 'updateRole');
    $router->register('getSupply', 'Supply', 'getSupply');
    $router->register('newSupply', 'Supply', 'newSupply');
    $router->register('removeSupply', 'Supply', 'removeSupply');
    $router->register('updateSupply', 'Supply', 'updateSupply');
    
    $response = $router->run($action);
    
    echo json_encode($response);
    
?>