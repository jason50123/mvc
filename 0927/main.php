<?php
    require_once './Rectangle.php';
    
    $w1 =$_POST["w1"];
    $h1 =$_POST["h1"];
    $w2 =$_POST["w2"];
    $h2 =$_POST["h2"];
    

    $rect1 = new Rectangle($w1,$h1);
    $rect2 = new Rectangle($w2,$h2);

    echo $rect1-> getArea();
    echo $rect1-> getWidth();
    echo $rect2-> getArea();
    echo $rect2-> getWidth();
    


?>