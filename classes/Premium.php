<?php

class Premium extends Membership{
        private  $_interestsIndoor;
        private  $_interestsOutdoor;

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

    /** This will get the indoor interests (getter)
     * @return string that is indoor interests
     */
    public function getInterestsIndoor(): string
    {
        return $this->_interestsIndoor;
    }

    /**This will set the interests indoor (setter)
     * @param string $interestsIndoor
     * @return void
     */
    public function setInterestsIndoor(string $interestsIndoor): void
    {
        $this->_interestsIndoor = $interestsIndoor;
    }

    /** This will get the interests outdoor  (getter)
     * @return string that is interests outdoor
     */
    public function getInterestsOutdoor(): string
    {
        return $this->_interestsOutdoor;
    }

    /**This will set the last name (setter)
     * @param string $lname
     * @return void
     */
    public function setinterestsOutdoor(string $interestsOutdoor): void
    {
        $this->_interestsOutdoor = $interestsOutdoor;
    }
}