<?php
class Users_DB{
    public $firstName;
    public $lastName;
    public $email;
    public $dateOfBirth;
    public $password;
    public $phNumber;


    public function __construct($firstName,$lastName,$email,$dateOfBirth,$password,$phNumber)
    {
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->email=$email;
        $this->dateOfBirth=$dateOfBirth;
        $this->password=$password;
        $this->phNumber=$phNumber;
    }

}
?>