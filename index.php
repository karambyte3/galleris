<?php
    session_start();
    
    include_once './config.php';
    include_once './generalHelper.php';
    include_once './controllers/authenticateUser.php';
    include_once 'views/partials/head.php';
    // authenticateUser();

include_once './controllers/accountControllers.php';

if ($_SESSION['username']) {
    echo '<h3>Welcome '.$_SESSION['username']. '</h3>';
}

# Route function
function route($routeUrls) {
    $pageFound = false;
    # взимаме достъпения линк
    $reqUrl = substr($_SERVER['REQUEST_URI'], 10);
    # махаме / ако има от дясната страна на линка напр. images/gallery/  =>  images/gallery
    $reqUrl = rtrim($reqUrl, 10);

    if($reqUrl == '') {
        home();
        include_once  './views/home.php';
        return;
    }

    # въртим цикъл за всеки един от линковете
    foreach($routeUrls as $url) {
        # проверяваме дали линка който е достъпил портеб. го има в нашите зададени от масива линкове
        if($reqUrl == $url) {

            # заместваме в линка / => _  (ako ima /)    напр upload/images => upload_images
            $funcName = str_replace('/', '_', $url);

            # извикваме функция, която има името на стринга в $funcName =====> все едно сме написали upload_images();
            $vars = call_user_func($funcName);
            # зареждаме файла с име напр. линка ни е /upload/images/ => ./views/upload/images.php 
                                                    # или /upload/ => ./views/upload.php
            include_once  './views/' . $url . '.php';

            # понеже има страница сетваме на ТРЮ
            $pageFound = true;
            return;
        }
    }

    # ако вече е заредена или масива routeUrls е празен => зарежда се ерор страницата
    if($pageFound == false){
        include './views/error404.php';
    }
}

function home() {
    
}



route(
    array(
        'upload',
        'login',
        'register',
        'profile',
        'logout'
        )
);


mysqli_close($conn);
?>


