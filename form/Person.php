
    <?php
//    <!-- Your code here -->
        class Person{
            public $isAlive= true;
            public $firstname;
            public $lastname;
            public $age;

            public function __construct($firstname,$lastname,$age){

                /* means the value you pass in the __construct() function via the keyword is assigned to $this,which represents the object you are dealing with */

                //$this keyword, if we want to access some properties in a class
                $this->firstname=$firstname;
                $this->lastname=$lastname;
                $this->age=$age;

            }

            /* want a method to return a sentence containing the firstname, we would have to use $this->firstname. (As you see, there is no $ when you access a property in a class. */
            public function greet(){
                return "Hello, nama saya ialah ".$this->firstname." ".$this->lastname;

            }
        }

        //has 2 instances
        $teacher = new Person("boring","12345",12332);
        $student = new Person("Fdzli","Razali",24);
        echo $teacher->$isALive;

        //echo the $age of $student.
        echo $student->$age;

        echo $teacher->greet();
        echo $student->greet();

    echo('-----');


?>
