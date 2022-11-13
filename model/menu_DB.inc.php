<?PHP
class Menu_db{
    private $id;
    private $nomPlat;
    private $prixPlat;



    function __construct($id,$nomPlat,$prixPlat){
          $this->id=$id;
          $this->nomPlat=$nomPlat;
          $this->prixPlat=$prixPlat;

	}

    //////////////////////////////////////////////////////////////

    function getId()
    {
		return $this->id;
    }

    function getnomPlat()
    {
		return $this->nomPlat;
    }

    function getprixPlat()
    {
		return $this->prixPlat;
    }





    //////////////////////////////////////////////////////////////

    function setId($id)
    {
		$this->id=$id;
    }

    function setnomPlat($nomPlat)
    {
		$this->nomPlat=$nomPlat;
    }

    function setprixPlat($prixPlat)
    {
		$this->prixPlat;
    }



}

?>