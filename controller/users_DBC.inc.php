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

	    function addUser($users){
            $db = config::getConnection();

            $firstName=$users->getFirstName();
            $lastName=$users->getLastName();
            $email=$users->getEmail();
            $password=$users->getPassword();

            $sql="INSERT into users_db(firstName,lastName,email,password)
            values('$firstName','$lastName','$email','$password')";
            $run=mysqli_query($db,$sql);
            if (!$run) {
                echo "<p> Query [$run] couldn't be executed </p>";
                echo mysqli_error($db);
            }

	    }

        function retriveUsers()
            {
                $sql="SElECT * FROM users_db";
                $db = config::getConnection();
                $run=mysqli_query($db,$sql);
                if (!$run) {
                    echo "<p> Query [$run] couldn't be executed </p>";
                    echo mysqli_error($db);
                }
                return $run;
            }


        function deletUser($id)
            {
                $sql="DELETE FROM users_db where id='$id'";
                $db = config::getConnection();
                $run=mysqli_query($db,$sql);
                if (!$run) {
                    echo "<p> Query [$run] couldn't be executed </p>";
                    echo mysqli_error($db);
                }
        }

	    function updateUser($users){
                $id=$users->getId();
                $firstName=$users->getFirstName();
                $lastName=$users->getLastName();
                $email=$users->getEmail();
                $dob=$users->getDob();
                $password=$users->getPassword();
                $phNumber=$users->getPhNumber();
                $address=$users->getAddress();
                $sql="UPDATE users_db SET id='$id', firstName='$firstName', lastName='$lastName', email='$email',password='$password',dob='$dob',phNumber='$phNumber',address='$address' WHERE id='$id'";
                $db = config::getConnection();
                $run=mysqli_query($db,$sql);
                if (!$run) {
                    echo "<p> Query [$run] couldn't be executed </p>";
                    echo mysqli_error($db);
                }
        }


        function searcAndRetriveUser($email,$password)
            {
                $db = config::getConnection();
                $sql="SELECT * from users_db WHERE password='$password' AND email='$email' ";
                $run=mysqli_query($db,$sql);
                if (!$run) {
                    echo "<p> Query [$run] couldn't be executed </p>";
                    echo mysqli_error($db);
                }
                $liste=mysqli_fetch_assoc($run);
                return $liste;
            }



            function insertImage($id,$file)
            {
                echo $id;
                $sql="UPDATE users_db SET photo='$file' WHERE id='$id'";
                $db = config::getConnection();
                $run=mysqli_query($db,$sql);
                if (!$run) {
                    echo "<p> Query [$run] couldn't be executed </p>";
                    echo mysqli_error($db);
                }
            }

        }

?>