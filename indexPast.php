<?php

require 'connect.php';

//header("Content-type: json/application");

$RezultNews = array();
$AllPages = 0;
$AllNews = mysqli_query($connect, "SELECT COUNT(*) FROM `news`");
$AllNews = (int)mysqli_fetch_assoc($AllNews)['COUNT(*)'];
$AllPages = ceil($AllNews / 5);
$NewsOnPage = 5;

if(isset($_GET['q'])){
    $params = explode("=", $_GET['q']);
    $type = $params[0];
    $typeValue = $params[1];




 // Получение страницы новостей

    if($type === "page" && $typeValue > 0 && $typeValue < $AllPages + 1 && ctype_digit($typeValue)){


        $firstNewsInPage = $typeValue * $NewsOnPage - $NewsOnPage;

        $result = mysqli_query($connect, "SELECT * FROM `news` ORDER BY `idate` DESC LIMIT $firstNewsInPage,$NewsOnPage");

        $PageNewsList = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($PageNewsList as $new) {
            $new['idate'] = date('d-m-Y',  $new['idate']);
            $new['NewId'] = $firstNewsInPage;
            $firstNewsInPage++;
            $RezultNews[] = $new;
        }

    }

// Получение новости по id
    else if($type === "id" && $typeValue > 0 && $typeValue < $AllNews + 1){

        $IdAfterOrder = $typeValue - 1;

        $result = mysqli_query($connect, "SELECT * FROM `news` ORDER BY `idate` DESC LIMIT $IdAfterOrder, 1");

        $SingleNew = mysqli_fetch_assoc($result);

        $SingleNew['idate'] = date('d-m-Y',  $SingleNew['idate']);

        //echo json_encode($SingleNew);

    }else{
        $RezultNews = array();
        http_response_code(404);
        die ("Page not found");
    }


}else{

    $result = mysqli_query( $connect, "SELECT * FROM `news` ORDER BY `idate` DESC LIMIT $NewsOnPage");

    $PageNewsList = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $SetNewId = 1;

    foreach ($PageNewsList as $new) {
        $new['idate'] = date('d-m-Y',  $new['idate']);
        $new['NewId'] = $SetNewId;
        $SetNewId++;
        $RezultNews[] = $new;
    }

}





