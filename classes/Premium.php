<?php

class Premium extends Membership{
        private array $_interestsIndoor;
        private array  $_interestsOutdoor;

    /**
     * @return array
     */
    public function getInterestsIndoor(): array
    {
        return $this->_interestsIndoor;
    }

    /**
     * @param array $interestsIndoor
     */
    public function setInterestsIndoor(array $interestsIndoor)
    {
        $this->_interestsIndoor = $interestsIndoor;
    }

    /**
     * @return array
     */
    public function getInterestsOutdoor(): array
    {
        return $this->_interestsOutdoor;
    }

    /**
     * @param array $interestsOutdoor
     */
    public function setInterestsOutdoor(array $interestsOutdoor)
    {
        $this->_interestsOutdoor = $interestsOutdoor;
    }

//
//        public function __construct()
//        {
//
//            $this->_interestsIndoor = $interestsIndoor;
//            $this->_interestsOutdoor = $interestsOutdoor;
// maybe line 19-20 will work
//             or line 24-25 will work idk let's test it
//
//            $this->$interestsIndoor = array("tv", "movies", "cooking", "board games", "puzzles", "reading", "playing cards", "video games" );
//            $this->$interestsOutdoor = array("hiking", "biking", "collecting", "swimming", "camping", "walking", "climbing", "mountaineering");
//        }


}