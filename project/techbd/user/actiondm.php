
<?php

$id=$_GET['id'];

include("../db/config.php");

$sql="SELECT * FROM payment WHERE `payment`.`o_id` ='" . $id . "'";

$query=mysqli_query($myconn,$sql);
while($row=mysqli_fetch_array($query))
{

$status=$row['status'];
if($status==1){
	$status=" 0";
	
}
else{
	$status= "1";
}

}
$result="UPDATE payment SET status='$status' WHERE o_id='$id'";

$query1 = mysqli_query($myconn,$result );

header("location:orderviewm.php");



?>
