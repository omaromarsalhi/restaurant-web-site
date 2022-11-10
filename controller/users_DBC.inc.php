<?PHP
require "conf.inc.php";
class Users_DBC{
        function afficheUser ($users)
            {
                echo "id: ".$users->getId()."<br>";
                echo "firstName: ".$users->getFirstName()."<br>";
                echo "lastName: ".$users->getLastName()."<br>";
                echo " email: ".$users->getEmail()."<br>";
                echo "dob: ".$users->getDob()."<br>";
                echo "password: ".$users->getPassword()."<br>";
                echo "phNumber: ".$users->getPhNumber()."<br>";
                echo "address: ".$users->getAddress()."<br>";

            }

	    function addUsers($users){
            $sql="INSERT into users_db (id,firstName,lastName,email,dob,password,phNumber,address) values (:id,:firstName,:lastName,:email,:dob,:password,:phNumber,:address)";
            $db = config::getConnection();
            try{
                $req=$db->prepare($sql);
                $id=$users->getId();
                $firstName=$users->getFirstName();
                $lastName=$users->getLastName();
                $email=$users->getEmail();
                $dob=$users->getDob();;
                $password=$users->getPassword();
                $phNumber=$users->getPhNumber();
                $address=$users->getAddress();
                $req->bindValue(':id',$id);
                $req->bindValue(':firstName',$firstName);
                $req->bindValue(':lastName',$lastName);
                $req->bindValue(':email',$email);
                $req->bindValue(':dob',$dob);
                $req->bindValue(':password',$password);
                $req->bindValue(':phNumber',$phNumber);
                $req->bindValue(':address',$address);
                $req->execute();
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }

	    }

        function showUsers()
            {
                $sql="SElECT * FROM users_db";
                $db = config::getConnection();
                try{
                $liste=$db->query($sql);
                return $liste;
                }
                catch (Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
            }

        function deletUsers($password)
            {
                $sql="DELETE FROM users_db where password= :password";
                $db = config::getConnection();
                $req=$db->prepare($sql);
                $req->bindValue(':password',$password);
                try{
                    $req->execute();
                }
                catch (Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
        }

	    function updateUsers($users){
                $sql="UPDATE users_db SET id=:id, firstName=:firstName, lastName=:lastName, email=:email,password=:password,dob=:dob,phNumber=:phNumber,address=:address WHERE id=:id";

                $db = config::getConnection();
                try{
                    $req=$db->prepare($sql);
                    $id=$users->getId();
                    $firstName=$users->getFirstName();
                    $lastName=$users->getLastName();
                    $email=$users->getEmail();
                    $dob=$users->getDob();
                    $password=$users->getPassword();
                    $phNumber=$users->getPhNumber();
                    $address=$users->getAddress();
                    $datas = array(':id'=>$id, ':firstName'=>$firstName, ':lastName'=>$lastName, ':email'=>$email,':password'=>$password,':dob'=>$dob, ':phNumber'=>$phNumber,':address'=>$address);
                    $req->bindValue(':id',$id);
                    $req->bindValue(':firstName',$firstName);
                    $req->bindValue(':lastName',$lastName);
                    $req->bindValue(':email',$email);
                    $req->bindValue(':password',$password);
                    $req->bindValue(':dob',$dob);
                    $req->bindValue(':phNumber',$phNumber);
                    $req->bindValue(':address',$address);
                    $req->execute();
                }
                catch (Exception $e){
                    echo " Erreur ! ".$e->getMessage();
                    echo " Les datas : " ;
                    print_r($datas);
                }

        }
        function searcAndRetriveUser($email,$password)
            {
                $sql="SELECT * from users_db WHERE password=:password AND email=:email ";
                $db = config::getConnection();
                try{
                    $req=$db->prepare($sql);
                    $req->bindValue(':password',$password);
                    $req->bindValue(':email',$email);
                    $req->execute();
                    $liste=$req->fetch();
                    return $liste;
                }
                catch (Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
            }
}

?>