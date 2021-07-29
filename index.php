<?php

$request = $_SERVER['REQUEST_URI'];
$prefix = "/app3";

switch ($request) {
    case $prefix . '/' :
        require __DIR__ . '/src/views/project.php';
        break;
    case $prefix . '' :
        require __DIR__ . '/src/views/project.php';
        break;
    case $prefix . '/project' :
        require __DIR__ . '/src/views/project.php';
        break;
    case $prefix . '/employees' :
        require __DIR__ . '/src/views/employees.php';
        break;
    case $prefix . '/project' . '?delete='.$_GET['delete']: 
        require __DIR__ . '/src/views/project.php';
        break;
    case $prefix . '/employees' . '?delete='.$_GET['delete']: 
        require __DIR__ . '/src/views/employees.php';
        break;
    case $prefix . '/project' . '?updatable='.$_GET['updatable']: 
        require __DIR__ . '/src/views/project.php';
        break;
    case $prefix . '/employees' . '?updatable='.$_GET['updatable']: 
        require __DIR__ . '/src/views/employees.php';
        break;
    // case $prefix . '/project' . '?name='.$_GET['name']: 
    //     require __DIR__ . '/src/views/project.php';
    //     break;
    // case $prefix . '/employees' . '?firstname=Jonas&name=JAVAA'; 
    //     require __DIR__ . '/src/views/employees.php';
    //     break;         
    default:
        http_response_code(404);
        require __DIR__ . '/src/views/404.php';
        break;

}


