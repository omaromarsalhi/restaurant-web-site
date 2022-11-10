<?PHP
class Users{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $dob;
    private $password;
    private $phNumber;
    private $address;
    private $photo;


    function __construct($id,$firstName,$lastName,$email,$dob,$password,$phNumber,$address,$photo){
          $this->id=$id;
          $this->firstName=$firstName;
          $this->lastName=$lastName;
          $this->email=$email;
          $this->dob=$dob;
          $this->password=$password;
          $this->phNumber=$phNumber;
          $this->address=$address;
          $this->photo=$photo;

	}

    //////////////////////////////////////////////////////////////

    function getId()
    {
		return $this->id;
    }

    function getFirstName()
    {
		return $this->firstName;
    }

    function getLastName()
    {
		return $this->lastName;
    }

    function getEmail()
    {
		return $this->email;
    }

    function getDob()
    {
		return $this->dob;
    }

    function getPassword()
    {
		return $this->password;
    }

    function getPhNumber()
    {
		return $this->phNumber;
    }
    function getAddress()
    {
		return $this->address;
    }
    function getPhoto()
    {
		return $this->photo;
    }


    //////////////////////////////////////////////////////////////

    function setId($id)
    {
		$this->id=$id;
    }

    function setFirstName($firstName)
    {
		$this->firstName=$firstName;
    }

    function setLastName($lastName)
    {
		$this->lastName;
    }

    function setEmail($email)
    {
		$this->email=$email;
    }

    function setDob($dob)
    {
		$this->dob;
    }
    function setPhNumber($phNumber)
    {
		$this->phNumber=$phNumber;
    }

    function setAddress($address)
    {
		$this->address=$address;
    }
    function setPassword($password)
    {
      $this->password=$password;

    }
    function setPPhoto($photo)
    {
      $this->password=$photo;

    }

}

?>