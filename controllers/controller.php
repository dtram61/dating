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

 /*  function personal()
    {

       if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['premium'])) {
                $profile = new Premium();
            } else {
                $profile = new membership();
            }
            $_SESSION['profile'] = $profile;
        }


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

            $_SESSION['gender'] = $gender;

            // validate and submit age information

            $age = $_POST['age'];

            $f3->set('age', $age);

            $age = isset($_POST['age']) ? $_POST['age'] : "";

            if (validAge($age)) {
                $_SESSION['age'] = $age;
            } else {
                $f3->set('errors["age"]', 'Age must be between 18 or 118');
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
 */

}