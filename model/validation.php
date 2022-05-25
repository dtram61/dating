<?php


    // validate name
    function validName($name)
    {
        return strlen(trim($name)) >= 2;
    }

    // validate age
     function validAge($age)
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
function validPhone($phone)
{
    return strlen($phone) == 10;
}

     function validGender($gender)
    {
        return in_array($gender, getGender());
    }

// validate email
function validEmail($email)
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return true;
    }

    else
    {
        return false;
    }
}
// validate outdoor activities
     function validOutdoor($outdoor)
    {
        return in_array($outdoor, getOutdoorInterest());
    }
// validate indoor activities
     function validIndoor($interestsIndoor)
    {
        return in_array($interestsIndoor, getIndoorInterest());
    }

