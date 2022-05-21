<?php


class Order
{
   // private $_lname;
   // private $_fname;
    private $_name;

    public function __construct()
    {
        $this->_lname = "";
        $this->_fname = "";
    }

   // public function getfname(): string
  //  {
   //     return $this->_lname;
  //  }

   // public function setfname(string $fname): void
   // {
   //     $this->_fname = $fname;
  //  }

    public function getName(): string
    {
        return $this->_name;
    }

    public function setName(string $name): void
    {
        $this->_name = $name;
    }



}