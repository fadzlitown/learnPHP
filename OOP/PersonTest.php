<?php
/**
 * Created by PhpStorm.
 * User: FadzliRazali
 * Date: 9/4/14
 * Time: 11:11 PM
 */

    //has 2 instances
    $teacher = new Person("boring","12345",12332);
    $student = new Person("Fdzli","Razali",24);
    echo $teacher->$isALive;

    //echo the $age of $student.
    echo $student->$age;

    echo $teacher->greet();
    echo $student->greet();

    echo('-----');