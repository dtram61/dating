<?php

// Turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);


//Require the autoload file
require_once('vendor/autoload.php');
require_once('model/validation.php');
require_once('model/data-layer.php');

//Start session()
session_start();

//Create an instance of the Base class
$f3 = Base::instance();

//Create an instance of the controller class, this has global scope but php it doesnt know
$con = new Controller($f3);


//Create an instance of the Base class
$f3->route('GET /', function () {
    //echo '<h1>Hello, world! </h1>';

    $GLOBALS['con']->home();
}
);

// Create a route for personal profile
$f3->route('GET|POST /personal', function () use ($f3) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        var_dump($_POST);


        $fname = $_POST['fname']; // get first name from post array


        $f3->set('fname', $fname); // add the user's first name to the hive


        $fname = isset($_POST['fname']) ? $_POST['fname'] : "";

        // validate first name // check again

        if (validName($fname)) {


            // Store it in the session array

            $_SESSION['fname'] = $fname;
        } else  // data is not valid -> store an error message
        {
            $f3->set('errors["fname"]', 'First name must have 2 or more letters.');
        }


        //validate and submit last name information
        $lname = $_POST['lname']; // get last name from post array


        $f3->set('lname', $lname);

        $lname = isset($_POST['lname']) ? $_POST['lname'] : "";

        if (validName($lname)) {
            $_SESSION['lname'] = $lname;
        } else {
            $f3->set('errors["lname"]', 'Last name must have 2 or more letters.');
        }
        // submit gender information

        // validate gender
        $gender = $_POST['gender'];

        $f3->set('gender', $gender);

        $gender = isset($_POST['gender']) ? $_POST['gender'] : "";

        if (validGender($gender)) {
            $_SESSION['gender'] = $gender;
        } else {
            $f3->set('errors["gender"]', 'Gender must be selected');
        }




        // validate and submit age information

        $age = $_POST['age'];

        $f3->set('age', $age);

        $age = isset($_POST['age']) ? $_POST['age'] : "";

        if (validAge($age)) {
            $_SESSION['age'] = $age;
        } else {
            $f3->set('errors["age"]', 'Age must be between 18 or 122');
        }



        // validate phone number
        $phone = $_POST['phone'];

        $f3->set('phone', $phone);

        $phone = isset($_POST['phone']) ? $_POST['phone'] : "";

        if (validPhone($phone)) {
            $_SESSION['phone'] = $phone;
        } else {
            $f3->set('errors["phone"]', 'Phone numbers must contain 10 numbers ');
        }


        // redirect to profile
        if (empty($f3->get('errors'))) {
            header('location: profile');
        }
    }

    $view = new Template();
    echo $view->render('views/personal.html');
}
);

// Create a route for personal profile
$f3->route('GET|POST /profile', function () use ($f3) {


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        var_dump($_POST);




        // validate email
        $email = $_POST['email'];

        $f3->set('email', $email);

        $email= isset($_POST['email']) ? $_POST['email'] : "";

        if (validEmail($email)) {
            $_SESSION['email'] = $email;
        } else {
            $f3->set('errors["email"]', 'email must have an @ symbol ');
        }

        $state = $_POST['state'];
        $f3->set('state', $state);
        $_SESSION['state'] = $state;

        $seeking = $_POST['seeking'];
        $f3->set('seeking',$seeking);
        $_SESSION['seeking'] = $seeking;

        $biography = $_POST['biography'];
        $f3->set('biography', $biography);
        $_SESSION['biography'] = $biography;

        $f3->set('state', getState());
        $f3->set('seeking', getSeeking());


        // redirect to interests
        if (empty($f3->get('errors'))) {
            header('location: interests');
        }

    }


    $view = new Template();
    echo $view->render('views/profile.html');
});

// Create a route for interests profile
$f3->route('GET|POST /interests', function () use ($f3) {



    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        var_dump($_POST);

        // validate indoor and outdoor interests
        $interests = $_POST['interests'];

        $f3->set('interests', $interests);



        $interests = isset($_POST['interests']) ? $_POST['interests'] : "";

       if (validIndoor($interests)) {
            $_SESSION['interests'] = $interests;
        } else {
            $f3->set('errors["interests"]', 'Please select some interests');
        }


       // redirect to profile
        if (empty($f3->get('errors'))) {
            header('location: summary');
        }
    }



    $view = new Template();
    echo $view->render('views/interests.html');
});

// Create a route for profile summary
$f3->route('GET|POST /summary', function () {

$_SESSION['interests'] = implode(", ", $_POST['interests']);

    $view = new Template();
    echo $view->render('views/summary.html');


}
);



//Run fat free
$f3->run();
