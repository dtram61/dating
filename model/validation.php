<?php

class Validation
{
    // validate name
    static function validName($name)
    {
        return strlen(trim($name)) >= 2;
    }

    // validate age
  static  function validAge($age)
    {
        if ($age == "") {
            return false;
        } else if (!is_numeric($age)) {
            return false;
        } else if ($age >= 18 && $age <= 118) {
            return true;
        }
    }

// validate phone number
  static  function validPhone($phone)
    {
        return strlen($phone) == 10;
    }

   static function validGender($gender)
    {
        return in_array($gender, getGender());
    }

// validate email
  static  function validEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

// validate outdoor activities
   static function validOutdoor($interestsOutdoor)
    {
        return in_array($interestsOutdoor, Datalayer::getOutdoorInterest());
    }

// validate indoor activities
 static function validIndoor($interestsIndoor)
    {
        return in_array($interestsIndoor, Datalayer::getIndoorInterest());
    }
}


