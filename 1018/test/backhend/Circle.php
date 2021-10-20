<?php
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