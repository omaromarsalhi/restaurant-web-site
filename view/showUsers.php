<?PHP
include '../model/users_DB.php';
$users=new Users_DB();
$listUsers=$users->retrive_users_db();


?>
<table border="1">
<tr>
<td>first name</td>
<td>last name</td>
<td>email</td>
<td>date of birth</td>
<td>pasword</td>
<td>nbr tf</td>
</tr>
<?PHP
foreach($listUsers as $row){
	?>
	<tr>
	<td><?PHP echo $row['firstName']; ?></td>
	<td><?PHP echo $row['lastName']; ?></td>
	<td><?PHP echo $row['email']; ?></td>
	<td><?PHP echo $row['dateOfBirth']; ?></td>
	<td><?PHP echo $row['pasword']; ?></td>
    <td><?PHP echo $row['phNumber']; ?></td>
	<?PHP
}
?>
</table>
