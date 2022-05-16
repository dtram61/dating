<?php

// Turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);

//Start session()
session_start();
//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Create an instance of the Base class
$f3->route('GET /', function () {
    //echo '<h1>Hello, world! </h1>';

    $view = new Template();
    echo $view->render('views/home.html');
}
);

// Create a route for personal profile
$f3->route('GET /personal', function () {


    $view = new Template();
    echo $view->render('views/personal.html');
}
);

// Create a route for personal profile
$f3->route('GET|POST /profile', function () {

    //This is Tina's diner code that needs to be modified





// end of Tina's code


    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['food'] = $_POST['food'];


    $view = new Template();
    echo $view->render('views/profile.html');
});

// Create a route for interests profile
$f3->route('GET|POST /interests', function () {

    $_SESSION['email'] = $_POST['email'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['seeking'] = $_POST['seeking'];
    $_SESSION['biography'] = $_POST['biography'];
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
