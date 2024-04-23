<?php

require_once '/Views/index.php';
require_once '/Controllers/TaskActions.php';

$action = 'home';

if(!empty($_GET['action'])){
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch($action){
    // case 'home':
    //     showHome();
    //     break;
    case 'del':
        deleteTask();
        break;
    // case 'edit':
    //     editTask();
    //     break;
    case 'add':
        addTask();
        break;
    default:
    echo "<h2>Page not found</h2>";
    break;
}
?>