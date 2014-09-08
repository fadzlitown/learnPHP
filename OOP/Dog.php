<?php
//<!-- Your code here -->

        class Dog{
            public $numLegs=4;
            public $name;


            public function __construct($name){
                $this->name=$name;

            }

            public function bark(){
                return "woof!";

            }

            public function greet(){
                return "Good dog ".$this->name." !";
            }

        }

        $dog1 = new Dog("Barker");
        $dog2 = new Dog("Amigo");


        echo(' Dog1 <br>');
        echo $dog1->bark();

         echo('<br> Dog2 <br>');
        echo $dog2->greet();