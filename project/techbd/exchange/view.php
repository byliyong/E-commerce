<?php
include('../login/session.php');


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Rubik" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="../search/style5.css" type="text/css">

<link rel="icon" type="image/png/jpg" href="../image/logo.jpg" />
<link rel="stylesheet" type="text/css" href="../style.css" >
<link rel="stylesheet" type="text/css" href="../user/style1.css" >
<script type="text/javascript">


</script>
</head>

<body>
<div id="container1">
<header>
		<?php
			include('../search/head.php');
		?>
	</header>
<?php
			include('../menu/user.php');
 ?>
<div id="display3">
<?php
include("../db/config.php");


$page=0;
$show=4;
if(isset($_POST["page"]))
{
 $page=$_POST["page"];
 $page=($page*$show)-$show;
}
$sql="SELECT * FROM eprodinfo WHERE cu_id=".$id." ORDER BY ep_id DESC limit $page,$show";
$res = mysqli_query($myconn,$sql);
?>
<?php echo' <table width="100%" border="1px" bgcolor="#0066FF" cellspacing="0" cellpadding="6">

<tr><td width="20%" valign="top">Product Id </td>
	<td width="20%" valign="top">Product Name</td>
 	
	<td width="20%" valign="top">Product image</td>
 	<td width="20%" valign="top">Wanted Product</td>
		<td width="20%" valign="top"> &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</td>

</table>

';?>


<?php
while($row=mysqli_fetch_array($res))
{
$id1= $row['ep_id'];
$name= $row['ep_name'];
$picpath=$row['p_image'];
$price=$row['ep_want'];
 ?>
   <?php echo' <table width="100%" border="1px" cellspacing="0" cellpadding="6">

<tr>
	<td width="20%" valign="top">'.$id1.'</td>
 	<td width="20%" valign="top">'.$name.' </td>
	<td width="20%"> &nbsp;&nbsp;&nbsp;&nbsp;<img src="prodimg/'.$picpath.'" width="100px"height="100px"/></td>
	<td width="20%" valign="top"> &nbsp;&nbsp;&nbsp;'.$price.'</td>
     <td width="7%" valign="top"><a href="edit_ep.php?edit_id='.$id1.'" style="color:green;"><img src="../image/button_edit.png"  width="50px" height="30px" /></td></a>
	<td width="7%" valign="top"><a href="details.php?id='.$id1.'" style="color:green;"><img src="../image/button_details.png"  width="50px" height="30px" /></td></a>
    <td width="7%" valign="top"><a href="delete_ep.php?delete_id='.$id1.'"style="color:red;"><input type="image" src="../image/button_delete.png" width="50px" height="30px" onclick="return del()"> </td></a>


</table>

';?>
    <?php
}
$sql2="SELECT * FROM eprodinfo WHERE cu_id=".$id." ORDER BY ep_id DESC";
$res1 = mysqli_query($myconn,$sql2);
$count=mysqli_num_rows($res1);//use for count how many images in database
$a=$count/$show;
$a=ceil($a);//ceil function is used to round up figure
echo "<br><br><br>";
?>
<form method="post">&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;
<?php
for($b=1;$b<=$a;$b++)
{
 ?>
    <input type="submit" value="<?php echo $b;?>" name="page">
    <?php
}?>
</div>
<div id="footer1">
<?php
			include('../footer/footer.php');
?>



</div>
</div>
</body>
</html>
