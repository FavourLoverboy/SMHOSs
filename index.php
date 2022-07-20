<?php 
    $url = $_GET['url'];
    $url = rtrim($url, '/');
    $url = explode('/', $url);

    if(file_exists('views/'.$url[0].'.php')){
        $pages = 'views/'.$url[0].'.php';
        include('main.php');
    }else{
        include('login.php');
    }
?>