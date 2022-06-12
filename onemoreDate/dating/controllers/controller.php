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

     //task 1 create comment
     // task 2 put session array later in $member
     // task 3 changed set name
     // task 4get rid of session fname = $fname
     // line 77 changed
     // profile dont use $memeber on profile

     //  $_SESSION['member'] = new Premium(); // this might not be neccesary
     //Add the fname to the memeber/profile



     //require_once '/home/dtramgre/config.php';
     require_once $_SERVER['DOCUMENT_ROOT'].'/../config.php'; // this might not be neccesary

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {




         //Move personal data from POST to SESSION
         var_dump ($_POST);

         // investigate what these are doing

         $member = $_SESSION['member'];
         $GLOBALS['member'];

         ///////////////////////////////////////////////////////////////
         // check if premium has been checked off or not
         if (isset($_POST['premium'])) {
             $profile = new Premium();
         } else {
             $profile = new Membership();
         }




         /////////////////////////////////////////



       // get the user data from the post array
        $fname = $_POST['fname']; // get first name from post array
         $f3->set('fname', $fname); // add the user's first name to the hive // this might not be neccesary
         $this->_f3->set('fname', $fname); // this might be able to replace line 35, add the user's first name to the hive


         //add name to the profile class // might need to delete it because we have line 96
         $profile->setFname($fname);






         //Store the profile in the session array //this might need to be moved
         $_SESSION['profile'] = $profile;



         //$_SESSION['member']->setFname($fname); //idk what these two does
         $_SESSION['profile']->setFname($fname); //idk what these two does






         // if data is valid

         if (Validation::validName($fname)) {

        if($fname != null){
           // $member->setFname($fname);
            $profile->setFname($fname); //add first name to profile

        }

            $_SESSION['fname'] = $fname;
         } else  // data is not valid -> store an error message
         {
             $f3->set('errors["fname"]', 'First name must have 2 or more letters.');
         }


         //validate and submit last name information
         $lname = $_POST['lname']; // get last name from post array


         $f3->set('lname', $lname);
         $this->_f3->set('lname', $lname); // add to the hive


         if (Validation::validName($lname)) {
             $_SESSION['lname'] = $lname;
             $_SESSION['profile']->setLname($lname);
         } else {
             $f3->set('errors["lname"]', 'Last name must have 2 or more letters.');
         }
         // submit gender information

         // validate gender
         $gender = $_POST['gender'];

         $f3->set('gender', $gender);

         $this->_f3->set('gender', $gender);

         $_SESSION['gender'] = $gender;

         $_SESSION['profile']->setGender($gender);


         // validate and submit age information

         $age = $_POST['age'];

         $f3->set('age', $age);
         $this->_f3->set('age', $age);


         if (Validation::validAge($age)) {
             $_SESSION['age'] = $age;
             $_SESSION['profile']->setAge($age);

         } else {
             $f3->set('errors["age"]', 'Age must be between 18 or 118');
         }


         // validate phone number
         $phone = $_POST['phone'];

         $f3->set('phone', $phone);

         $this->_f3->set('phone', $phone);



         if (Validation::validPhone($phone)) {
             $_SESSION['phone'] = $phone;
             $_SESSION['profile']->setPhone($phone);

         } else {
             $f3->set('errors["phone"]', 'Phone numbers must contain 10 numbers ');
         }




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

         $this->_f3->set('email', $email);

         $f3->set('email', $email);

         //$email = isset($_POST['email']) ? $_POST['email'] : "";


         if (Validation::validEmail($email)) {
             $_SESSION['email'] = $email;
             $_SESSION['profile']->setEmail($email);

             //  $member->setEmail($email);
               // set it for state seeking and biography
         } else {
             $f3->set('errors["email"]', 'email must have an @ symbol ');
         }

         //STATE/////////////////////////////////////////////////
         $state = $_POST['state'];

         $this->_f3->set('state', $state);

         $f3->set('state', $state);

         $_SESSION['profile']->setEmail($email);

         $_SESSION['state'] = $state;
        // $member->setState($state);


/// Seeking///////////////////////////////////////////////////

         $seeking = $_POST['seeking'];

         $this->_f3->set('seeking', $seeking);

         $f3->set('seeking', $seeking);

         $_SESSION['profile']->setSeeking($seeking);

         $_SESSION['seeking'] = $seeking;

         /// Biography///////////////////////////////////////////////////


         $biography = $_POST['biography'];

         $f3->set('biography', $biography);

         $this->_f3->set('biography', $biography);

         $_SESSION['profile']->setBiography($biography);

         $_SESSION['biography'] = $biography;



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

         $interestsIndoor = "";
         $interestsOutdoor = "";

         // Interests not required

         // Condiments are not required
         if (empty($_POST['interestsIndoor'])) {
             $interestsIndoor = "No indoor interests selected";
         } else if (empty($_POST['interestsOutdoor'])) {
             $interestsOutdoor = "No Outdoor interests selected";
         } else if (empty($_POST['interestsIndoor']) || (empty($_POST['interestsOutdoor']))) {
             $interestsIndoor = "No indoor interests selected";
             $interestsOutdoor = "No outdoor interests selected";
         } else {

             // Get condiments from post array
             $userIndoorInterests = $_POST['interestsIndoor'];
             $userOutdoorInterests = $_POST['interestsOutdoor'];

             // If condiments are valid, convert to string
//             if (Validation::validIndoor($userIndoorInterests) || Validation::validOutdoor($userOutdoorInterests)) {
                 $interestsIndoor = implode(", ", $userIndoorInterests);
                 $interestsOutdoor = implode(", ", $userOutdoorInterests); // i have a feeling this might give me an error
//             } else {
//                 $this->_f3->set('errors["interestsIndoor"]', 'You spoofed me!');
//                 $this->_f3->set('errors["interestsOutdoor"]', 'You spoofed me!');
//             }
         }


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


         //If there are no errors...
         if (empty($this->_f3->get('errors'))) {

             //Add condiment string to session array
             $_SESSION['profile']->setInterestsOutdoor($interestsIndoor);
             $_SESSION['profile']->setInterestsOutdoor($interestsOutdoor);

             //Redirect
             header('location: summary');

             // redirect to summary
             if (empty($f3->get('errors'))) {
                 header('location: summary');
             }
         } else {
             $f3->set('errors["interests"]', 'Invalid interests selected');
         }
     }

     // Add interests indoor data to hive
     $this->_f3->set('interestsIndoor', DataLayer::getIndoorInterest()); // you might be missing an S somewhere
     $this->_f3->set('interestsOutdoor', DataLayer::getOutdoorInterest());




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

////Write to database
//     $orderId = $GLOBALS['dataLayer']->saveDate($_SESSION['profile']);
//     $this->_f3->set('orderId', $orderId);
//
//     //Display summary page
//     $view = new Template();
//     echo $view->render('views/summary.html');
//
//     //Clear the session array
//     session_destroy();


     $view = new Template();
     echo $view->render('views/summary.html');

 }

    function testSQL ($f3){
        $view = new Template();
        echo $view->render('views/testSQL.php');
    }

    function admin()
    {

        $view = new Template();
        echo $view->render('views/admin.html');
    }

}