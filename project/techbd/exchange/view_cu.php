<?php
include('../login/session.php');


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cart</title>
<link rel="icon" type="image/png/jpg" href="../image/logo.jpg" />
<link rel="stylesheet" type="text/css" href="../style.css" >
<link rel="stylesheet" type="text/css" href="../user/style1.css" >
<script type="text/javascript">


</script>
</head>

<body>
<div id="container1">
<div id="header">
<div id="acc">
<a href="../login/login.php"><img src="../image/Microsoft_Account.svg.png" width="40px" height="40px" /></a>
</div>
<div id="logo">
<img src="../image/logo.jpg" width="50px" height="50px" />
</div>
<div id="hline">techbd</div>
<div id="sbox">
<form method="post" action="../user/search.php" onsubmit="return valid()" >
<input id="search" name="search" type="text" placeholder="Search for product & brand" />
<input type="image" src="../image/3940585a2d442b4a263055de85b1318f.png" width="40px" height="40px" id="submit" name="btn" />
</form>


</div>

<div id="btn"><a href="../user/order.php"><img src="../image/cart-icon.jpg" style="width:40px;height:40px; border-radius:50%" />
</a></div>


</div>
<div id="menu">
<ul class="main-menu">
			<li><a href="file:///C|/xampp/htdocs/home.php">Home</a></li>
			<li class="sub-menu sub-menu-1"><a href="#">New Products</a>
				<ul class="sub-menu-layout sub-menu-layout-1">
					<li><a href="#">Antivirus</a></li>
                    <li><a href="#">Adobe Premire</a></li>
                    <li><a href="#">PC Hardware</a></li>
					<li class="sub-menu sub-menu-2"><a href="#">Artifacial Intelligency</a>
						<ul class="sub-menu-layout sub-menu-layout-2">
							<li><a href="#">Ardunio</a></li>
							<li><a href="#">Sensor</a></li>
							<li><a href="#">motorl</a></li>
						</ul>
					</li>
					<li><a href="#">Others</a></li>
				</ul>
			</li>
				
     <li><a href="#">Old Products</a>
	<li class="sub-menu sub-menu-1"><a href="#">Exchange Products</a>
				<ul class="sub-menu-layout sub-menu-layout-1">
					<li><a href="#">Pc Hardware</a></li>
                    <li><a href="#">Mobile</a></li>
                    <li><a href="#">Electronices</a></li>
					<li><a href="#">Others</a></li>
				</ul>
			</li>			
   
	<li><a href="">About</a></li>
    
      <li><a href="../user.php">Profile</a></li>
     <li><a href="../login/logout.php">Logout</a></li>
		
</ul>
	
</div>
<div id="display3">
<?php
$conn = mysql_connect("localhost","root","");
mysql_select_db("techbd");//database name
$page=0;
$show=2;
if(isset($_POST["page"]))
{
 $page=$_POST["page"];
 $page=($page*$show)-$show;//counting for 9 image is displayed in one page
}
$res = mysql_query("SELECT * FROM eprodinfo WHERE cu_id=".$id." ORDER BY ep_id DESC limit $page,$show");//set limit to display 9 images
while($row=mysql_fetch_array($res))
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
	<td width="20%" valign="top"> &nbsp;&nbsp;&nbsp;'.$price.'TK </td>
    <td width="7%" valign="top"><a href="edit_ep.php?edit_id='.$id1.'" style="color:green;">Edit</td></a>
	<td width="7%" valign="top"><a href="details.php?id='.$id1.'" style="color:green;">Details</td></a>
    <td width="7%" valign="top"><a href="deleteo_a.php?delete_id='.$id1.'"style="color:red;"><input type="submit" value="Delete"style="color:red;"onclick="return del()"> </td></a>


</table>

';?>
    <?php
}
$res1 = mysql_query("SELECT * FROM eprodinfo WHERE cu_id=".$id." ORDER BY ep_id DESC");
$count=mysql_num_rows($res1);//use for count how many images in database
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
<div id="pt1">
<b>Techbd </b><hr> &nbsp;&nbsp;&nbsp;&nbsp; <div id="f1"><p><a href="../f_page/address.php">Address</a> </div><div id="f2"><a href="../home.php"> Home </a></div>
<hr />
<b>Payment System </b> &nbsp;&nbsp;&nbsp;&nbsp <div id="f4"><a href="../f_page/replace&refund.php">Replacement policy</a> </div><div id="f5"> <a href="../f_page/replace&refund.php">Refund policy</a></div>
<hr />
<b>How to pay </b> &nbsp;&nbsp;&nbsp;&nbsp Cash on delevery <img src="../image/bkash_logo.png" id="pay" width="30px" height="40px" />
 <img src="../image/120716173707_UKashLogo2.jpg" id="pay" width="40px" height="30px" />
<br /><hr />
<p>copywrite@techbd.com 2017</p>
</div>
<div id="pr2">
<h3>Newslater</h3>
<p>Every day 1000+ product add in our website</p>
<p>Question | Comments | Complain</p>
<p><b>Moblile:01779218527</b></p>
<p><b>E-mail:techbd@gmail.com</b></p>
<p><a href="https://www.facebook.com/techbdcom-307315119754596/"><b>Inbox:https://www.facebook.com/techbd.com/</b></a></p>
<div id="fb">
<a href="https://www.facebook.com/techbdcom-307315119754596/"><img src="../image/Facebook_Home_logo_old.svg.png"  width="40px" height="30px" /></a>
</div>
<div id="tw">
<a href="https://twitter.com/"><img src="../image/Twitter.png" width="40px" height="30px" /></a>
</div>
<div id="lkd">
<a href="https://www.linkedin.com/"><img src="../image/Linkedin_circle.svg_.png" width="40px" height="30px" /></a>
</div>
<div id="ut">
<a href="https://www.youtube.com/"><img src="../image/youtube-icon-logo-05A29977FC-seeklogo.com.png" width="40px" height="30px" /></a>
</div>
</div>



</div>
</div>
</body>
</html>
