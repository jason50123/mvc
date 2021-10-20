<?php


    class Rectangle{
        private $width;
        private $height;
        

        public function __construct($width,$height){
            $this->width = $width;
            $this->height = $height;
        }
        public function getArea(){
            return $this->width * $this->height;
        }
        public function getWidth(){
            return $this->width;
        }
        public function getHeight(){
            return $this->height;
        }
        
    }

    class Circle{
        private $radius; 

        public function __construct($radius){
            $this->radius = $radius;
        }

        public function getArea(){
            return $this->radius * $this->radius*3.14;
        } 

        public function getRadius(){
            return $this->radius;
        }
    }

?>