<?PHP
require "conf.inc.php";
class Menu_DBC{


	    function addMenu($menu){
            $db = config::getConnection();
            $prixPlat=$menu->getprixPlat();
            $nomPlat=$menu->getnomPlat();
            $sql="INSERT into menu_db(nomPlat,prixPlat)
            values('$nomPlat','$prixPlat')";
            $run=mysqli_query($db,$sql);
            if (!$run) {
                echo "<p> Query [$run] couldn't be executed </p>";
                echo mysqli_error($db);
            }

	    }

        function retriveMenu()
            {
                $sql="SElECT * FROM menu_db";
                $db = config::getConnection();
                $run=mysqli_query($db,$sql);
                if (!$run) {
                    echo "<p> Query [$run] couldn't be executed </p>";
                    echo mysqli_error($db);
                }
                return $run;
            }


        function deletMenu($id)
            {
                $sql="DELETE FROM menu_db where id='$id'";
                $db = config::getConnection();
                $run=mysqli_query($db,$sql);
                if (!$run) {
                    echo "<p> Query [$run] couldn't be executed </p>";
                    echo mysqli_error($db);
                }

        }

	    function updateMenu($menu){
                $id=$menu->getId();
                $nomPlat=$menu->getnomPlat();
                $prixPlat=$menu->getprixPlat();
                $sql="UPDATE menu_db SET  nomPlat='$nomPlat', prixPlat='$prixPlat' WHERE id='$id'";
                $db = config::getConnection();
                $run=mysqli_query($db,$sql);
                if (!$run) {
                    echo "<p> Query [$run] couldn't be executed </p>";
                    echo mysqli_error($db);
                }
        }


        function searchRetriveMenu($id)
            {
                $db = config::getConnection();
                $sql="SELECT * from menu_db WHERE  id='$id' ";
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
                $sql="UPDATE menu_db SET photo='$file' WHERE id='$id'";
                $db = config::getConnection();
                $run=mysqli_query($db,$sql);
                if (!$run) {
                    echo "<p> Query [$run] couldn't be executed </p>";
                    echo mysqli_error($db);
                }
            }

        }

?>