<?php

class Datalayer
{


   static function getGender()
    {
        return array("male", "female", "non-binary");
    }

   static function getState()
    {
        return array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia",
            "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan",
            "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York",
            "North Carolina", "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "Tennessee"
        , "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming");
    }


   static function getSeeking()
    {
        return array("male", "female", "nonbinary");
    }


  static  function getIndoorInterest()
  {
        return array("tv", "movies", "cooking", "board games", "puzzles", "reading", "playing cards", "video games");
    }

  static  function getOutdoorInterest()
  {
        return array("hiking", "biking", "collecting", "swimming", "camping", "walking", "climbing", "mountaineering");
    }

}




