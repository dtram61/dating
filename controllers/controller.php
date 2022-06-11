<?php

class Controller
{
    // this needs to have a field and field is fat free object
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

 function personal($f3)
 {
     //require_once '/home/dtramgre/config.php';
     require_once $_SERVER['DOCUMENT_ROOT'].'/../config.php';

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        var_dump($_SESSION);
        var_dump($_POST);
        return;
// doesn't exists
         $member = $_SESSION['member'];
        $GLOBALS['member'];
         $fname = $_POST['fname']; // get first name from post array


         $f3->set('fname', $fname); // add the user's first name to the hive

// use this format for premium
         $fname = isset($_POST['fname']) ? $_POST['fname'] : "";

         // validate first name // check again
// use isset to check if the premium has been checked for premium

         //if the user is checked , create premium otherwise not checked create regular memebership
         if(isset($_POST['premium']) ) {
            $member = new Premium();
         }
         else {
             $member = new Membership();

         }

         //task 1 create comment
         // task 2 put session array later in $member
         // task 3 changed set name
         // task 4get rid of session fname = $fname
         // line 77 changed
         // profile dont use $memeber on profile

         $_SESSION['member'] = new Premium();
         $_SESSION['member']->setFname($fname);

         if (Validation::validName($fname)) {

        if($fname != null){
            $member->setFname($fname);
        }
               //do this for everything
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

         if (Validation::validName($lname)) {
             $_SESSION['lname'] = $lname;
         } else {
             $f3->set('errors["lname"]', 'Last name must have 2 or more letters.');
         }
         // submit gender information

         // validate gender
         $gender = $_POST['gender'];

         $f3->set('gender', $gender);

         $gender = isset($_POST['gender']) ? $_POST['gender'] : "";

         $_SESSION['gender'] = $gender;

         // validate and submit age information

         $age = $_POST['age'];

         $f3->set('age', $age);

         $age = isset($_POST['age']) ? $_POST['age'] : "";

         if (Validation::validAge($age)) {
             $_SESSION['age'] = $age;
         } else {
             $f3->set('errors["age"]', 'Age must be between 18 or 118');
         }


         // validate phone number
         $phone = $_POST['phone'];

         $f3->set('phone', $phone);

         $phone = isset($_POST['phone']) ? $_POST['phone'] : "";

         if (Validation::validPhone($phone)) {
             $_SESSION['phone'] = $phone;
         } else {
             $f3->set('errors["phone"]', 'Phone numbers must contain 10 numbers ');
         }

         // check if premium has been checked off or not
         if (isset($_POST['premium'])) {
             $profile = new Premium();
         } else {
             $profile = new Membership();
         }
         $_SESSION['profile'] = $profile;


         // redirect to profile
         if (empty($f3->get('errors'))) {
             header('location: profile');
         }


     }
     var_dump($member);
     $view = new Template();
     echo $view->render('views/personal.html');
 }

 function profile($f3)
 {

     $member = $_SESSION['member'];
     var_dump($member);

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {





         // validate email
         $email = $_POST['email'];

         $f3->set('email', $email);

         //$email = isset($_POST['email']) ? $_POST['email'] : "";


         if (Validation::validEmail($email)) {
             $_SESSION['email'] = $email;

               //  $member->setEmail($email);
               // set it for state seeking and biography
         } else {
             $f3->set('errors["email"]', 'email must have an @ symbol ');
         }

         $state = $_POST['state'];
         $f3->set('state', $state);
         $_SESSION['state'] = $state;
        // $member->setState($state);


         $seeking = $_POST['seeking'];
         $f3->set('seeking', $seeking);
         $_SESSION['seeking'] = $seeking;

         $biography = $_POST['biography'];
         $f3->set('biography', $biography);
         $_SESSION['biography'] = $biography;

         $f3->set('state', $state);
         $f3->set('seeking', $seeking);


         // redirect to interests if there are no errors and the profile is a premium profile
         if (empty($f3->get('errors'))) {

             if ($_SESSION['profile'] instanceof premium) {
                 header('location: interests');
             } else {

                 header('location: summary');
             }
             //  header('location: interests');
         }

     }


     $view = new Template();
     echo $view->render('views/profile.html');
 }

 function interests($f3)
 {


     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// dump post array , if array has nothing in it
         var_dump($_POST);


         // validate indoor and outdoor interests //right now we are trying to put nothing into a variable




// if the array exists then we can get the value
         $interestsIndoor = $_POST['interestsIndoor'];
         $interestsOutdoor = $_POST['interestsOutdoor'];

         $_SESSION['profile']->setInterestsIndoor($interestsIndoor);
         $_SESSION['profile']->setInterestsOutdoor($interestsOutdoor);
/*
         if (($interestsIndoor == "") AND ($interestsOutdoor == "")) {
             // redirect to profile
             if (empty($f3->get('errors'))) {
                 header('location: summary');
             }
         } else if (true) //Validation::validIndoor($interestsIndoor) AND Validation::validOutdoor($interestsOutdoor) )
         {
             $_SESSION['interestsIndoor'] = $interestsIndoor;
             $_SESSION['interestsOutdoor'] = $interestsOutdoor;
             // $_SESSION['interestsIndoor'] = implode(", ", $interestsIndoor);
             //$_SESSION['interestsOutdoor'] = implode(", ", $interestsOutdoor);
            // $_SESSION['interestsIndoor'] = implode(", ", $_POST['interestsIndoor']);
             //$_SESSION['interestsOutdoor'] = implode(", ", $_POST['interestsOutdoor']);

            if($interestsIndoor != null){
               // $member->setInterestsIndoor($interestsIndoor);
            }if($interestsOutdoor != null){
              //  $member->setInterestsOutdoor($interestsOutdoor);
            }
*/
         $_SESSION['interestsIndoor'] = implode(", ", $_POST['interestsIndoor']);
         $_SESSION['interestsOutdoor'] = implode(", ", $_POST['interestsOutdoor']);



             // redirect to summary
             if (empty($f3->get('errors'))) {
                 header('location: summary');
             }
         }
         else {
             $f3->set('errors["interests"]', 'Invalid interests selected');
         }
     //}




     $view = new Template();
     echo $view->render('views/interests.html');
 }

 function summary($f3)
 {
     var_dump($_SESSION);

    $member = $_SESSION['profile'];
     $interestsIndoor =$_SESSION['interestsIndoor'];
     if ($_SESSION['profile'] instanceof premium) {

         if ($interestsIndoor != null) {
             $f3->set('errors["interestsIndoor"]', $member->getInterestsIndoor());

             $_SESSION['interestsIndoor'] = implode(', ', $member->getInterestsIndoor());
         }

         $interestsOutdoor = $_SESSION['interestsOutdoor'];
         if ($interestsOutdoor != null) {
             $f3->set('errors["interestsOutdoor"]', $member->getInterestsOutdoor());

             $_SESSION['interestsOutdoor'] = implode(', ', $member->getInterestsOutdoor());
         }
     }




     $view = new Template();
     echo $view->render('views/summary.html');

 }

    function testSQL ($f3){
        $view = new Template();
        echo $view->render('views/testSQL.php');
    }
}
