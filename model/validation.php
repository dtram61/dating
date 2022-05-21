<?php

class Validation
{
    // validate name
   static function validName($name)
    {
        return strlen(trim($name)) >= 2;
    }

    // validate age
     function validAge()
    {
        if ($age == "") {
            return false;
        } else if (!is_numeric($age)) {
            return false;
        } else if ($age >= 18) {
            return true;
        } else if ($age <= 122) //122 is the oldest person to ever live
        {
            return true;
        }
    }

     function validGender($gender)
    {
        return in_array($gender, getGender());
    }
// validate phone number
      function validPhone($phone)
    {
        return strlen($phone) == 10;
    }
// validate email
     function validEmail()
    {
        if(filter_var($email. FILTER_VALIDATE_EMAIL))
        {
            return true;
        }

        else
        {
            return true;
        }
    }
// validate outdoor activities
     function validOutdoor($outdoor)
    {
        return in_array($outdoor, Datalayer:: getOutdoorInterest());
    }
// validate indoor activities
     function validIndoor($indoor)
    {
        return in_array($indoor, Datalayer::getIndoorInterest());
    }

}