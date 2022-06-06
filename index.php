<?php

// Turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);



//Require the autoload file
require_once('vendor/autoload.php');
/*require_once('model/data-layer.php');
require_once('model/validation.php');*/

//Start session()
session_start();


//Create an instance of the Base class
$f3 = Base::instance();

//Create an instance of the controller class, this has global scope but php it doesnt know
$con = new Controller($f3);
//$datalayer = new Datalayer();


//Create an instance of the Base class
$f3->route('GET /', function () { // you can keep it like this
    //echo '<h1>Hello, world! </h1>';

    $GLOBALS['con']->home();
}
);

// Create a route for personal profile
$f3->route('GET|POST /personal', function () use ($f3) {
   $GLOBALS['con']->personal($f3);
}
);

// Create a route for personal profile
$f3->route('GET|POST /profile', function () use ($f3) {
$GLOBALS['con']->profile($f3);
});

// Create a route for interests profile
$f3->route('GET|POST /interests', function () use ($f3) {


$GLOBALS['con']->interests($f3);

});

// Create a route for profile summary
$f3->route('GET|POST /summary', function () {

   $GLOBALS['con']->summary();



}
);



//Run fat free
$f3->run();