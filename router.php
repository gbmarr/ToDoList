<?php

require_once '/Config/ConfigApp.php';
require_once '/Controllers/TaskActions.php';
require_once '/Models/Database.php';
require_once '/index.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' .
$_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

function parseUrl($url){
    $arrAction = explode("/", $url);
    $accionReturn[ConfigApp::$ACTION] = $arrAction[0];
    $accionReturn[ConfigApp::$PARAMS] = isset($arrAction[1]) ? array_slice($arrAction, 1) : null;

    return $accionReturn;
}

$urlDatos = parseUrl($_GET[ConfigApp::$ACTION]);
$action = $urlData[ConfigApp::$ACTION];

if(array_key_exists($action,ConfigApp::$ACTIONS)){
    $params = $urlDatos[ConfigApp::$PARAMS];
    $method = ConfigApp::$ACTIONS[$action];

    if(isset($params) && $params != null){
        $method($params);
    }else{
        $method();
    }
}else{
    // mostrarIndex();
}

?>