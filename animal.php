<?php

class Animal{
    public $cry="bowbow!";
    function bow(){
        echo $this->cry.PHP_EOL;
    }
}

class Dog extends Animal{
    public $cry="わんわん！";
}

class Cat extends Animal{
    public $cry="にゃー";
}

$animal_2=new Dog();
$animal_2->bow();

$animal_3=new Cat();
$animal_3->bow();
?>