<?php

class Membership {

    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_biography;
    private $_state;
    private $_seeking;

    /**
     * @param string $fname
     * @param $lname
     * @param $age
     * @param $gender
     * @param $phone
     * @param $email
     *
     */
    // membership constructor
    public function __construct(string $fname = "", string $lname = "" , int $age= 19 , string $gender = "" , string $phone = "",
    string $email = "" )
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
        $this->_email = $email;

    }

    /** This will get the first name (getter)
     * @return string that is first name
     */
    public function getFname(): string
    {
        return $this->_fname;
    }

    /**This will set the first name (setter)
     * @param string $fname
     * @return void
     */
    public function setFname(string $fname)
    {
        $this->_fname = $fname;
    }

    /** This will get the last name (getter)
     * @return string that is last name
     */
    public function getLname(): string
    {
        return $this->_lname;
    }

    /**This will set the last name (setter)
     * @param string $lname
     * @return void
     */
    public function setLname(string $lname)
    {
        $this->_lname = $lname;
    }
    /** This will get the age (getter)
     * @return string that is age
     */
    public function getAge(): string
    {
        return $this->_age;
    }

    /**This will set the age (setter)
     * @param string $age
     * @return void
     */
    public function setAge(string $age)
    {
        $this->_age = $age;
    }
    /** This will get the gender (getter)
     * @return string that is the gender
     */
    public function getGender(): string
    {
        return $this->_gender;
    }

    /**This will set the gender (setter)
     * @param string $gender
     * @return void
     */
    public function setGender(string $gender)
    {
        $this->_gender = $gender;
    }
    /** This will get the phone number (getter)
     * @return string that is the phone number
     */
    public function getPhone(): string
    {
        return $this->_phone;
    }

    /**This will set the phone number (setter)
     * @param string $phone
     * @return void
     */
    public function setPhone(string $phone)
    {
        $this->_phone = $phone;
    }
    /** This will get the email (getter)
     * @return string that is email
     */
    public function getEmail(): string
    {
        return $this->_email;
    }

    /**This will set the email (setter)
     * @param string $email
     * @return void
     */
    public function setEmail(string $email)
    {
        $this->_email = $email;
    }
    /** This will get the biography (getter)
     * @return string that is the biography
     */
    public function getBiography(): string
    {
        return $this->_biography;
    }

    /**This will set the biography (setter)
     * @param string $biography
     * @return void
     */
    public function setBiography(string $biography)
    {
        $this->_biography = $biography;
    }
    /** This will get the state (getter)
     * @return string that is a state
     */
    public function getState(): string
    {
        return $this->_state;
    }

    /**This will set the state (setter)
     * @param string $state
     * @return void
     */
    public function setState(string $state)
    {
        $this->_state = $state;
    }
    /** This will get the seeking (getter)
     * @return string that is seeking a partner
     */
    public function getSeeking(): string
    {
        return $this->_seeking;
    }

    /**This will set the first name (setter)
     * @param string $seeking
     * @return void
     */
    public function setSeeking(string $seeking): void
    {
        $this->_seeking = $seeking;
    }

}