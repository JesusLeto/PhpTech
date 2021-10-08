<?php

require 'indexPast.php';

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css" />
    <title>Document</title>
</head>
<body>
    <div class = "container">
        <?php
            if(count($RezultNews) != 0 ){
        ?>
                <div class = "content">
                    <div class = "title">
                        <h1>Новости</h1>
                        <div class = "line"></div>
                    </div>
                    <div class = "Page__List">
                        <?php
                            foreach ($RezultNews as $ItemNew){
                            ?>
                                <div class = "ItemNew">
                                    <div class="ItemNew__Date"><?=$ItemNew['idate']?></div>
                                    <?php $ItemTitle = $ItemNew['title'];
                                            $id = $ItemNew['NewId'] + 1;
                                        echo "<div class='ItemNew__Title'><a href=\"/id=$id\">$ItemTitle</a></div>"?>
                                    <div class="ItemNew__Announce"><?=$ItemNew['announce']?></div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <div class = "line"></div>
                    <div class = "footer">
                        <h3>Страницы:</h3>
                        <div class = "Nav__Btn">
                            <?
                                for($i = 0; $i < $AllPages; $i++){
                                    $PageNumber = $i + 1;

                                    if($typeValue == $PageNumber){
                                        echo "<a class = 'Btn-Item active' href=\"/page=$PageNumber\">$PageNumber</a>";
                                    }else if(!$typeValue && $i == 0){
                                        echo "<a class = 'Btn-Item active' href=\"/page=$PageNumber\">$PageNumber</a>";
                                    }
                                    else{
                                        echo "<a class = 'Btn-Item nonactive' href=\"/page=$PageNumber\">$PageNumber</a>";
                                    }

                            }
                            ?>
                        </div>
                    </div>
                </div>

                <?php
            }else{
            ?>
            <div class = "content">
                <h1 class = "Singe__Page--title"><?= $SingleNew['title']?></h1>
                <div class = "line"></div>
                <div class = "Singe__Page--content"><?= $SingleNew['content']?></div>
                <div class = "line"></div>
                <?echo "<a class = 'Singe__Page--link' href=\"/\">Все новости >></a>"?>

            </div>
                <?php
            }
            ?>


    </div>

</body>
</html>

