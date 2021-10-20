<?php
    require_once './Rectangle.php';
    
    $w1 =$_POST["w1"];
    $h1 =$_POST["h1"];
    $w2 =$_POST["w2"];
    $h2 =$_POST["h2"];
    $r1 =$_POST["r1"];
    $r2 =$_POST["r2"];
    
    
    $rect1 = new Rectangle($w1,$h1);
    $rect2 = new Rectangle($w2,$h2);
    $Cir1 = new Circle($r1);
    $Cir2 = new Circle($r2);

    echo $rect1-> getArea()."<br>";
    echo $rect1-> getWidth()."<br>";
    echo $rect2-> getArea()."<br>";
    echo $rect2-> getWidth()."<br>";
    echo $Cir1-> getArea()."<br>";
    echo $Cir2-> getArea()."<br>";



?>